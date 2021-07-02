<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Services\ServiceTour;


class ServiceTourController extends Controller
{
    //

    public function getTours(Request $req)
    {
        $service =  $this->clean_input($req->service);
        $limit =  $this->clean_input($req->limit);
        $offset =  $this->clean_input($req->offset);
        $serviceTour = new ServiceTour();
        $result =  $serviceTour->getTours($service,$limit,$offset);
        return $result;
        
       
    }

    public function getTour(Request $req)
    {
        $id =  $this->clean_input($req->id);
        $serviceTour = new ServiceTour();
        $result =  $serviceTour->findTour($id);
        return $result;
    }
}
