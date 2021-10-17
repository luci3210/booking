<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MerchantProfileController;

use App\Model\ProfileServiceModel;
use App\Model\ServiceModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

use App\Http\Requests\Merchant\PostServiceProfile;

use Illuminate\Support\Facades\Auth;

class ProfileServicesController extends Controller
{
    private $identity;

	public function __construct(MerchantProfileController $identity) {

		$this->getIdentity = $identity;

	}

protected function index($id) {

		if(!$this->getIdentity->getAuthUser()->profile) {

			return $this->getIdentity->getAuthUser();
		}


		try {

		$data = ServiceModel::where(function ($query) use($id) {
			$query->from('products')
				->where([['id',$id], ['temp_status',1]]);
		})->select('id','name','description','icon_id')->firstOrFail();

		return view('merchant_dashboard.profile.profile_services',compact('data'));

		} catch(\Exception $e) {

			return view('errors.merchant.web.pageNotfound');
		}
	}

protected function create_service(PostServiceProfile $request, $id)
	{
		if(!$this->getIdentity->getAuthUser()->profile) {

			return $this->getIdentity->getAuthUser();

		}

		try {
			ProfileServiceModel::firstOrCreate(
			[
				'ps_profile_id'=>$this->getIdentity->getAuthUser()->profile,
					'ps_service_id'=>$id,
						'ps_name'=>$request->hotel_name,
							'ps_description'=>$request->description,
								'ps_lat'=>$request->lat,
									'ps_lng'=>$request->long,
										'ps_address'=>$request->address,
											'ps_country'=>$request->country,
												'ps_district'=>$request->provice,
				'ps_city'=>$request->city,
					'ps_facilities'=>$request->facilities,
						'ps_check_in_out'=>$request->cico,
							'ps_roles_desc'=>$request->extra,
								'ps_attraction'=>$request->attraction,
									'ps_cancelaton_ref'=>$request->cpp,
									'ps_temp'=>1,
				'ps_created'=>now()
			]
		);

		return redirect('merchant/profile/profile')->withSuccess('Profile service, Successfully added.');

		} catch(\Exception $e) {
		
			return view('errors.merchant.web.pageNotfound');
		
			}

	}

protected function edit_service($id) {

	if(!$this->getIdentity->getAuthUser()->profile) {

			return $this->getIdentity->getAuthUser();

		}

	try {

	$data = ProfileServiceModel::where(function ($query) use($id) {
		$query->from('profile_services')
			->where('ps_id',$id);
	})->firstOrFail();
	
	return view('merchant_dashboard.profile.profile_service_edit',compact('data'));

	} catch(\Exception $e) {

		return view('errors.merchant.web.pageNotfound');
	}
}

protected function update_service(PostServiceProfile $request, $id) {

	if(!$this->getIdentity->getAuthUser()->profile) {

			return $this->getIdentity->getAuthUser();

		}

	
	try {

	ProfileServiceModel::where(function ($query) use($id,$request) {

		$query->from('profile_services')->where([['ps_id',$id],['ps_profile_id',$this->getIdentity->getAuthUser()->profile]])
			->update(
				['ps_name'=>$request->hotel_name,
					'ps_description'=>$request->description,
						'ps_lat'=>$request->lat,
							'ps_lng'=>$request->long,
								'ps_address'=>$request->address,
									'ps_country'=>$request->country,
										'ps_district'=>$request->provice,
				'ps_city'=>$request->city,
					'ps_facilities'=>$request->facilities,
						'ps_check_in_out'=>$request->cico,
							'ps_roles_desc'=>$request->extra,
								'ps_attraction'=>$request->attraction,
									'ps_cancelaton_ref'=>$request->cpp,
										'ps_temp'=>$request->status,
				'ps_updated'=>now()]
		);
	});

	return redirect('merchant/profile/profile')->withSuccess('Profile service, Successfully updated.');
	
	} catch(\Exception $e) {

		return view('errors.merchant.web.pageNotfound');

	}
}

}
