<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
   public function privacyPolicy(){
   	return view('frontend.pages.privacyPolicy.privacyPolicy');
   }
   public function termsCondition(){
   	return view('frontend.pages.termsCondition.termsCondition');
   }
}
