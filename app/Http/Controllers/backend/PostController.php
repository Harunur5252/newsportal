<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Model\Post;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // multipal depency
    public function getSubcategory($cat_id){
        $subcategories= DB::table('subcategories')->where('category_id',$cat_id)->get();
        return response()->json($subcategories);
    }
    public function getSubdistrict($dist_id){
        $subdistricts= DB::table('subdistricts')->where('district_id',$dist_id)->get();
        return response()->json($subdistricts);
    }

    public function create(){
        $categories = DB::table('categories')->get();
        $districts  = DB::table('districts')->get();
        return view('backend.pages.post.create',[
            'categories' =>$categories,
            'districts'  =>$districts,
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
           'cat_id'=>'required',
           'dist_id'=>'required',
           'title_en'=>'required|max:30000',
           'title_bn'=>'required|max:30000',
           'details_en'=>'required|max:30000',
           'details_bn'=>'required|max:30000',
           'tags_en'=>'required|max:1000',
           'tags_bn'=>'required|max:1000',
           'image'=>'required|mimes:jpg,jpeg,png,gif|max:3000',
        ]);
        $image = $request->image;
        $post = new Post();
        $post->title_en =$request->title_en;
        $post->title_bn =$request->title_bn;
        $post->slug_en = Str::slug($request->title_en,'-');
        $post->slug_bn = Str::slug($request->title_bn,'-');
        $post->cat_id =$request->cat_id;
        $post->subcat_id =$request->subcat_id;
        $post->dist_id =$request->dist_id;
        $post->subdist_id =$request->subdist_id;
        $post->tags_en =$request->tags_en;
        $post->tags_bn =$request->tags_bn;
        $post->details_en =$request->details_en;
        $post->details_bn =$request->details_bn;
        $post->headline =$request->headline;
        $post->first_section =$request->first_section;
        $post->first_section_thumbnail =$request->first_section_thumbnail;
        $post->post_date = date('d-m-Y');
        $post->bigthumbnail =$request->bigthumbnail;
        $post->post_month =date('F');
        $post->user_id =Auth::user()->id;

       if($image){
           $imageName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(300,300)->save('backendAssets/postImages/'.$imageName);
           $post->image ='backendAssets/postImages/'.$imageName;
           $post->save();

           $notification = array(
               'message' => 'Successfully Done!',
               'alert-type' => 'success'
           );
           return Redirect::back()->with($notification);
       }
       else{
           $notification = array(
               'message' => 'Something went wrong!',
               'alert-type' => 'error'
           );
           return Redirect::back()->with($notification);
       }

    }
    public function show(){

        // $posts = DB::table('posts')->join('categories','posts.cat_id','=','categories.id')
        // ->join('subcategories','posts.subcat_id','=','subcategories.id')
        // ->join('districts','posts.dist_id','=','districts.id')
        // ->join('subdistricts','posts.subdist_id','=','districts.id')

        $posts = DB::table('posts')->join('categories','posts.cat_id','=','categories.id')
        ->join('subcategories','posts.subcat_id','=','subcategories.id')
        ->select('posts.*','categories.category_en','categories.category_bn','subcategories.subcategory_bn','subcategories.subcategory_en')
        ->get();
        return view('backend.pages.post.all-post',[
            'posts'=>$posts,
        ]);
    }
    public function edit($id){
       $post = DB::table('posts')->where('id',$id)->first();
       $categories = DB::table('categories')->get();
       $subcategories = DB::table('subcategories')->where('category_id',$post->cat_id)->get();
       $districts  = DB::table('districts')->get();
       $subdistricts  = DB::table('subdistricts')->where('district_id',$post->dist_id)->get();
       return view('backend.pages.post.edit',[
           'post'       => $post,
           'categories' => $categories,
           'districts'  => $districts,
           'subcategories'=>$subcategories,
           'subdistricts'=>$subdistricts,
       ]);
    }
    public function delete($id){
        $deleteiamge = DB::table('posts')->where('id',$id)->first();
        if($deleteiamge){
            if(file_exists($deleteiamge->image)){
                unlink($deleteiamge->image);
            }
        }
        $delete = DB::table('posts')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Successfully Deleted!',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function update(Request $request){
        $this->validate($request,[
            'cat_id'=>'required',
            'dist_id'=>'required',
            'title_en'=>'required|max:30000',
            'title_bn'=>'required|max:30000',
            'details_en'=>'required|max:30000',
            'details_bn'=>'required|max:30000',
            'tags_en'=>'required|max:1000',
            'tags_bn'=>'required|max:1000',
         ]);

         $image = $request->image;
         $oldImag = DB::table('posts')->where('id',$request->id)->first();
         if($image){
             if(file_exists($oldImag->image)){
                 unlink($oldImag->image);

                 $imageName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                 Image::make($image)->resize(300,300)->save('backendAssets/postImages/'.$imageName);
                 $imageUrl ='backendAssets/postImages/'.$imageName;
                 DB::table('posts')->where('id',$request->id)->update([

                    'title_en' =>$request->title_en,
                    'title_bn' =>$request->title_bn,
                    'slug_en' => Str::slug($request->title_en,'-'),
                    'slug_bn' => Str::slug($request->title_bn,'-'),
                    'cat_id' =>$request->cat_id,
                    'subcat_id' =>$request->subcat_id,
                    'dist_id' =>$request->dist_id,
                    'subdist_id' =>$request->subdist_id,
                    'tags_en' =>$request->tags_en,
                    'tags_bn' =>$request->tags_bn,
                    'details_en' =>$request->details_en,
                    'details_bn' =>$request->details_bn,
                    'headline' =>$request->headline,
                    'first_section' =>$request->first_section,
                    'first_section_thumbnail' =>$request->first_section_thumbnail,
                    'bigthumbnail' =>$request->bigthumbnail,
                    'image'=>$imageUrl,
                 ]);
                 $notification = array(
                    'message' => 'Successfully Update!',
                    'alert-type' => 'success'
                );
                return Redirect::route('all.posts')->with($notification);
             }
         }else{
            DB::table('posts')->where('id',$request->id)->update([

                'title_en' =>$request->title_en,
                'title_bn' =>$request->title_bn,
                'cat_id' =>$request->cat_id,
                'subcat_id' =>$request->subcat_id,
                'dist_id' =>$request->dist_id,
                'subdist_id' =>$request->subdist_id,
                'tags_en' =>$request->tags_en,
                'tags_bn' =>$request->tags_bn,
                'details_en' =>$request->details_en,
                'details_bn' =>$request->details_bn,
                'headline' =>$request->headline,
                'first_section' =>$request->first_section,
                'first_section_thumbnail' =>$request->first_section_thumbnail,
                'bigthumbnail' =>$request->bigthumbnail,
                'image'=>$oldImag->image,
            ]);
            $notification = array(
                'message' => 'Successfully update without image!',
                'alert-type' => 'success'
            );
            return Redirect::route('all.posts')->with($notification);

         }
    }
}
