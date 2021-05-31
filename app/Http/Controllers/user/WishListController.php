<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\user\WishlistHotelsRoom;
use Illuminate\Support\Facades\Auth;
use App\Model\Merchant\Profile;
use App\Model\Merchant\UserModel;
use App\Model\Admin\LocationCountyModel;

use App\Model\Merchant\HotelPhoMoldel;

use App\Model\Merchant\HotelModel;

class WishListController extends Controller
{
    // init
    public function __construct(){
        $this->middleware('auth:web');
    }
    
    public function index(){
    $data['error'] = [];
    $data['msg'] = [];
    $data['data'] = [];
    // /. data declaration


    $country = $this->accnt_country();
    // /. get countries
    $account = UserModel::where('users.id', Auth::user()->id)->get();
    // /.users info

    $data['data']['account'] = $account;
    $data['data']['country'] = $country;
    $hotel_ids = [];

    $hotelList = WishlistHotelsRoom::where('wishlist.wh_user_id', Auth::user()->id);
    $hotelList = $hotelList->where('wishlist.wh_temp_status',1);
    $hotelList = $hotelList->where('wishlist.wh_page_name','hotel');
    $hotelList = $hotelList->join('hotels', 'wishlist.wh_page_id', '=', 'hotels.id');
    $hotelList = $hotelList->join('merchant_address', 'hotels.address_id', '=', 'merchant_address.id');
    // $hotelList = $hotelList->join('hotel_photos', 'wishlist.wh_page_id', '=', 'hotels.id');
    // $hotelList = $hotelList->where('hotel_photos.temp_status',1);
    $hotelList = $hotelList->get();
    // $hotelList[0]['photos'] = ['das;djkas.jpg', 'dasdjhsadasd.jpg'];
    // $hotelList['id'] = $hotelList[0]['id'];
    for($i=0; $i<count($hotelList); $i++){
        array_push($hotel_ids, $hotelList[$i]['id']);
    }
    $photos = HotelPhoMoldel::whereIn('upload_id',$hotel_ids);
    $photos = $photos->where('temp_status', 1);
    $photos = $photos->get();
    // $hotelList['idsss'] = $hotel_ids;
    // $hotelList['potato'] = $photos;
    // return $hotelList;

    $tourList = WishlistHotelsRoom::where('wishlist.wh_user_id', Auth::user()->id);
    $tourList = $tourList->where('wishlist.wh_temp_status',1);
    $tourList = $tourList->where('wishlist.wh_page_name','tour');
    $tourList = $tourList->join('service_tour', 'wishlist.wh_page_id', '=', 'service_tour.id');
    $tourList = $tourList->get();

    // return $hotelList;

    
    return view('tourismo.account.account_wishlist_index',compact("data","hotelList","photos", "tourList"));
    }
    
    public function accnt_country() {
        return LocationCountyModel::where('temp_status',1)->get();
    }

    public function toggle_wishlist(Request $req){
    
        $data['error'] = [];
        $data['data'] = [];
        $data['success'] = false;
        $data['msg'] = [];
        $wishlist_id = $req->data_id;
        $pagename = $req->wh_page_name;
        $checkList = WishlistHotelsRoom::where('wh_page_id', $wishlist_id);
        $checkList = $checkList->where('wh_user_id', Auth::user()->id);
        $checkList = $checkList->where('wh_temp_status', 1);
        $checkList = $checkList->where('wh_page_name', $pagename);
        $checkList = $checkList->first();
        if($checkList != null){
            $data['msg'] = 'removed';
            $checkList->wh_temp_status = 4;
            $checkList->update();
            $data['success'] = true;
    
        }
        if($checkList == null){
            $data['msg'] = 'added';
            $data['success'] = true;
            $addToWishList = new WishlistHotelsRoom();
            $addToWishList->wh_page_id =$wishlist_id;
            $addToWishList->wh_user_id = Auth::user()->id;
            $addToWishList->wh_page_name = $pagename;
            $addToWishList->save();
        }
    
        // $data['data'] = $wishlist_id;
        return $data;
    
    }
    



}
