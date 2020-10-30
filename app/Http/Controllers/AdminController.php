<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Hash;
use Auth;
use App\Admin;
use Image;
class AdminController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function dashboard(){
    	return view('backend.pages.Home.home');
    }

    
    

     public function ChangePassword()
     {
        return view('admin.auth.passwordchange');
     }

    public function Update_pass(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
       if ($newpass === $confirm) {
            $user=Admin::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();  
            $notification=array(
              'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
              'alert-type'=>'success'
               );
             return Redirect()->route('admin.login')->with($notification); 
             }else{
                 $notification=array(
                    'messege'=>'New password and Confirm Password not matched!',
                    'alert-type'=>'error'
                     );
                   return Redirect()->back()->with($notification);
             }     
            }else{
              $notification=array(
                      'messege'=>'Old Password not matched!',
                      'alert-type'=>'error'
                       );
                     return Redirect()->back()->with($notification);
            }
    }

    public function profile(){
      $user = DB::table('admins')->where('type',1)->first();
      return view('backend.pages.profile.profile',[
        'user'=>$user,
        
      ]);
    }

    public function profileUpdate(Request $request){
       $this->validate($request,[
         'name_en'=>'required|alpha|max:20',
         'name_bn'=>'required|alpha|max:20',
         'email'=>'required|max:30',
         'image'=>'max:3000|mimes:jpg,jpeg,png',
       ]);
       $image = $request->image;
       $old = DB::table('users')->where('id',$request->id)->first();
       if($image){
          if(file_exists($old->image)){
            unlink($old->image);
          }

            $imageName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,130)->save('backendAssets/adminprofile/'.$imageName);
            $imageUrl ='backendAssets/adminprofile/'.$imageName;

            $user = DB::table('admins')->where('id',$request->id)->update([
              'name_en'=>$request->name_en,
              'name_bn'=>$request->name_bn,
              'email'=>$request->email,
              'image'=>$imageUrl,
            ]);
              if($user){
              $notification = array(
                  'message' => 'Successfully updated',
                  'alert-type' => 'success'
              );
              return Redirect::back()->with($notification);
           }
       }
          
       else{
          $user = DB::table('admins')->where('id',$request->id)->update([
          'name_en'=>$request->name_en,
          'name_bn'=>$request->name_bn,
          'email'=>$request->email,
       ]);
       if($user){
            $notification = array(
                'message' => 'Successfully updated without image',
                'alert-type' => 'success'
            );
          return Redirect::back()->with($notification);
        }else{
            $notification = array(
                'message' => 'not update!',
                'alert-type' => 'error'
            );
            return Redirect::back()->with($notification);
        }
   }

 }



    public function index()
    {
        return view('backend.pages.Home.home');
    }

    public function insert(){
        return view('backend.pages.role.userrole');
    }

    public function store(Request $request){
        $this->validate($request,[
             'name_en'=>'required|alpha|unique:admins|max:29',
             'name_bn'=>'required|alpha|unique:admins|max:29',
             'email'=>'required|unique:users|max:30',
             'password'=>'required|min:8',
             'image'=>'required|max:3000|mimes:jpg,jpeg,png',
            ]);

           $image = $request->image;
           $imageName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,130)->save('backendAssets/adminprofile/'.$imageName);
            $imageUrl ='backendAssets/adminprofile/'.$imageName;

        $user = DB::table('admins')->insert([

           'name_en'=>$request->name_en,
           'name_bn'=>$request->name_bn,
           'email'=>$request->email,
           'password'=>Hash::make($request->password),
           'image'=>$imageUrl,
           'category'=>$request->category,
           'subcategory'=>$request->subcategory,
           'district'=>$request->district,
           'subdistrict'=>$request->subdistrict,
           'post'=>$request->post,
           'logo'=>$request->logo,
           'social'=>$request->social,
           'facebook'=>$request->facebook,
           'seo'=>$request->seo,
           'prayer'=>$request->prayer,
           'livetv'=>$request->livetv,
           'notice'=>$request->notice,
           'breakingnews'=>$request->breakingnews,
           'ads'=>$request->ads,
           'contactaddress'=>$request->contactaddress,
           'importantwebsite'=>$request->importantwebsite,
           'photogallery'=>$request->photogallery,
           'videogallery'=>$request->videogallery,
           'contactinformation'=>$request->contactinformation,
           'role'=>$request->role,
           'role_id'=>1,
           'newslatter'=>$request->newslatter,
           'type'=>0,
        ]);

        if($user){
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
    public function allrole(){
        $roles = DB::table('admins')->where('type',0)->get();
        return view('backend.pages.role.insert',[
          'roles'=>$roles,
        ]);
    }

    public function delete($id){
     $delete = DB::table('admins')->where('id',$id)->delete();
     if($delete){
            $notification = array(
                'message' => 'Successfully Deleted',
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
        $role = DB::table('admins')->where('id',$id)->first();
        return view('backend.pages.role.edit',[
            'role'=>$role,
        ]);
    }

    public function update(Request $request){

        $this->validate($request,[
             'name_en'=>'required|alpha|max:29',
             'name_bn'=>'required|alpha|max:29',
             'email'=>'required|max:30',
             'image'=>'max:3000|mimes:jpg,jpeg,png',
            ]);

         $old = DB::table('admins')->where('id',$request->id)->first();
         $image = $request->image;
         if($image){
          if(file_exists($old->image)){
            unlink($old->image);
           }
            $imageName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,130)->save('backendAssets/adminprofile/'.$imageName);
            $imageUrl ='backendAssets/adminprofile/'.$imageName;

         $user = DB::table('admins')->where('id',$request->id)->update([

           'name_en'=>$request->name_en,
           'name_bn'=>$request->name_bn,
           'email'=>$request->email,
           'image'=>$imageUrl,
           'category'=>$request->category,
           'subcategory'=>$request->subcategory,
           'district'=>$request->district,
           'subdistrict'=>$request->subdistrict,
           'post'=>$request->post,
           'logo'=>$request->logo,
           'social'=>$request->social,
           'facebook'=>$request->facebook,
           'seo'=>$request->seo,
           'prayer'=>$request->prayer,
           'livetv'=>$request->livetv,
           'notice'=>$request->notice,
           'breakingnews'=>$request->breakingnews,
           'ads'=>$request->ads,
           'contactaddress'=>$request->contactaddress,
           'importantwebsite'=>$request->importantwebsite,
           'photogallery'=>$request->photogallery,
           'videogallery'=>$request->videogallery,
           'contactinformation'=>$request->contactinformation,
           'role'=>$request->role,
           'newslatter'=>$request->newslatter,
        ]);
          if($user){
            $notification = array(
                'message' => 'Successfully Done',
                'alert-type' => 'success'
            );
            return Redirect::route('all.role')->with($notification);
          }
          else{
            $notification = array(
                'message' => 'Not Update!',
                'alert-type' => 'error'
            );
            return Redirect::route('all.role')->with($notification);
         }
     }
         
     else{

        $user = DB::table('admins')->where('id',$request->id)->update([

           'name_en'=>$request->name_en,
           'name_bn'=>$request->name_bn,
           'email'=>$request->email,
           'category'=>$request->category,
           'subcategory'=>$request->subcategory,
           'district'=>$request->district,
           'subdistrict'=>$request->subdistrict,
           'post'=>$request->post,
           'logo'=>$request->logo,
           'social'=>$request->social,
           'facebook'=>$request->facebook,
           'seo'=>$request->seo,
           'prayer'=>$request->prayer,
           'livetv'=>$request->livetv,
           'notice'=>$request->notice,
           'breakingnews'=>$request->breakingnews,
           'ads'=>$request->ads,
           'contactaddress'=>$request->contactaddress,
           'importantwebsite'=>$request->importantwebsite,
           'photogallery'=>$request->photogallery,
           'videogallery'=>$request->videogallery,
           'contactinformation'=>$request->contactinformation,
           'role'=>$request->role,
           'newslatter'=>$request->newslatter,
        ]);

        if($user){
            $notification = array(
                'message' => 'Successfully Done',
                'alert-type' => 'success'
            );
            return Redirect::route('all.role')->with($notification);
         }else{
            $notification = array(
                'message' => 'Not Update!',
                'alert-type' => 'error'
            );
            return Redirect::route('all.role')->with($notification);
         }

      }

    }

    public function newslatter(){
      $newslatters = DB::table('newslatters')->orderBy('id','desc')->get();
      return view('backend.pages.newslatter.newslatter',[
       'newslatters'=>$newslatters,
      ]);
    }

    public function deleteNewslatter($id){
      $newslatters = DB::table('newslatters')->where('id',$request->id)->delete();
      if($newslatters){
            $notification = array(
                'message' => 'Successfully Deleted',
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

}
