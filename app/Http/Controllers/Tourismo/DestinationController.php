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

        return $district = TourModel::join('locations_district','locations_district.id', 'service_tour.district')
                ->join('location_country','location_country.id', 'locations_district.country_id')
                ->join('service_tour_photos','service_tour_photos.upload_id','service_tour.id')
                    ->where('location_country.country', $country)
                    ->where('locations_district.district',$district)
                    ->where('service_tour_photos.cover',1)
                        // ->groupBy('service_tour_photos.upload_id')
                         ->get(['service_tour.tour_name','service_tour.price','service_tour.nonight','location_country.*','locations_district.*']);

    }

    public function by_district($country,$district) {

        $bydistrict = $this->district($country,$district);

        return view('tourismo.by_district', compact('bydistrict'));

    }
}
