<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Model\Merchant\Profile;
use App\Model\Merchant\UserModel;
use App\Model\Admin\LocationCountyModel;
use App\user\WishlistHotelsRoom;

use App\user\PageReviewsModel;

class ReviewsController extends Controller
{
    //
    

    public function index(Request $req)
    {
        $hotelList = null;
        $tourList = null;
        $data['error'] = [];
        $data['msg'] = [];
        $data['data'] = [];
        // /. data declaration


        $country = $this->accnt_country();
        // /. get countries
        $account = UserModel::where('users.id', Auth::user()->id)->get();
        
        $reviewList = $this->getAllMyReviews($req->service,$req->status);
        // /.users info
        $data['data']['account'] = $account;
        $data['data']['country'] = $country;
        // return $reviewList;
        return view('tourismo.account.account_review_index',compact("reviewList","data"));

    }

    protected function getAllMyReviews($service,$status)
    {

        $reviewDatas = PageReviewsModel::where('page_reviews.pr_user_id', Auth::user()->id);
        $reviewDatas = $reviewDatas->where('page_reviews.pr_temp_status',1);
        $reviewDatas = $reviewDatas->join('service_tour', 'service_tour.id', '=', 'page_reviews.pr_page_id');
        $reviewDatas = $reviewDatas->paginate(9);
        if($service != 'service'){
            $reviewDatas = $reviewDatas->where('service_tour.service_id', $service);
        }

        if($status != 'status'){
            $reviewDatas = $reviewDatas->where('status_payment.ps_payment_status', $status);
        }
        return $reviewDatas;
        
    }
    protected function getAllMyBooking()
    {
        # code...
    }

    public function accnt_country() {
        return LocationCountyModel::where('temp_status',1)->get();
    }

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

    public function submitReviews(Request $req){
        $reviewsData['pr_user_id'] = Auth::user()->id;
        $reviewsData['pr_review'] = $this->clean_input($req->pr_review);
        $reviewsData['pr_ratings'] = (int) $req->pr_ratings;
        $reviewsData['pr_created_at'] = $this->getDatetimeNow();
        $reviewsData['pr_page_id'] = $req->pr_page_id;
        if($reviewsData['pr_ratings'] <= 0){
            return redirect()->back()->withErrors(['msg', 'The Message']);
        }
        $reviewId = PageReviewsModel::insertGetId($reviewsData); // save dynamic key  value pairs, key must exist as cols in db
        return redirect()->back()->withSuccess('review success');


    }
        
}
