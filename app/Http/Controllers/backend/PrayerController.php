<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
class PrayerController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function prayer(){
        $prayer =  DB::table('prayers')->first();
        return view('backend.pages.prayer.prayer',[
            'prayer'=>$prayer,
        ]);
    }

    public function update(Request $request){

        $this->validate($request,[
            'fajar' =>'required|max:60',
            'johor' =>'required|max:60',
            'asor' =>'required|max:60',
            'magrib' =>'required|max:60',
            'esa' =>'required|max:60',
            'jummah' =>'required|max:60',
         ]);

         $prayer = DB::table('prayers')->where('id',$request->id)->update([
            'fajar' => $request->fajar,
            'johor' => $request->johor,
            'asor' => $request->asor,
            'magrib' => $request->magrib,
            'esa' => $request->esa,
            'jummah' => $request->jummah,
        ]);

        if($prayer){
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
