<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
class ContactInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function contactinformation(){
    	$contactinformations=DB::table('contactus')->orderBy('id','desc')->get();
    	return view('backend.pages.contactinformation.contactinformation',[
          'contactinformations'=>$contactinformations,
    	]);
    }
    public function delete($id){
    	$delete=DB::table('contactus')->where('id',$id)->delete();

    	if($delete){
            $notification = array(
                'message' => 'Successfully Deleted',
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
