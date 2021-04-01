<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Model\Merchant\Profile;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    // public function __construct()
    // {
    //   $this->middleware('Auth:web');
    // }
    public function crop(Request $request)
    {
	      $path = 'upload/merchant/profilepic/';
	      $file = $request->file('file');
	      $new_image_name = 'UIMG'.date('Ymd').uniqid().'.jpg';

	      $upload = $file->move(public_path($path), $new_image_name);

	      if(!$upload)
	      {
            return response()->json(['status'=>0, 'msg'=>'Something went wrong, try again later']);
      		}
      	else
      	{

  		// $merchant = Profile::where('user_id','=',Auth::user()->id)->first();
  		// $merchantPic = $merchant->profilepic;

  		// if($merchantPic != '') {
  		// 	unlink($path.$merchantPic);
  		// } 

  		Profile::where('profiles.user_id','=',Auth::user()->id)->update(['profiles.profilepic'=>$new_image_name]);
  		return response()->json(['status'=>1, 'msg'=>'Image has been cropped successfully.', 'profilepic'=>$new_image_name]);
      }
    }
}
