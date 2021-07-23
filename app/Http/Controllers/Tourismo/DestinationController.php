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
                    ->where([
                        ['location_country.country', $country],
                                ['locations_district.district',$district]
                            ])
                         ->get(['service_tour.cover','service_tour.tour_name','service_tour.price','service_tour.nonight','service_tour.noguest','location_country.*','locations_district.*']);

        if(empty($districts[0])) {

                abort(404,'Data not found.!');
            } 
        else 
        {

                return $districts;
            }

    }

    public function by_get_name($country=null,$district=null,$name=null) {

        $get_name = TourModel::join('locations_district','locations_district.id', 'service_tour.district')
                ->join('location_country','location_country.id', 'locations_district.country_id')
                    ->where([
                        ['location_country.country', $country],
                            ['locations_district.district',$district],
                                ['service_tour.tour_name',$name]
                            ])
                         ->get(['service_tour.cover','service_tour.tour_name','service_tour.price','service_tour.nonight','service_tour.noguest','location_country.*','locations_district.*']);

        if(empty($get_name[0])) {

                abort(404,'Data not found.!');
            } 
        else 
        {

                return $get_name;
            }

    }

    public function by_district($country=null,$district=null) {

        $bydistrict = $this->district($country,$district);

        return view('tourismo.by_district', compact('bydistrict'));

    }

    public function by_name($country=null,$district=null,$name=null) {

        $bydistrict = $this->by_get_name($country,$district,$name);

        return view('tourismo.by_district', compact('bydistrict'));

    }
}
