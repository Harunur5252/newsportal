<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function social(){
        $social =  DB::table('socials')->first();
        return view('backend.pages.social.social',[
            'social'=>$social,
        ]);
    }

    public function update(Request $request){

        $this->validate($request,[
            'facebook' =>'required|max:60',
            'youtube' =>'required|max:60',
            'twitter' =>'required|max:60',
            'linkedin' =>'required|max:60',
            'instagram' =>'required|max:60',
         ]);

         $social = DB::table('socials')->where('id',$request->id)->update([
            'facebook' => $request->facebook,
            'youtube' => $request->youtube,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
        ]);

        if($social){
            $notification = array(
                'message' => 'Successfully Updated',
                'alert-type' => 'success'
            );
            return Redirect::back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Not Updated!',
                'alert-type' => 'error'
            );
            return Redirect::back()->with($notification);
        }
    }
}
