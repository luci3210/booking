<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    //

    public function sumbitHotelReview(){
        redirect('merchant')->withSuccess('Successfully updated!');
    }
}
