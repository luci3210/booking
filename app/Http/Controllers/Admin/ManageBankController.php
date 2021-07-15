<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Admin\BankModel;
use App\Model\Admin\AdminLogModel;
use App\Model\Admin\TempStatusModel;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ManageBankController extends Controller
{
    public function __construct() {

        $this->middleware('auth:admin');

    }

    public function index($url=null) {

        $bank_list = $this->bank_list();
        return view('admin.finance.bank_list',compact('bank_list'));
    }
    public function edit($id=null, $url=null) {


        $bank = $this->bank_edit($id);
        $bank_list = $this->bank_list();
        return view('admin.finance.bank_form',compact('bank','bank_list'));   

    }

    public function bank_edit($id=null) {

    return BankModel::where('id',$id)->get()->first();    

    }

    public function update(Request $request, $id=null, $url) {
    
    $rules = [
            'bank' => 'required|max:200',
            'status' => 'required',
        ];

        $errMessage = ['required' => 'Enter your :attribute'];

        $this->validate($request, $rules, $errMessage);

        $update = BankModel::find($id);
        $update->update(['bank'=>$request->bank,
                'status'=>$request->status]);

        AdminLogModel::create(['user_id'=>Auth::user()->id,'page_id'=>$id,'action'=>"edit",'page_name'=>"manage_bank"]);

        return back()->withSuccess('Successfully Updated!');

    }
    public function deleted(Request $request, $id) {
    
        $update = BankModel::find($id);
        $update->update(['status' => 4]);

        AdminLogModel::create(['user_id'=>Auth::user()->id,'page_id'=>$id,'action'=>"deleted",'page_name'=>"manage_bank"]);

        return back()->withSuccess('Successfully deleted!');

    }

    public function bank_list() {

        return BankModel::join('temp_status','temp_status.id','bank_names.status')->whereIn('bank_names.status',[1,2])->orderBy('bank','asc')->get(['bank_names.id as bid','bank_names.bank','bank_names.status','temp_status.id as tid','temp_status.status as tstatus']);    

    }

    public function create(Request $request, $url=null) {

        $validate = [
                'bank'   => 'required|unique:bank_names|max:200',
                'status'   => 'required',
        ];

        $errMessage = ['required' => '* Enter your :attribute'];
        $this->validate($request, $validate, $errMessage);   

        BankModel::create([
            'bank'    => $request->bank,
            'status'    => $request->status,
        ]);

        return back()->withSuccess('Successfully added!');
    
    }
}
