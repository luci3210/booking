<?php

namespace App\Http\Controllers\Merchant;

use App\Model\Admin\ProductModel;
use App\Model\Admin\RoomFaciliModel;

use App\Model\Merchant\HotelPhoMoldel;
use App\Model\Merchant\Profile;
use App\Model\Merchant\HotelModel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ServiceController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:web');	
    }

public function inclusion_room {

    return RoomFaciliModel::where('')
}

public function index($id)
    {
    	$profpic = Profile::join('users','users.id','=','profiles.user_id')
    	->where('users.id','=',Auth::user()->id)->get(['users.*','profiles.*']);

    	$product = ProductModel::join('temp_status','temp_status.id','=','products.temp_status')
    		->where('products.id','=',$id)
    		->where('temp_status.status','=','active')->get(['products.id as productid','products.name','products.temp_status','temp_status.id','temp_status.status'])->first();

    	return view('merchant.services.index',compact(['profpic','product']));
    }
public function savehotel(Request $request)
    {
    	 $rules = [
            'price' => 'required',
            'numnight' => 'required',
            'roomname' => 'required',
            'roomsize' => 'required',
            'roomdesc' => 'required',
            'viewdeck' => 'required',
            'numguest' => 'required',
            'numbed' => 'required'];

        $errMessage = ['required' => '* Enter your :attribute'];

   		$this->validate($request, $rules, $errMessage);   

        HotelModel::create(['price' => $request->price,
                                'nonight' => $request->numnight,
                                'roomname' => $request->roomname,
                                'roomsize' => $request->roomsize,
                                'roomdesc' => $request->roomdesc,
                                'viewdeck' => $request->viewdeck,
                                'noguest' => $request->numguest,
                                'nobed' => $request->numbed,
                                'picimages' => $request->_token,
                              	'profid' => Auth::user()->id]);

return redirect()->route('service', ['id' => 10016])->withSuccess('Successfully added!');
    }

public function get_cover_id()
{
   $getid =  HotelModel::where('profid',Auth::user()->id)->limit(1)->orderBy('id','desc')->get();
   $phtoid = $getid[0]->id +1;

   for ($x = 1; $x <= $phtoid; $x++) 
    {
        $valid = ($phtoid-$phtoid)+$phtoid;
    }
    return $valid;
}
public function upload_cover(Request $request)
    {
        $imageName = $request->file('file');
        $new_image_name = 'MER'.date('Ymd').uniqid().'.jpg';
 
        $count_id = $this->get_cover_id();
       
        request()->file->move(public_path('upload/merchant/coverphoto'), $new_image_name);

        HotelPhoMoldel::create(['merchant_id' => 1, 'upload_id' => $count_id, 'photo' => $new_image_name]); 

        return response()->json(['uploaded' => '/upload/merchant/coverphoto'.$new_image_name]);
    }


}
