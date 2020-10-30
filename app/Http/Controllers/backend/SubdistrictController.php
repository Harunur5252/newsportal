<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SubdistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $districts = DB::table('districts')->get();
        $subdistricts = DB::table('subdistricts')
            ->join('districts','subdistricts.district_id','=','districts.id')
            ->select('subdistricts.*','districts.district_en','districts.district_bn')
            ->get();
        return view('backend.pages.subdistrict.subdistrict',[
            'subdistricts' => $subdistricts,
            'districts'    => $districts,
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'subdistrict_en' =>'required|unique:subdistricts|max:60',
            'subdistrict_bn' =>'required|unique:subdistricts|max:60',
            'district_id' =>'required|max:60',
        ]);
        $subdistricts = DB::table('subdistricts')->insert([
            'subdistrict_en' => $request->subdistrict_en,
            'subdistrict_bn' => $request->subdistrict_bn,
            'district_id'    => $request->district_id,
        ]);

        if($subdistricts){
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
        $districts = DB::table('districts')->get();
        $subdistrict = DB::table('subdistricts')->where('id',$id)->first();
        return view('backend.pages.subdistrict.edit',[
            'districts'    => $districts,
            'subdistrict'  => $subdistrict,
        ]);
    }
    public function delete($id){
        DB::table('subdistricts')->where('id',$id)->delete();
        $notification = array(
            'message'    => 'Successfully Deleted',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notification);
    }
    public function update(Request $request){
        $this->validate($request,[
            'subdistrict_en' =>'required|max:60',
            'subdistrict_bn' =>'required|max:60',
            'district_id' =>'required|max:60',
        ]);
        $subdistricts = DB::table('subdistricts')->where('id',$request->id)->update([
            'subdistrict_en' => $request->subdistrict_en,
            'subdistrict_bn' => $request->subdistrict_bn,
            'district_id'    => $request->district_id,
        ]);

        if($subdistricts){
            $notification = array(
                'message'    => 'Successfully Updated',
                'alert-type' => 'success'
            );
            return Redirect::route('subdistricts')->with($notification);
        }else{
            $notification = array(
                'message'    => 'not updated!',
                'alert-type' => 'error'
            );
            return Redirect::route('subdistricts')->with($notification);
        }
    }
}
