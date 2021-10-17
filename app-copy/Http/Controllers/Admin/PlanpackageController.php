<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\PlanpackageModel;
use App\Model\Admin\AdminLogModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PlanpackageController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$package = PlanpackageModel::join('temp_status','temp_status.id','=','plan_package.temp_status')
                ->where('plan_package.temp_status','!=', 4)->orWhereNull('plan_package.temp_status')->select(['plan_package.*','temp_status.status'])->orderBy('id', 'desc')->paginate(10);

    	if (session('success_message')) {
    		Alert::success('Success!', session('success_message'));
    	}

    	return view('admin.plan.package_index',['package' => $package])->with('i',(request()->input('page', 1) -1) *10);
    }

    public function create()
    {
    	return view('admin.plan.package_form');
    }
    
    public function store(Request $request)
    {
    	 $rules = [
            'package_name' => 'required',
        ];

        $errMessage = ['required' => '* Enter your :attribute'];

        $this->validate($request, $rules, $errMessage);                   

        PlanpackageModel::create(['package' => $request->package_name,
                                    'temp_status' => 1]);

        return redirect('admin/tourismo/ph/page/2/plan/package')->withSuccess('Successfully added!');
    }

    public function edit($id)
    {
    	$package = PlanpackageModel::join('temp_status','temp_status.id','=','plan_package.temp_status')
                ->where('plan_package.id','=', $id)->get(['plan_package.*','temp_status.status'])->first();

        return view('admin.plan.package_form_edit',compact('package'));
    } 

    public function update(Request $request, $id)
    {
    	$rules = [
            'package_name' => 'required',
            'package_status' => 'required',
        ];

        $errMessage = ['required' => 'Enter your :attribute'];

        $this->validate($request, $rules, $errMessage);

        $listings = PlanpackageModel::find($id);
        $listings->update(['package'=>$request->package_name,'temp_status'=>$request->package_status]);

        AdminLogModel::create(['user_id'=>Auth::user()->id,'page_id'=>$id,'action'=>"edit"]);

    	return redirect('admin/tourismo/ph/page/2/plan/package')->withSuccess('Successfully updated!');
    }

    public function delete(Request $request, $id)
    {
        $listings = PlanpackageModel::find($id);
        $listings->update(['temp_status'=> 4]);

        AdminLogModel::create(['user_id'=>Auth::user()->id,'page_id'=>$id,'action'=>"delete"]);

    	return redirect('admin/tourismo/ph/page/2/plan/package')->withSuccess('Successfully deleted!');
    }
}

