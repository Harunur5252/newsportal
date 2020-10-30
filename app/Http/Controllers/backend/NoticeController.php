<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function notice(){
        $notice  = DB::table('notices')->first();
             return view('backend.pages.notice.notice',[
            'notice'=>$notice,
          ]);
    }

    public function update(Request $request){

        $this->validate($request,[
            'notice' =>'required',
            'notice_en' =>'required',
         ]);

         $notice = DB::table('notices')->where('id',$request->id)->update([
            'notice' => $request->notice,
            'notice_en' => $request->notice_en,
        ]);

        if($notice){
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
        $active = DB::table('notices')->where('id',$id)->update([
            'status'=>1,
        ]);
        $notification = array(
            'message' => 'Successfully notice on your website',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
        
    }

    public function deactive($id){
        $deactive = DB::table('notices')->where('id',$id)->update([
            'status'=>0,
        ]);
        $notification = array(
            'message' => 'notice off on your website',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
        
    }
}
