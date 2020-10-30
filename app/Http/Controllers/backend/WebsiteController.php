<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Illuminate\Support\Facades\Crypt;
class WebsiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function view(){
        $websites = DB::table('websites')->get();
        return view('backend.pages.website.website',[
            'websites' => $websites,
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
           'website_name' =>'required|unique:websites|max:60',
           'website_name_bn' =>'required|unique:websites|max:60',
           'website_link' =>'required|unique:websites|max:60',
        ]);
        $websites = DB::table('websites')->insert([
            'website_name' => Crypt::encryptString($request->website_name),
            'website_name_bn' => Crypt::encryptString($request->website_name_bn),
            'website_link' => Crypt::encryptString($request->website_link),
        ]);

        if($websites){
            $notification = array(
                'message' => 'Successfully Done',
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


    public function edit($id){
        $nid = Crypt::decryptString($id);
        $website = DB::table('websites')->where('id',$nid)->first();
        return view('backend.pages.website.edit',[
            'website' => $website,
        ]);
    }
    public function delete($id){
        $nid = Crypt::decryptString($id);
        DB::table('websites')->where('id',$nid)->delete();
        $notification = array(
            'message' => 'Successfully Deleted',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function update(Request $request){
        $this->validate($request,[
            'website_name' =>'required|max:60',
            'website_name_bn' =>'required|max:60',
            'website_link' =>'required|max:60',
        ]);
        $id = Crypt::decryptString($request->id);
        $websites = DB::table('websites')->where('id',$id)->update([
            'website_name' => Crypt::encryptString($request->website_name),
            'website_name_bn' => Crypt::encryptString($request->website_name_bn),
            'website_link' => Crypt::encryptString($request->website_link),
        ]);

    
        if($websites){
            $notification = array(
                'message' => 'Successfully Updated',
                'alert-type' => 'success'
            );
            return Redirect::route('websites.setting')->with($notification);
        }else{
            $notification = array(
                'message' => 'not updated!',
                'alert-type' => 'error'
            );
            return Redirect::route('websites.setting')->with($notification);
        }
    }
}
