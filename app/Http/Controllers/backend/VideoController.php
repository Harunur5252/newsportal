<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function videos(){
        $videos = DB::table('videos')->get();
        return view('backend.pages.videoGallery.video',[
            'videos'=>$videos,
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'embed_code' =>'required|max:300',
            'title_en' =>'required|unique:photos|max:80',
            'title_bn' =>'required|unique:photos|max:80',
            'type'  =>'required',
         ]);

         $videos = DB::table('videos')->insert([
            'embed_code' => $request->embed_code,
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'type'  => $request->type,
        ]);
        if($videos){
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
        $video = DB::table('videos')->where('id',$id)->first();
        return view('backend.pages.videoGallery.edit',[
          'video'=>$video,
        ]);
    }

    public function update(Request $request){

        $this->validate($request,[
            'embed_code' =>'max:300',
            'title_en' =>'|max:1500',
            'title_bn' =>'|max:150',
            'type'  =>'',
         ]);

         $videos = DB::table('videos')->where('id',$request->id)->update([
            'embed_code' => $request->embed_code,
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'type'  => $request->type,
        ]);
        if($videos){
            $notification = array(
                'message' => 'Successfully Done',
                'alert-type' => 'success'
            );
          return Redirect::route('videos.setting')->with($notification);
        }else{
            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            return Redirect::route('videos.setting')->with($notification);
        }
    }
}
