<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Image;
class AdsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function ads(){
    	$ads = DB::table('ads')->get();
    	return view('backend.pages.ads.ads',[
          'ads' =>$ads,
    	]);
    }
    public function store(Request $request){

    	$this->validate($request,[
          'link'=>'required',
          'ads'=>'required|max:3000|mimes:jpg,jpeg,png,gif',
          'type'=>'required',
    	]);
        
    	if($request->type ==2){
          $image = $request->ads;
          $imageName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(970,70)->save('backendAssets/ads/'.$imageName);
            $imageUrl ='backendAssets/ads/'.$imageName;
            $photos = DB::table('ads')->insert([
                'ads' => $imageUrl,
                'link' => $request->link,
                'type'  => 2,
            ]);
            if($photos){
            $notification = array(
                'message' => 'Successfully Done',
                'alert-type' => 'success'
            );
            return Redirect::back()->with($notification);
          }
    	}else{
           $image = $request->ads;
           $imageName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,500)->save('backendAssets/ads/'.$imageName);
            $imageUrl ='backendAssets/ads/'.$imageName;
            $photos = DB::table('ads')->insert([
                'ads' => $imageUrl,
                'link' => $request->link,
                'type'  => 1,
            ]);
            if($photos){
            $notification = array(
                'message' => 'Successfully Done',
                'alert-type' => 'success'
            );
            return Redirect::back()->with($notification);
          }
    	}
    }

    public function update(Request $request){

    	$this->validate($request,[
          'link'=>'required',
          'ads'=>'required|max:3000|mimes:jpg,jpeg,png,gif',
          'type'=>'required',
    	]);
        
        if($request->type == 2){

           $image = $request->ads;
           $old = DB::table('ads')->where('id',$request->id)->first();
           if($image){
             if(file_exists($old->ads)){
              unlink($old->ads);
             }

            $imageName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(970,70)->save('backendAssets/ads/'.$imageName);
            $imageUrl ='backendAssets/ads/'.$imageName;

            $photos = DB::table('ads')->where('id',$request->id)->update([
                'ads' => $imageUrl,
                'link' => $request->link,
                'type'  => 2,
            ]);

            if($photos){
              $notification = array(
                  'message' => 'Successfully Done',
                  'alert-type' => 'success'
              );
              return Redirect::route('ads.setting')->with($notification);
            }else{
              $notification = array(
                  'message' => 'not update!',
                  'alert-type' => 'error'
              );
            return Redirect::route('ads.setting')->with($notification);
            }
                 
          }
        }

        else if($request->type == 1){

           $image = $request->ads;
           $old = DB::table('ads')->where('id',$request->id)->first();
           if($image){
             if(file_exists($old->ads)){
              unlink($old->ads);
             }

            $imageName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,500)->save('backendAssets/ads/'.$imageName);
            $imageUrl ='backendAssets/ads/'.$imageName;

            $photos = DB::table('ads')->where('id',$request->id)->update([
                'ads' => $imageUrl,
                'link' => $request->link,
                'type'  => 1,
            ]);

            if($photos){
              $notification = array(
                  'message' => 'Successfully Done',
                  'alert-type' => 'success'
              );
              return Redirect::route('ads.setting')->with($notification);
            }else{
              $notification = array(
                  'message' => 'not update!',
                  'alert-type' => 'error'
              );
            return Redirect::route('ads.setting')->with($notification);
            }
                 
          }

        }
        else if($request->ads == null){
                $photos = DB::table('ads')->where('id',$request->id)->update([
               
                'link' => $request->link,
                'type'  => $request->type,
              ]);

              $notification = array(
                  'message' => 'Successfully Done',
                  'alert-type' => 'success'
              );
              return Redirect::route('ads.setting')->with($notification);

        }
        
          
    }

    public function edit($id){
    	$ads = DB::table('ads')->where('id',$id)->first();
    	return view('backend.pages.ads.edit',[
          'ads'=>$ads,

    	]);
    }

    public function delete($id){

    $ads = DB::table('ads')->where('id',$id)->first();
    if(file_exists($ads->ads)){
    	unlink($ads->ads);
    }

      $delete = DB::table('ads')->where('id',$id)->delete();

      if($delete){
      	$notification = array(
	                'message' => 'Successfully Done',
	                'alert-type' => 'success'
	            );
	       return Redirect::back()->with($notification);
      }else{
      	 $notification = array(
	                'message' => 'something went wrong!',
	                'alert-type' => 'error'
	            );
	      return Redirect::back()->with($notification);
      }
    }
}
