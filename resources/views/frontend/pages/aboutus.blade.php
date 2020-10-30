@extends('layouts.front')

@section('title')
  @if(Session()->get('lang') == 'english')
   About Us
  @else
   আমাদের সম্পর্কে
  @endif
@endsection

@section('content')
 <div class="container">
 	<div class="row">
 		<div class="col-md-10 col-sm-10 col-lg-10">
 		 @if(Session()->get('lang') == 'english')
 			<h2>About Somoy Media Ltd</h2>

			<p>&nbsp;</p>

			<p class="text-justify"><span style="font-size:22px">Somoy TV is one of the pioneering 24-hour news oriented television channels in Bangladesh. The channel grew up with a band of devoted journalists. Somoy News continues its activities with a view to presenting authentic and politically unbiased news to the audience in the nook and corners of Bangladesh and other parts of the world.</span></p>

			<p>&nbsp;</p>

			<p class="text-justify"><span style="font-size:22px">Somoy Media Limited (Somoy Television) is a 24-hour Bengali news based private satellite television channel in Bangladesh. Its headquarters is in 89, Bir Uttam CR Dutta Road, Banglamotor, Dhaka. It has got broadcast NOC license from government of People&rsquo;s Republic of Bangladesh. After the starting of test transmission on 10 October 2010, it is commercially on-air since 17 April 2011.</span></p>

			<p>&nbsp;</p>

			<p class="text-justify"><span style="font-size:22px">Somoy Television aims to bring a positive change in Bangladesh through valuable, balanced and accurate news and information. Being solely a news based channel, Somoy TelevisIon gives topmost priority to news and news contents. For providing LIVE news, DSNG (Digital satellite news gathering) and Bonding Technology are used for emergency and live news. For news coverage beyond Dhaka, there are nine Bureau offices including all the divisional cities and more than 56 district correspondents with modern technologies to send news and video footage instantly.</span></p>

			<p>&nbsp;</p>

			<p class="text-justify"><span style="font-size:22px">International News feed is taken directly from Reuters, APTN and SNTV. Special emphasis is given on Channel look and feel; Branding and Look is created by an international branding agency. Somoy Television can be seen throughout North America,some countries of Europe, Middle East, South Africa and some countries of Asia. It can also be seen through Internet with the web address <a href="http://www.somoynews.tv">www.somoynews.tv</a>, Programs are also news based, focusing on the news and information, analysis of the news.</span></p>

			<p>&nbsp;</p>
		@else
		 	<h2>সময় মিডিয়া লিমিটেড সম্পর্কে</h2>

			<p>&nbsp;</p>

			<p class="text-justify"><span style="font-size:22px">সময় টিভি বাংলাদেশের ২৪ ঘণ্টার অন্যতম অগ্রগামী টেলিভিশন চ্যানেল। চ্যানেলটি নিষ্ঠাবান সাংবাদিকদের একটি দলের সাথে বেড়ে ওঠে। বাংলাদেশ ও বিশ্বের বিভিন্ন প্রান্তের দর্শকদের কাছে প্রামাণিক ও রাজনৈতিকভাবে নিরপেক্ষ সংবাদ উপস্থাপনের লক্ষ্যে সোময় নিউজ তার কার্যক্রম অব্যাহত রেখেছে।</span></p>

			<p>&nbsp;</p>

			<p class="text-justify"><span style="font-size:22px">সময় মিডিয়া লিমিটেড (সোময় টেলিভিশন) বাংলাদেশের একটি ২৪ ঘণ্টার বাংলা সংবাদ ভিত্তিক বেসরকারি টেলিভিশন চ্যানেল। এর সদর দপ্তর ৮৯, বীর উত্তম সিআর দত্ত রোড, বাংলামোটর, ঢাকা। এটি গণপ্রজাতন্ত্রী বাংলাদেশ সরকারের কাছ থেকে ব্রডকাস্ট এনওসি লাইসেন্স পেয়েছে। ১০ অক্টোবর ২০১০ তারিখে পরীক্ষামূলক সম্প্রচার শুরু হওয়ার পর এটি বাণিজ্যিকভাবে ১৭ এপ্রিল ২০১১ থেকে বাণিজ্যিকভাবে চালু রয়েছে।</span></p>

			<p>&nbsp;</p>

			<p class="text-justify"><span style="font-size:22px">সময় টেলিভিশনের লক্ষ্য মূল্যবান, ভারসাম্যপূর্ণ এবং সঠিক সংবাদ এবং তথ্যের মাধ্যমে বাংলাদেশে একটি ইতিবাচক পরিবর্তন আনা। শুধুমাত্র একটি সংবাদ ভিত্তিক চ্যানেল হওয়ায়, সোময় টেলিভিশন সংবাদ এবং সংবাদ বিষয়বস্তুকে সর্বোচ্চ অগ্রাধিকার দেয়। লাইভ সংবাদ প্রদানের জন্য ডিএসএনজি (ডিজিটাল স্যাটেলাইট সংবাদ সংগ্রহ) এবং বন্ডিং প্রযুক্তি জরুরী এবং সরাসরি সংবাদের জন্য ব্যবহার করা হয়। ঢাকার বাইরে সংবাদ ের জন্য সকল বিভাগীয় শহরসহ নয়টি ব্যুরো অফিস এবং ৫৬টিরও বেশি জেলা সংবাদদাতা রয়েছে, যাদের আধুনিক প্রযুক্তি রয়েছে।</span></p>

			<p>&nbsp;</p>

			<p class="text-justify"><span style="font-size:22px">ইন্টারন্যাশনাল নিউজ ফিড সরাসরি রয়টার্স, এপিটিএন এবং এসএনটিভি থেকে নেওয়া হয়েছে। চ্যানেল চেহারা এবং অনুভূতির উপর বিশেষ জোর দেওয়া হয়; ব্র্যান্ডিং এবং লুক একটি আন্তর্জাতিক ব্র্যান্ডিং এজেন্সি দ্বারা তৈরি করা হয়। সোময় টেলিভিশন দেখা যায় উত্তর আমেরিকা, ইউরোপ, মধ্যপ্রাচ্য, দক্ষিণ আফ্রিকা এবং এশিয়ার কিছু দেশে। এছাড়াও এটি ওয়েব ঠিকানার মাধ্যমে ইন্টারনেটের মাধ্যমে দেখা যাবে। <a href="http://www.somoynews.tv">www.somoynews.tv</a>, প্রোগ্রামএছাড়াও সংবাদ ভিত্তিক, সংবাদ এবং তথ্য, সংবাদ বিশ্লেষণ উপর মনোযোগ প্রদান করা হয়।</span></p>

			<p>&nbsp;</p>
		@endif
 		</div>
 	</div>
 </div>
@endsection