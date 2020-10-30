<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
class LiveTvController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function livetv(){
        $livetv  = DB::table('livetv')->first();
             return view('backend.pages.livetv.livetv',[
            'livetv'=>$livetv,
          ]);
    }

    public function update(Request $request){

        $this->validate($request,[
            'embed_code' =>'required',
         ]);

         $livetv = DB::table('livetv')->where('id',$request->id)->update([
            'embed_code' => $request->embed_code,
        ]);

        if($livetv){
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
        $active = DB::table('livetv')->where('id',$id)->update([
            'status'=>1,
        ]);
        $notification = array(
            'message' => 'Successfully livetv on your website',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
        
    }

    public function deactive($id){
        $deactive = DB::table('livetv')->where('id',$id)->update([
            'status'=>0,
        ]);
        $notification = array(
            'message' => 'livetv off on your website',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
        
    }
}
