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

use App\Http\Controllers\Controller;
use App\Http\Controllers\Merchant\ProfileController;

use App\Http\Requests\MerchantPostTour;
use App\Http\Requests\MerchantPostHotel;
use App\Http\Requests\MerchantPostExlusive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceListingController extends Controller
{

    private $profile;


    public function __construct(ProfileController $profile) {

        $this->middleware('auth:web');
        $this->profile = $profile;
    }


    public function desc_name($desc)  {

        return ProductModel::where('temp_status',1)->where('description',$desc)->get(['id','name','description'])->first();

    }

    public function service_post($desc) {


        return TourModel::where('service_id',$this->desc_name($desc)->id)->where('profid',$this->profile->profile_check()->id)->get();    
        
    }

    public function index($desc) {

        $service_name = $this->desc_name($desc);
        $service_post = $this->service_post($desc);

        return view('merchant_dashboard.service.index',compact('service_name','service_post'));
    }

    public function service_create_post($desc) {

        $service_name = $this->desc_name($desc);
        $room_facilities = $this->room_facilities();
        $building_facilities = $this->building_facilities();
        $packages_facilities = $this->packages_facilities();
        $address = $this->address();
        $verify = $this->account_verify();
        $country = $this->country();

        if($desc == 'exlcusive') {

            return view('merchant_dashboard.service.create_form_exlusive',compact('address','service_name','room_facilities','building_facilities','packages_facilities','country','verify'));

        } else {

            return view('merchant_dashboard.service.create_form',compact('address','service_name','room_facilities','building_facilities','packages_facilities','country','verify'));   
    
        }

    }

    public function account_verify() {

            return MerchantVerifyModel::where('prof_id',$this->profile->profile_check()->id)->orderBy('id', 'DESC')->first();
        }

    public function address() {

        return MerchantAddress::where('prof_id',$this->profile->profile_check()->id)->where('temp_status',1)->get();
    }


    public function exlusive_create_post(MerchantPostExlusive $request, $id) {

        $getLastData = TourModel::create([
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
            'city' => $request->place,
            'profid' => $this->profile->profile_check()->id,
            'service_id' => $id,
            'temp_status' => 2
          ]);

        $lastId = $getLastData->id;
        $lastService = $getLastData->service_id;

        $serviceName = ProductModel::where('id',$lastService)->get()->first();

        return Redirect('merchant_dashboard/service/'.$lastId.'/upload_photos/'.$serviceName->description.'')->withSuccess('Successfully submit, Please continue adding photos.');

    }

    public function service_save_post(MerchantPostTour $request, $id) {

        $getLastData = TourModel::create([
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
            'city' => $request->place,
            'profid' => $this->profile->profile_check()->id,
            'service_id' => $id,
            'temp_status' => 2
          ]);

        $lastId = $getLastData->id;
        $lastService = $getLastData->service_id;

        $serviceName = ProductModel::where('id',$lastService)->get()->first();

        return Redirect('merchant_dashboard/service/'.$lastId.'/upload_photos/'.$serviceName->description.'')->withSuccess('Successfully submit, Please continue adding photos.');

    }

    public function service_save_hotel(MerchantPostHotel $request, $id) {

        $getLastData = TourModel::create([
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
            'building_facilities' => implode(',', $request->buiding_facilities),
            'booking_package' => implode(',', $request->booking_package),

            'serviceid' => $request->address,
            'country' => $request->country,
            'district' => $request->province,
            'city' => $request->place,
            'profid' => $this->profile->profile_check()->id,
            'service_id' => $id,
            'temp_status' => 2
          ]);

        $lastId = $getLastData->id;
        $lastService = $getLastData->service_id;

        $serviceName = ProductModel::where('id',$lastService)->get()->first();

        return Redirect('merchant_dashboard/service/'.$lastId.'/upload_photos/'.$serviceName->description.'')->withSuccess('Successfully submit, Please continue adding photos.');

    }

    

    public function service_update_photos($id,$desc) {

        $service_name = $this->desc_name($desc);
        $service_post = $this->get_post($id);

        return view('merchant_dashboard.service.create_update_photos',compact(['service_name','service_post']));   

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

    public function room_facilities() {

        return RoomFaciliModel::where('temp_status',1)->orderBy('name')->distinct()->get();
    }

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
