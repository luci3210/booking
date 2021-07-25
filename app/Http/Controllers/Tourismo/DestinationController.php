<?php

namespace App\Http\Controllers\Tourismo;


use App\Model\Admin\LocationCountyModel;
use App\Model\Merchant\TourModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    
    public function __construct() {
    }

    public function country($country) {

        return LocationCountyModel::where('location_country.country',$country)->get()->first();
    }


    public function location($country) {

        $location = $this->country($country);

        return view('tourismo.destination', compact('location'));

    }

    public function district($country=null,$district=null) {

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

    public function by_get_name($category=null,$country=null,$district=null,$name=null) {

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

                                'service_tour.tour_desc',
                                'service_tour.tour_expect',
                                'service_tour.serviceid',

                                'location_country.*','locations_district.*','products.name','products.description','profiles.company','profiles.address']);

        if(empty($get_name[0])) {

                abort(404,'Data not found.!');
            } 
        else 
        {

                return $get_name;
            }

    }

    public function by_get_photos($name=null) {

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

    public function by_district($country=null,$district=null) {

        $bydistrict = $this->district($country,$district);

        return view('tourismo.by_district', compact('bydistrict'));

    }

    public function by_name($category=null,$country=null,$district=null,$name=null) {

        $byname = $this->by_get_name($category,$country,$district,$name);
        $byphotos = $this->by_get_photos($name);

        return view('tourismo.by_service_name', compact('byname','byphotos'));

    }
}
