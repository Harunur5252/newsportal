<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function seo(){
        $seo = DB::table('seos')->first();
        return view('backend.pages.seo.seo',[
            'seo'=>$seo,
        ]);
    }
    public function update(Request $request){

        $this->validate($request,[
            'meta_author' =>'required|max:60',
            'meta_title' =>'required|max:60',
            'meta_description' =>'required|max:60',
            'meta_keyword' =>'required|max:60',
            'google_analytics' =>'required|max:60',
            'google_verification' =>'required|max:60',
            'alexa_analytics' =>'required|max:60',
         ]);

         $seo = DB::table('seos')->where('id',$request->id)->update([
            'meta_author' => $request->meta_author,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'google_analytics' => $request->google_analytics,
            'google_verification' => $request->google_verification,
            'alexa_analytics' => $request->alexa_analytics,
        ]);

        if($seo){
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
