<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
class NewslaterController extends Controller
{
    public function newslatter(Request $request){
    	$this->validate($request,[

          'email1'=>'required|unique:newslatters|max:40',
    	]);

    	$newslatter = DB::table('newslatters')->insert([
          'email1'=>$request->email1,
    	]);
    	if($newslatter){
    		 $notification = array(
                'message' => 'Thanks For Subscribe',
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
