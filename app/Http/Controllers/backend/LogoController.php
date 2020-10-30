<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Image;
class LogoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function createLogo(){
    	$logo = DB::table('logos')->first();
    	return view('backend.pages.logo.logo',[
          'logo'=>$logo,
    	]);
    }
    public function update(Request $request){
       $this->validate($request,[
         'logo'=>'mimes:png,jpg,jpeg|max:3000',
       ]);

        $image = $request->logo;

        if($image){

         	$imageName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(320,130)->save('backendAssets/logo/'.$imageName);
            $imageUrl ='backendAssets/logo/'.$imageName;

            $logo = DB::table('logos')->where('id',$request->id)->update([
         
              'logo'=>$imageUrl,

            ]);

            if($logo){
            $notification = array(
                'message' => ' Logo Successfully Update',
                'alert-type' => 'success'
            );
             return Redirect::back()->with($notification);
            }
         }else{

         	$notification = array(
                'message' => 'Not Update',
                'alert-type' => 'error'
            );
             return Redirect::back()->with($notification);
         }
    }
       
}
