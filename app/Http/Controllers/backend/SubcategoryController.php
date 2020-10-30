<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class SubcategoryController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $Subcategories = DB::table('subcategories')
            ->join('categories','subcategories.category_id','=','categories.id')
            ->select('subcategories.*','categories.category_en','categories.category_bn')
            ->get();
        $categories    = DB::table('categories')->get();
        return view('backend.pages.subcategory.subcategory',[
            'Subcategories' => $Subcategories,
            'categories'    => $categories,
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
           'subcategory_en' => 'required|unique:subcategories|max:60',
           'subcategory_bn' => 'required|unique:subcategories|max:60',
           'category_id'    => 'required'
        ]);

        $subcategories = DB::table('subcategories')->latest()->insert([
            'subcategory_en' => $request->subcategory_en,
            'subcategory_bn' => $request->subcategory_bn,
            'category_id'    => $request->category_id,
        ]);

        if($subcategories){
            $notification = array(
                'message'    => 'Successfully Done',
                'alert-type' => 'success'
            );
            return Redirect::back()->with($notification);
        }else{
            $notification = array(
                'message'    => 'Something went wrong!',
                'alert-type' => 'error'
            );
            return Redirect::back()->with($notification);
        }
    }
    public function edit($id){
        $subcategory = DB::table('subcategories')->where('id',$id)->first();
        $categories = DB::table('categories')->get();
        return view('backend.pages.subcategory.edit',[
            'subcategory' => $subcategory,
            'categories'  => $categories,
        ]);
    }
    public function delete($id){
        DB::table('subcategories')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Successfully Deleted',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }
    public function update(Request $request){
        $this->validate($request,[
            'subcategory_en' => 'required|max:60',
            'subcategory_bn' => 'required|max:60',
            'category_id'    => 'required'
        ]);

        $subcategories = DB::table('subcategories')->where('id',$request->id)->update([
            'subcategory_en' => $request->subcategory_en,
            'subcategory_bn' => $request->subcategory_bn,
            'category_id'    => $request->category_id,
        ]);

        if($subcategories){
            $notification = array(
                'message'    => 'Successfully Updated',
                'alert-type' => 'success'
            );
            return Redirect::route('subcategories')->with($notification);
        }else{
            $notification = array(
                'message'    => 'not updated!',
                'alert-type' => 'error'
            );
            return Redirect::route('subcategories')->with($notification);
        }
    }

}
