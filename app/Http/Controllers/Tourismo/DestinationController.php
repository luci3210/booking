<?php

namespace App\Http\Controllers\Tourismo;


use App\Model\Admin\LocationCountyModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    
    public function __construct() {

    }

    public function country($destination) {

        return LocationCountyModel::where('location_country.country',$destination)->get()->first();
    }
    public function location($destination) {

        $location = $this->country($destination);

        return view('tourismo.destination', compact('location'));

    }
}
