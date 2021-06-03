<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\user\PageReviewsModel;

class ReviewsController extends Controller
{
    //

    public function sumbitHotelReview(Request $req){
        $reviewsData['pr_user_id'] = Auth::user()->id;
        $reviewsData['pr_review'] = $this->clean_input($req->pr_review);
        $reviewsData['pr_ratings'] = (int) $req->pr_ratings;
        $reviewsData['pr_page_name'] = 'hotel';
        $reviewsData['pr_created_at'] = $this->getDatetimeNow();
        $reviewsData['pr_page_id'] = $req->pr_page_id;

        if($reviewsData['pr_ratings'] <= 0){
            return redirect()->back()->withErrors(['msg', 'The Message']);
        }
        $reviewId = PageReviewsModel::insertGetId($reviewsData); // save dynamic key  value pairs, key must exist as cols in db
        return redirect()->back()->withSuccess('review success');

    }

    public function sumbitTourReview(Request $req){
        $reviewsData['pr_user_id'] = Auth::user()->id;
        $reviewsData['pr_review'] = $this->clean_input($req->pr_review);
        $reviewsData['pr_ratings'] = (int) $req->pr_ratings;
        $reviewsData['pr_page_name'] = 'tour';
        $reviewsData['pr_created_at'] = $this->getDatetimeNow();
        $reviewsData['pr_page_id'] = $req->pr_page_id;

        if($reviewsData['pr_ratings'] <= 0){
            return redirect()->back()->withErrors(['msg', 'The Message']);
        }
        $reviewId = PageReviewsModel::insertGetId($reviewsData); // save dynamic key  value pairs, key must exist as cols in db
        return redirect()->back()->withSuccess('review success');


    }
        
}
