<?php

namespace App\Http\Controllers\Tourismo;


use App\Model\Admin\LocationCountyModel;
use App\Model\Merchant\TourModel;
use App\Model\Admin\DestinationModel;


use App\user\PageReviewsModel;
use App\Model\Merchant\ProfileModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DestinationController extends Controller
{
    
    public function __construct() {

    }

    protected function countries() {

        $countries = DestinationModel::join('locations_district','locations_district.id','destinations.destination_id')
            ->where([ ['destinations.temp_status','=',1],
                ['destinations.country_id','<>',1] ])
                ->get(['locations_district.id as provice_id','destinations.*']);

        if(empty($countries[0])) {

                abort(404,'Data not found.!');
            } 
        else 
        {

                return $countries;
            }
    }

    protected function country($country=null) {

        $country = DestinationModel::join('location_country','location_country.id','destinations.country_id')
            ->where([ ['destinations.temp_status','=',1],
                ['location_country.country',$country] ])
                ->get(['location_country.country','destinations.*']);

        if(empty($country[0])) {

                abort(404,'Data not found.!');
            } 
        else 
        {
            return $country;
        }
    }

    public function location($country) {

        $location = $this->countries($country);

        return view('tourismo.destination', compact('location'));

    }

    protected function district($country=null,$district=null) {

        $districts = TourModel::join('locations_district','locations_district.id', 'service_tour.district')
                ->join('location_country','location_country.id', 'locations_district.country_id')
                ->join('products','service_tour.service_id', 'products.id')
                    ->where([
                        ['location_country.country', $country],
                                ['locations_district.district',$district]
                            ])
                         ->get(['service_tour.cover','service_tour.tour_name','service_tour.price','service_tour.nonight','service_tour.noguest','location_country.*','locations_district.*','products.description','products.name']);

        if(empty($districts[0])) {

                abort(404,'Data not found.!');
            } 
        else 
        {

                return $districts;
            }

    }

    protected function by_get_name($category=null,$country=null,$district=null,$name=null) {

        $get_name = TourModel::join('locations_district','locations_district.id', 'service_tour.district')
                ->join('location_country','location_country.id', 'locations_district.country_id')
                    ->join('products','service_tour.service_id', 'products.id')
                    ->join('profiles','service_tour.profid','profiles.id')
                        ->where([
                            ['location_country.country', $country],
                                ['locations_district.district',$district],
                                    ['service_tour.tour_name',$name],
                                        ['products.description',$category]
                                ])
                         ->get(['service_tour.viewdeck',
                                'service_tour.booking_package',
                                'service_tour.room_facilities',
                                'service_tour.building_facilities',
                                'service_tour.roomdesc',
                                'service_tour.price',
                                'service_tour.cover',
                                'service_tour.tour_name',
                                'service_tour.nonight',
                                'service_tour.noguest',
                                'service_tour.roomsize',
                                'service_tour.service_id',
                                'service_tour.id as st_id',
                                'service_tour.profid',

                                'service_tour.tour_desc',
                                'service_tour.tour_expect',
                                'service_tour.serviceid',

                                'location_country.*','locations_district.*','products.name','products.description',

                                'profiles.company',
                                'profiles.about',
                                'profiles.address']);

        if(empty($get_name[0])) {

                abort(404,'Data not found.!');
            } 
        else 
        {

                return $get_name;
            }

    }

    protected function by_get_photos($name=null) {

        $get_photos = TourModel::join('service_tour_photos','service_tour.id', 'service_tour_photos.upload_id')
                ->where([['service_tour.tour_name',$name]])
                         ->get(['service_tour_photos.id','service_tour_photos.upload_id','service_tour_photos.photo']);

        if(empty($get_photos[0])) {

                abort(404,'Data not found.!');
            } 
        else 
        {

                return $get_photos;
            }

    }

    protected function getReviews($name=null){

        $reviewsData = new PageReviewsModel();
        $reviewsData = $reviewsData->where([
            ['page_reviews.pr_temp_status', 1],
                ['service_tour.tour_name', $name]
                ]);
        $reviewsData = $reviewsData->join('service_tour','page_reviews.pr_page_id', 'service_tour.id');
        $reviewsData = $reviewsData->join('users', 'page_reviews.pr_user_id', 'users.id');
        $reviewsData = $reviewsData->paginate(2);
        $reviewsData = $reviewsData->setCollection($reviewsData->getCollection()->makeHidden(
        ['id',
        'password', 
        'email',
        'created_at',
        'updated_at',
        'bdate',
        'accnt_nu',
        'address',
        'pnumber',
        'remember_token',
        'email_verified_at',
        'job',
        ]));

    }

    protected function userCountry(){
       
        $userCountry = new LocationCountyModel();
        $userCountry = $userCountry->where([['id',Auth::user()->country]]);
        $country = $userCountry->get();

        if(empty($country[0])) {
                abort(404,'Data not found.!');
            } 
        else 
        {

            return $country;
        }
       
    }

    public function by_countries() {

        $getcountry = $this->countries();

        return view('tourismo.by_countries', compact('getcountry'));
    }

    public function by_country($country) {

        $country = $this->country($country); 
        return view('tourismo.by_country',compact('country'));   
    }

    public function by_district($country=null,$district=null) {

        $bydistrict = $this->district($country,$district);  
        return view('tourismo.by_district', compact('bydistrict'));

    }

    public function by_name($category=null,$country=null,$district=null,$name=null) {

        $byname = $this->by_get_name($category,$country,$district,$name);
        $byphotos = $this->by_get_photos($name);
        $reviewsData = $this->getReviews($name);


        return view('tourismo.by_service_name', compact('byname','byphotos','reviewsData'));

    }

    protected function getProfileCompany($id){
        $profile = new ProfileModel();
        $profile = $profile->where('id', $id);

        return $profile->get();
    }

    public function book($category=null,$country=null,$district=null,$name=null) {

        $byname = $this->by_get_name($category,$country,$district,$name);
        if(empty($byname) || count($byname) <= 0){
            abort(404,'404 Error - the requested page does not exist.');
        }

        $byphotos = $this->by_get_photos($name);
        $reviewsData = $this->getReviews($name);
        $country = $this->userCountry();
        $curDate = $this->getDateNow().'T00:00:00';
        $curDate2 = $this->getDateNowv2();
        $profileID = $byname[0]['profid'];
        $profileData = $this->getProfileCompany($profileID);


        return view('tourismo.book', compact('byname','byphotos','reviewsData','country', 'curDate', 'curDate2','profileData'));

    }
}
