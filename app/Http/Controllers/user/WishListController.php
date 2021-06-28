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
        $wishListData = $this->getAllMyWishList();
        // return $wishListData;
        return view('tourismo.account.account_wishlist_index',compact("data","wishListData"));
    }

    protected function getAllMyWishList(){

        $tourList = WishlistHotelsRoom::where('wishlist.wh_user_id', Auth::user()->id);
        $tourList = $tourList->where('wishlist.wh_temp_status',1);
        $tourList = $tourList->join('service_tour', 'wishlist.wh_page_id', '=', 'service_tour.id');
        $tourList = $tourList->paginate(9);
        return $tourList;
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
        $checkList = WishlistHotelsRoom::where('wh_page_id', $wishlist_id);
        $checkList = $checkList->where('wh_user_id', Auth::user()->id);
        $checkList = $checkList->where('wh_temp_status', 1);
        // $checkList = $checkList->where('wh_page_name', $pagename);
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
            $addToWishList->save();
        }
    
        // $data['data'] = $wishlist_id;
        return $data;
    
    }
    



}
