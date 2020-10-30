<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
class PostController extends Controller
{
    public function singlePost($id,$slug){

      $post = DB::table('posts')->join('categories','posts.cat_id','=','categories.id')
        ->join('subcategories','posts.subcat_id','=','subcategories.id')
        ->join('districts','posts.dist_id','=','districts.id')
        ->join('subdistricts','posts.subdist_id','=','subdistricts.id')
        ->join('admins','posts.user_id','=','admins.id')
        ->select('posts.*','categories.category_en','categories.category_bn','subcategories.subcategory_bn','subcategories.subcategory_en','districts.district_en','districts.district_bn','subdistricts.subdistrict_en','subdistricts.subdistrict_bn','admins.name_en','admins.name_bn')
        ->where('posts.id',$id)->first();
        
    	return view('frontend.pages.singlepost',[
          'post'=>$post,
    	]);
    }

    public function allPost($id,$subcategory){
       $allposts = DB::table('posts')->where('subcat_id',$id)->orderBy('id','desc')->paginate(16);
       return view('frontend.pages.allposts',[
         'allposts'=>$allposts,

       ]);

    }
    public function allPostCategory($id,$category){
       $allposts = DB::table('posts')->where('cat_id',$id)->orderBy('id','desc')->paginate(16);
       return view('frontend.pages.allposts',[
         'allposts'=>$allposts,
       ]);
    }
    public function getSubdistrict($dist_id){

        $subdistricts = DB::table('subdistricts')->where('district_id',$dist_id)->get();
        return response()->json($subdistricts);
    }
    public function getSaradesh(Request $request){
        $this->validate($request,[
          'dist_id'=>'required',
        ]);
      $dist_id    = $request->dist_id;
      $subdist_id = $request->subdist_id;

      $allposts = DB::table('posts')->where('dist_id',$dist_id)->where('subdist_id',$subdist_id)->orderBy('id','desc')->paginate(16);
       return view('frontend.pages.allposts',[
         'allposts'=>$allposts,
       ]);
    }
}
