<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Image;
class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function photos(){
       $photos = DB::table('photos')->get();
       return view('backend.pages.photoGallery.photo',[
           'photos' =>$photos,
       ]);
    }

    public function store(Request $request){
        $this->validate($request,[
           'photo' =>'required|mimes:jpg,jpeg,png,gif|max:3000',
           'title_en' =>'required|unique:photos|max:200',
           'title_bn' =>'required|unique:photos|max:200',
           'type'  =>'required',
        ]);
        $image = $request->photo;
        if($image){
            $imageName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('backendAssets/photoGallery/'.$imageName);
            $imageUrl ='backendAssets/photoGallery/'.$imageName;

            $photos = DB::table('photos')->insert([
                'photo' => $imageUrl,
                'title_en' => $request->title_en,
                'title_bn' => $request->title_bn,
                'type'  => $request->type,
            ]);
        }
        
        

        if($photos){
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
        $photo = DB::table('photos')->where('id',$id)->first();
        return view('backend.pages.photoGallery.edit',[
            'photo'=>$photo,
        ]);
    }

    public function update(Request $request){

        $this->validate($request,[
            'title_en'=>'required|max:200',
            'title_bn'=>'required|max:200',
            'type'=>'required',
            'photo'=>'mimes:jpg,jpeg,png,gif|max:3000',
         ]);
         $photo = DB::table('photos')->where('id',$request->id)->first();
         $image = $request->photo;
        if($image){
          if(file_exists($photo->photo)){
              unlink($photo->photo);
          }
            $imageName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('backendAssets/photoGallery/'.$imageName);
            $imageUrl ='backendAssets/photoGallery/'.$imageName;
           
           DB::table('photos')->where('id',$request->id)->update([
             'title_en'=>$request->title_en,
             'title_bn'=>$request->title_bn,
             'type'=>$request->type,
             'photo'=>$imageUrl,
           ]);
            $notification = array(
                'message' => 'Successfully Updated!',
                'alert-type' => 'success'
            );
            return Redirect::route('photos.setting')->with($notification);
        }
        else{
            DB::table('photos')->where('id',$request->id)->update([
               'title_en'=>$request->title_en,
               'title_bn'=>$request->title_bn,
               'type'=>$request->type,
              ]);
              $notification = array(
                'message' => 'Successfully Updated without image!',
                'alert-type' => 'success'
            );
            return Redirect::route('photos.setting')->with($notification);
        }
 
    }
    public function delete($id){
       $image =  DB::table('photos')->where('id',$id)->first();
       if($image){
           if(file_exists($image->photo)){
               unlink($image->photo);
           }
       }
       $delete =  DB::table('photos')->where('id',$id)->delete();
       $notification = array(
        'message' => 'deleted successfully!',
        'alert-type' => 'success'
    );
    return Redirect::back()->with($notification);
    }
}
