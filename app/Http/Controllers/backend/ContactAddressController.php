<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
class ContactAddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function ContactAddress(){

	 $contactaddress  = DB::table('contact_address')->first();
         return view('backend.pages.contactaddress.contactaddress',[
        'contactaddress'=>$contactaddress,
      ]);
    }

    public function update(Request $request){

        $this->validate($request,[
            'email' =>'required|max:40',
            'address_en' =>'required|max:300',
            'address_bn' =>'required|max:300',
            'phone_en' =>'required|min:11|numeric',
            'phone_bn' =>'required|min:11',
            'telephone_en' =>'required|min:11',
            'telephone_bn' =>'required|min:11',
            'fax_en' =>'required|min:11',
            'fax_bn' =>'required|min:11',
         ]);

       $contactaddress = DB::table('contact_address')->where('id',$request->id)->update([
            'email' => $request->email,
            'address_en' => $request->address_en,
            'address_bn' => $request->address_bn,
            'phone_en' => $request->phone_en,
            'phone_bn' => $request->phone_bn,
            'telephone_en' => $request->telephone_en,
            'telephone_bn' => $request->telephone_bn,
            'fax_en' => $request->fax_en,
            'fax_bn' => $request->fax_bn,
        ]);

        if($contactaddress){
            $notification = array(
                'message' => 'Successfully Updated',
                'alert-type' => 'success'
            );
            return Redirect::back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Not Updated!',
                'alert-type' => 'error'
            );
            return Redirect::back()->with($notification);
        }
    }
}
