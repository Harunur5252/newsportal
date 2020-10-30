<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $districts = DB::table('districts')->get();
        return view('backend.pages.district.district',[
            'districts'=>$districts,
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'district_en' =>'required|unique:districts|max:60',
            'district_bn' =>'required|unique:districts|max:60',
        ]);
        $districts = DB::table('districts')->insert([
            'district_en' => $request->district_en,
            'district_bn' => $request->district_bn,
        ]);

        if($districts){
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
        $district = DB::table('districts')->where('id',$id)->first();
        return view('backend.pages.district.edit',[
            'district' => $district,
        ]);
    }
    public function delete($id){
        DB::table('districts')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Successfully Deleted',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }
    public function update(Request $request){
        $this->validate($request,[
            'district_en' =>'required|max:60',
            'district_bn' =>'required|max:60',
        ]);
        $districts = DB::table('districts')->where('id',$request->id)->update([
            'district_en' => $request->district_en,
            'district_bn' => $request->district_bn,
        ]);

        if($districts){
            $notification = array(
                'message' => 'Successfully Updated',
                'alert-type' => 'success'
            );
            return Redirect::route('districts')->with($notification);
        }else{
            $notification = array(
                'message' => 'not updated!',
                'alert-type' => 'error'
            );
            return Redirect::route('districts')->with($notification);
        }
    }
}
