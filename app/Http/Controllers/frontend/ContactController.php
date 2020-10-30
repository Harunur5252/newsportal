<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
class ContactController extends Controller
{
    public function contactUs(){
    	return view('frontend.pages.contact');
    }
    public function contactinformation(Request $request){

    	$this->validate($request,[
         'name'=>'required|min:3|max:20|alpha|alpha_dash|alpha_num',
         'phone'=>'required|min:11|numeric',
         'email'=>'required|min:3|max:40',
         'message'=>'required|min:3|max:1000|string',
    	]);
    	$contact = DB::table('contactus')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        if($contact){
            $notification = array(
                'message' => 'Thanks for your opinion',
                'alert-type' => 'success'
            );
          return Redirect::back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            return Redirect::back()->with($notification);
        }
    }
}
