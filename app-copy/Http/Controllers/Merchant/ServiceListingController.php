<?php

namespace App\Http\Controllers\Merchant;

use App\Model\Admin\ProductModel;
use App\Model\Admin\RoomFaciliModel;
use App\Model\Admin\BuildingFaciliModel;
use App\Model\Admin\PackageincluModel;
use App\Model\Admin\LocationCountyModel;

use App\Model\Merchant\LocationBarangayModel;
use App\Model\Merchant\LocationMunicipalityModel;
use App\Model\Merchant\LocationCityModel;
use App\Model\Merchant\LocationDistrictModel;
use App\Model\Merchant\LocationRegionModel;
use App\Model\Merchant\TourModel;
use App\Model\Merchant\TourPhoModel;
use App\Model\MerchantVerifyModel;
use App\Model\Merchant\MerchantAddress;
use App\Model\ProfileServiceModel;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Merchant\ProfileController;
use App\Http\Controllers\MerchantProfileController;

use App\Http\Requests\MerchantPostTour;
use App\Http\Requests\MerchantPostHotel;
use App\Http\Requests\MerchantPostExlusive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceListingController extends Controller
{

    private $profile;
    private $identity;


    public function __construct(ProfileController $profile, MerchantProfileController $identity) {

        $this->profile = $profile;
        $this->getIdentity = $identity;
    }


    public function desc_name($desc)  {

        return ProductModel::where('temp_status',1)->where('description',$desc)->get(['id','name','description'])->first();

    }

    public function service_post($desc) {


        return TourModel::where('service_id',$this->desc_name($desc)->id)
            ->where('profid',$this->getIdentity->getAuthUser()->profile)->get();    
        
    }

    public function create_cover($desc, $id) {
  
        $service_name = $this->desc_name($desc);
        $service_post = $this->service_post($desc);
        $get_post = $this->get_post($id);

        return view('merchant_dashboard.service.create_form_cover',compact('service_name','service_post','get_post'));

    }

    public function upload_cover(Request $request,$id=null) {

        $path = 'image/cover/2021/';
        $file = $request->file('cover_pic');

        $new_image_name = 'cover2021'.$this->profile->profile_check()->id.date('Ymd').uniqid().'.jpg';

        $move = $file->move(public_path($path),$new_image_name);

        if(!$move) {

            return response()->json(['status'=>0, 'msg'=>'Something went wrong, try again later']);

        }

            TourModel::where('id',$id)->where('profid',$this->profile->profile_check()->id)->update(['cover' => $new_image_name]);

        return response()->json(['status'=>1, 'msg'=>'Cover successfully updated.', 'cover'=>$new_image_name]);


    }

protected function verify() {

    $data = MerchantVerifyModel::join('profiles','profiles.id','merchant_verify.prof_id')

            ->where(function($query) {
                $query->from('merchant_verify')
                    ->where('profiles.id',$this->profile->profile_check()->id)
                    ->where('merchant_verify.verify_id',3);
            })->get();
    }


    public function index($desc) {

        $data = MerchantVerifyModel::join('profiles','profiles.id','merchant_verify.prof_id')

            ->where(function($query) {
                $query->from('merchant_verify')
                    ->where('profiles.id',$this->profile->profile_check()->id)
                        ->where('merchant_verify.verify_id',3);
            })->get();

        if(count($data) == 1) {
         
            $service_name = $this->desc_name($desc);
            $service_post = $this->service_post($desc);
            
            return view('merchant_dashboard.service.index',compact('service_name','service_post'));

         }  elseif (count($data) >= 2) {
             
             abort(403, 'Unauthorized action. "Multiple verification ID"');
         }

            else {

            abort(403, 'Unauthorized action.');
        }
    }

protected function create_service($desc) {

    if(!$this->getIdentity->getAuthUser()->profile) {

            return $this->getIdentity->getAuthUser();
        }

    $service_name = $this->desc_name($desc);

    switch ($desc) {
     
        case 'hotel_and_resort':
            
            $hotel = ProfileServiceModel::where(function($query) {

                $query->from('profile_services')

                    ->where('profile_services.ps_profile_id',$this->getIdentity->getAuthUser()->profile);

            })->select('profile_services.ps_name','profile_services.ps_id','profile_services.ps_address')

                ->orderBy('profile_services.ps_name','asc')->get();

            return view('merchant_dashboard.service.form_create_hotel',compact('hotel','service_name'));

            break;

        case 'tour_operator':
     
                dd('others');
                break;

        default:
            
            return view('errors.merchant.web.pageNotfound');
            break;
    }
}

protected function service_save_hotel(MerchantPostHotel $request, $id) {

    if(!$this->getIdentity->getAuthUser()->profile) {

            return $this->getIdentity->getAuthUser();
        }

    try {

    $getLastData = TourModel::firstOrCreate([
        'tour_name' => $request->room_name,
        'price' => $request->price,
        'nonight' => $request->no_night,
        'noguest' => $request->no_guest,
        'qty' => $request->quantity,
        'roomdesc' => $request->room_description,
        'roomsize' => $request->room_size,
        'viewdeck' => $request->views,
        'nobed' => $request->number_bed,
        'room_facilities' => implode(',', $request->room_facilities),
        'serviceid' => $request->hotel,
        'profid' => $this->getIdentity->getAuthUser()->profile,
        'service_id' => $id,
        'temp_status' => 2
      ]);

    $lastId = $getLastData->id;
    $lastService = $getLastData->service_id;

    $serviceName = ProductModel::where('id',$lastService)->get()->first();

    return Redirect('merchant.dashboard/service/'.$lastId.'/upload_photos/'.$serviceName->description.'')->withSuccess('Successfully save., Please continue adding photos.');
    
    } catch(\Exception $e) {

        return view('errors.merchant.web.pageNotfound');

    }
  }  

protected function service_update_photos($id,$desc) {

    if(!$this->getIdentity->getAuthUser()->profile) {

            return $this->getIdentity->getAuthUser();
        }

    $service_name = $this->desc_name($desc);
    $service_post = $this->get_post($id);

    return view('merchant_dashboard.service.create_update_photos',compact(['service_name','service_post']));   

    }





















public function service_create_post($desc) {

$data = MerchantVerifyModel::join('profiles','profiles.id','merchant_verify.prof_id')

->where(function($query) {
    $query->from('merchant_verify')
        ->where('profiles.id',$this->profile->profile_check()->id)
            ->where('merchant_verify.verify_id',3);
})->get();



 if(count($data) == 1) {
         
    $service_name = $this->desc_name($desc);
    $room_facilities = $this->room_facilities();
    $building_facilities = $this->building_facilities();
    $packages_facilities = $this->packages_facilities();
    $address = $this->address();
    $verify = $this->account_verify();
    $country = $this->country();


        if($desc == 'exlcusive') {

            return view('merchant_dashboard.service.create_form_exlusive',compact('address','service_name','room_facilities','building_facilities','packages_facilities','country','verify'));

        } elseif($desc == 'hotel_and_resort') {

            $hotel = ProfileServiceModel::where(function($query) {
                $query->from('profile_services')
                    ->where('profile_services.ps_profile_id',$this->getIdentity->getAuthUser()->profile);
            })->select('profile_services.ps_name','profile_services.ps_id','profile_services.ps_address')
                ->orderBy('profile_services.ps_name','asc')
                    ->get();


            return view('merchant_dashboard.service.form_create_hotel',compact('address','service_name','room_facilities','building_facilities','packages_facilities','country','verify','hotel'));   
        } else {

            return view('merchant_dashboard.service.create_form',compact('address','service_name','room_facilities','building_facilities','packages_facilities','country','verify'));

        }

     }  elseif (count($data) >= 2) {
         
         abort(403, 'Unauthorized action. "Multiple verification ID"');
     }

        else {

        abort(403, 'Unauthorized action.');
    }


}

    public function account_verify() {

            return MerchantVerifyModel::where('prof_id',$this->profile->profile_check()->id)->orderBy('id', 'DESC')->first();
        }

    public function address() {

        return MerchantAddress::where('prof_id',$this->profile->profile_check()->id)->where('temp_status',1)->get();
    }


    public function exlusive_create_post(MerchantPostExlusive $request, $id) {

        $getLastData = TourModel::firstOrCreate([
            'tour_name' => $request->tour_package_name,
            'price' => $request->price,
            'nonight' => $request->no_night,
            'noguest' => $request->no_guest,
            'qty' => $request->quantity,
            'tour_desc' => $request->tour_package_desc,
            'tour_expect' => $request->what_expect,
            'can_ref_policy' => $request->cancelation,
            'building_facilities' => implode(',', $request->facilities),
            'booking_package' => implode(',', $request->package),
            'serviceid' => $request->address,
            'country' => $request->country,
            'district' => $request->province,
            'lat' => $request->lat,
            'lng' => $request->long,
            'city' => $request->place,
            'profid' => $this->profile->profile_check()->id,
            'service_id' => $id,
            'temp_status' => 2
          ]);

        $lastId = $getLastData->id;
        $lastService = $getLastData->service_id;

        $serviceName = ProductModel::where('id',$lastService)->get()->first();

        return Redirect('merchant.dashboard/service/'.$lastId.'/upload_photos/'.$serviceName->description.'')->withSuccess('Successfully submit, Please continue adding photos.');

    }

    public function service_save_post(MerchantPostTour $request, $id) {

        $getLastData = TourModel::firstOrCreate([
            'tour_name' => $request->tour_package_name,
            'price' => $request->price,
            'nonight' => $request->no_night,
            'noguest' => $request->no_guest,
            'qty' => $request->quantity,
            'tour_desc' => $request->tour_package_desc,
            'tour_expect' => $request->what_expect,
            'can_ref_policy' => $request->cancelation,
            'building_facilities' => implode(',', $request->facilities),
            'booking_package' => implode(',', $request->package),
            'serviceid' => $request->address,
            'country' => $request->country,
            'district' => $request->province,
            'lat' => $request->lat,
            'lng' => $request->long,
            'city' => $request->place,
            'profid' => $this->profile->profile_check()->id,
            'service_id' => $id,
            'temp_status' => 2
          ]);

        $lastId = $getLastData->id;
        $lastService = $getLastData->service_id;

        $serviceName = ProductModel::where('id',$lastService)->get()->first();

        return Redirect('merchant.dashboard/service/'.$lastId.'/upload_photos/'.$serviceName->description.'')->withSuccess('Successfully submit, Please continue adding photos.');

    }


    public function get_post($id) {

        return TourModel::where('id',$id)->get()->first();
    }

    public function service_upload_photos(Request $request, $id)  {
    
        $imageName = $request->file('file');
        
        $new_image_name = '2021'.$this->profile->profile_check()->id.date('Ymd').uniqid().'.jpg';

        request()->file->move(public_path('image/tour/2021'), $new_image_name);
        TourPhoModel::create(['merchant_id' => $this->profile->profile_check()->id, 'upload_id' => $id, 'photo' => $new_image_name]);

        return response()->json(['uploaded' => '/image/tour/2021'.$new_image_name]);
    }


////////// remove
    public function room_facilities() {

        return RoomFaciliModel::where('temp_status',1)->orderBy('name')->distinct()->get();
    }
////////////

    public function building_facilities() {

        return BuildingFaciliModel::where('temp_status',1)->orderBy('name')->distinct()->get();
    }

    public function packages_facilities() {

        return PackageincluModel::where('temp_status',1)->orderBy('name')->distinct()->get();
    }

    public function country() {
    return LocationCountyModel::where('temp_status',1)->orderBy('country')->get();
    }

    public function find_region_id($id)
    {
        return json_encode(LocationRegionModel::select()->where('country_id',$id)->get());
    }
    public function find_district_id($id)
    {
        return json_encode(LocationDistrictModel::select()->where('region_id',$id)->get());
    }
    public function find_city_id($id)
    {
        return json_encode(LocationCityModel::select()->where('district_id',$id)->get());
    }
    public function find_municipality_id($id)
    {
        return json_encode(LocationMunicipalityModel::select()->where('city_id',$id)->get());   
    }
    public function find_barangay_id($id)
    {
        return json_encode(LocationBarangayModel::select()->where('municipality_id',$id)->get());   
    }
}
