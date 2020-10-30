<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
class FacebookController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function facebookPage(){

     $facebookPage  = DB::table('facebookpages')->first();
             return view('backend.pages.facebookPage.facebookPage',[
            'facebookPage'=>$facebookPage,
          ]);
    }

    public function update(Request $request){

        $this->validate($request,[
            'facebookpage_link' =>'required',
         ]);

       $facebookpage = DB::table('facebookpages')->where('id',$request->id)->update([
            'facebookpage_link' => $request->facebookpage_link,
            
        ]);

        if($facebookpage){
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

    public function active($id){
        $active = DB::table('facebookpages')->where('id',$id)->update([
            'status'=>1,
        ]);
        $notification = array(
            'message' => 'Successfully facebookpages on your website',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
        
    }

    public function deactive($id){
        $deactive = DB::table('facebookpages')->where('id',$id)->update([
            'status'=>0,
        ]);
        $notification = array(
            'message' => 'facebookpages off on your website',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
        
    }
}
