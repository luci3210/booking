<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\PlanModel;
use App\Model\Admin\AdminLogModel;
use App\Model\Admin\PlanpackageModel;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$plan = PlanModel::join('temp_status','temp_status.id','=','plans.temp_status')
                ->join('admins','admins.id','=','plans.user_id')
                // ->join('plan_package','plan_package.id','=','plans.plan_package')
                ->where('plans.temp_status','!=', 4)->orWhereNull('plans.temp_status')->select(['plans.*','temp_status.status','admins.name as adminname'])->orderBy('id', 'desc')->paginate(10);

    	if (session('success_message')) {
    		Alert::success('Success!', session('success_message'));
    	}

    	return view('admin.plan.plan_index',['plan' => $plan])->with('i',(request()->input('page', 1) -1) *10);
    }

    public function datapackage(Request $request)
    {
    	$data = PlanpackageModel::all();
    	return response()->json($data);
    }

    public function create()
    {
    	$packagelist = PlanpackageModel::all();
    	return view('admin.plan.plan_form', compact('packagelist'));
    }
    
    public function store(Request $request)
    {
    	 $rules = [
            'plan_name' => 'required',
            'price' => 'required',
            'subscription' => 'required',
            'itempack' => 'required',
            'status' => 'required',
        ];

        $errMessage = ['required' => '* Enter your :attribute'];

        $this->validate($request, $rules, $errMessage);   

        PlanModel::create(['plan_name' => $request->plan_name,
                                'plan_price' => $request->price,
                                'plan_scope' => $request->subscription,
                                'plan_package' => implode(',', $request->itempack),
                                'temp_status' => $request->status,
                                'user_id' => Auth::user()->id]);

        return redirect('admin/tourismo/ph/page/3/plan')->withSuccess('Successfully added!');
    }

    public function edit($id)
    {
    	$plan = PlanModel::join('temp_status','temp_status.id','=','plans.temp_status')
                ->join('admins','admins.id','=','plans.user_id')
               // ->join('plan_package','plan_package.id','=','plans.plan_package')
                ->where('plans.id','=', $id)->get(['plans.*','temp_status.status'])->first();
                
        //$planpackage = PlanpackageModel::all();

        return view('admin.plan.plan_form_edit',compact('plan'));
    } 

    public function update(Request $request, $id)
    {
		$rules = [
            'plan_name' => 'required',
            'price' => 'required',
            'subscription' => 'required',
            'itempack' => 'required',
            'status' => 'required',
        ];

        $errMessage = ['required' => 'Enter your :attribute'];

        $this->validate($request, $rules, $errMessage);

        $listings = PlanModel::find($id);
        $listings->update(['plan_name'=>$request->plan_name,
        		'plan_price'=>$request->price,
        		'plan_scope'=>$request->subscription,
        		'plan_package'=> implode(',',$request->itempack),
        		'temp_status'=>$request->status]);

        AdminLogModel::create(['user_id'=>Auth::user()->id,'page_id'=>$id,'action'=>"edit",'page_name'=>"plan"]);

    	return redirect('admin/tourismo/ph/page/3/plan')->withSuccess('Successfully updated!');
    }

    public function delete(Request $request, $id)
    {
        $listings = PlanModel::find($id);
        $listings->update(['temp_status'=> 4]);

        AdminLogModel::create(['user_id'=>Auth::user()->id,'page_id'=>$id,'action'=>"delete",'page_name'=>"plan"]);

    	return redirect('admin/tourismo/ph/page/3/plan')->withSuccess('Successfully deleted!');
    }
}
