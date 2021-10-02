<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Other\PlanContoller;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MerchantProfileController;

use App\Model\Merchant\Profile;
use App\Model\Merchant\HotelModel;
use App\Model\Merchant\MerchantAddress;
use App\Model\Merchant\MerchantContact;
use App\Model\Merchant\MerchantPermit;
use App\Model\ProfileUsersModel;
use App\Model\ProfileServiceModel;
use App\Model\ServiceModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

use App\Http\Requests\Merchant\UpdateProfile;
use App\Http\Requests\Merchant\PostServiceProfile;

use Illuminate\Support\Facades\Auth;

class ProfileServicesController extends Controller
{
    private $identity;

	public function __construct(MerchantProfileController $identity) {

		//$this->middleware('auth:web');	

		$this->getIdentity = $identity;

	}

	protected function index($id) {

		$data = ServiceModel::where(function ($query) use($id) {
			$query->from('products')
				->where([['id',$id], ['temp_status',1]]);
		})->select('id','name','description','icon_id')->firstOrFail();

		return view('merchant_dashboard.profile.profile_services',compact('data'));
	}

protected function create_service(PostServiceProfile $request, $id)
	{
		try {
			ProfileServiceModel::firstOrCreate(
			[
				'ps_profile_id'=>$this->getIdentity->getAuthUser()->profile,
					'ps_service_id'=>$id,
						'ps_name'=>$request->hotel_name,
							'ps_description'=>$request->hotel_name,
								'ps_address'=>$request->address,
									'ps_country'=>$request->country,
										'ps_district'=>$request->provice,
				'ps_city'=>$request->city,
					'ps_facilities'=>$request->facilities,
						'ps_check_in_out'=>$request->cico,
							'ps_roles_desc'=>$request->extra,
								'ps_attraction'=>$request->attraction,
									'ps_cancelaton_ref'=>$request->cpp,
				'ps_created_at'=>now()
			]
		);

		return redirect()->back()->withSuccess('Profile service, Successfully added.');

		} catch(\Exception $e) {
		
			return view('errors.merchant.web.pageNotfound');
		
			}

	}

protected function edit_service($id) {

	$data = ProfileServiceModel::where(function ($query) use($id) {
		$query->from('profile_services')
			->where('ps_id',$id);
	})->firstOrFail();
	return view('merchant_dashboard.profile.profile_service_edit',compact('data'));

}

protected function update_service(PostServiceProfile $request, $id) {

	ProfileServiceModel::where(function ($query) use($id,$request) {

		$query->from('profile_services')->where([['ps_id',$id],['ps_profile_id',$this->getIdentity->getAuthUser()->profile]])
			->update(
				['ps_name'=>$request->hotel_name,
							'ps_description'=>$request->hotel_name,
								'ps_address'=>$request->address,
									'ps_country'=>$request->country,
										'ps_district'=>$request->provice,
				'ps_city'=>$request->city,
					'ps_facilities'=>$request->facilities,
						'ps_check_in_out'=>$request->cico,
							'ps_roles_desc'=>$request->extra,
								'ps_attraction'=>$request->attraction,
									'ps_cancelaton_ref'=>$request->cpp,
				'ps_updated_at'=>now()]
		);
	});
}

}
