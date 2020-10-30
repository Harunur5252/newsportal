<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
class BrakingnewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function brakingnews(){
    	$brakingnews = DB::table('brakingnews')->first();
    	return view('backend.pages.brakingnews.brakingnews',[
          'brakingnews' =>$brakingnews,
    	]);
    }

    public function update(Request $request){

        $this->validate($request,[
            'news_en' =>'required|max:6000',
            'news_bn' =>'required|max:6000',
         ]);

         $brakingnews = DB::table('brakingnews')->where('id',$request->id)->update([
            'news_en' => $request->news_en,
            'news_bn' => $request->news_bn,
        ]);

        if($brakingnews){
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
        $brakingnews = DB::table('brakingnews')->where('id',$id)->update([
            'status'=>1,
        ]);
        $notification = array(
            'message' => 'Successfully brakingnews on your website',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
        
    }

    public function deactive($id){
        $brakingnews = DB::table('brakingnews')->where('id',$id)->update([
            'status'=>0,
        ]);
        $notification = array(
            'message' => 'brakingnews off on your website',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
        
    }
}
