<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $categories = DB::table('categories')->get();
        return view('backend.pages.category.category',[
            'categories' => $categories,
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
           'category_en' =>'required|unique:categories|max:60',
           'category_bn' =>'required|unique:categories|max:60',
        ]);
        $categories = DB::table('categories')->insert([
            'category_en' => $request->category_en,
            'category_bn' => $request->category_bn,
        ]);

        if($categories){
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
        $category = DB::table('categories')->where('id',$id)->first();
        return view('backend.pages.category.edit',[
            'category' => $category,
        ]);
    }
    public function delete($id){
        DB::table('categories')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Successfully Deleted',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }

    public function update(Request $request){
        $this->validate($request,[
            'category_en' =>'required|max:60',
            'category_bn' =>'required|max:60',
        ]);
        $categories = DB::table('categories')->where('id',$request->id)->update([
            'category_en' => $request->category_en,
            'category_bn' => $request->category_bn,
        ]);

        if($categories){
            $notification = array(
                'message' => 'Successfully Updated',
                'alert-type' => 'success'
            );
            return Redirect::route('categories')->with($notification);
        }else{
            $notification = array(
                'message' => 'not updated!',
                'alert-type' => 'error'
            );
            return Redirect::route('categories')->with($notification);
        }

    }
}
