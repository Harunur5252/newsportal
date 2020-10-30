@extends('layouts.front')

@section('title')
  @if(Session()->get('lang') == 'english')
   Terms & Condition
  @else
   শর্তাবলী 
  @endif
@endsection

@section('content')

<div class="container-fluid">
	<div class="row justify-content-row">
		<div class="col-sm-10 col-md-10 col-lg-10">
			@if(session()->get('lang')== 'english')
			<!-- add-start -->	
			<div class="row">
				<div class="col-md-12 col-sm-12">
					@php
					 $horizontal11 = DB::table('ads')->where('type',2)->skip(11)->first();
					@endphp
					<div class="sidebar-add">
						<a href="{{$horizontal11->link}}" target="_blank">
						  <img src="{{asset($horizontal11->ads)}}" alt="$horizontal11->link" />
						</a>
					</div>
				</div>
			</div><!-- /.add-close -->

			<h2>Terms & Condition</h2>
			<p class="text-center text-justify" >
				This Privacy Policy discloses the privacy practices for NTV site and any other digital services, or applications on which a link to this Privacy Policy appears (collectively, the "NTV site"). This Privacy Policy governs the use and collection of information collected from you on the NTV site. This Privacy Policy does not apply to information you may provide to us offline or through any means other than NTV site, other than as specifically identified below. For example, this Privacy Policy does not apply to information you may have provided when obtaining a home delivery subscription offline or when entering a sweepstakes by mail, fax or email. As used herein, "we," "us" and "our" refers to NTV site.
			</p>
			<p class="text-center text-justify">
				Please read this Privacy Policy carefully so that you understand our online privacy practices. This Privacy Policy may be modified at any time and from time to time; the date of the most recent revision will appear on this page so check back periodically. You agree that your use of NTV site is subject to this Privacy Policy as then in effect. Continued access to the NTV site by you following any modification in this Privacy Policy will constitute your acceptance of this Privacy Policy as modified.
			</p>
			<p class="text-center text-justify">
				If you do not agree to be bound by all of the terms set forth below, do not use the NTV site
			</p>
			<p class="text-center text-justify">
				II. Your Consent to This Privacy Policy
                Your access to and use of this Website is subject to this Privacy Policy. By using our Website, or providing information to us, you agree and consent to our collection, use, disclosure, processing, transfer and use of information for the purposes set forth in this Policy, including but not limited to the transfer of your Personal Information between our Service Providers, affiliates and subsidiaries in accordance with this Policy. Any access to such information will be limited to the purpose for which such information was provided to our affiliate, subsidiary or Service Provider.
			</p>
			<p class="text-center text-justify">
				This Website may contain links to Web sites that are owned and operated by unrelated third parties in the Bangladesh or elsewhere. This Privacy Policy does not apply to personal information collected on any third-party Website. In most cases, third-party Websites have their own policies regarding privacy. We recommend you review the privacy policy posted on any site you visit before using the site or providing any personal information about yourself. If you do not consent to the collection, use, and disclosure of your personal information as described in this Privacy Policy, you should not access or use this Website.
			</p>
			<p class="text-center text-justify">
				III. The Type Of Information That The Website Collects
                General Description
			</p>
			<p class="text-center text-justify">
				"Personal Information" is information that can be used to identify or contact you, such as your name, postal address, email address, credit card number, telephone number and similar information. Such information identifies you personally, either alone or in combination with other information. We collect only Personal Information that you provide to us by using our Website. Such information includes information automatically transferred by your computer and information that you knowingly enter in registration forms, applications, and other documents such as when you register for access to a restricted area of the Website intended only for registered users who pay a fee for access.
			</p>
			<p class="text-center text-justify">
				If you wish to access a restricted area of the Website, to register, you must provide us with certain Personal Information, including your name, e-mail address and postal mail address. We will use this Personal Information to review and verify your registration information. We may also use your Personal Information to notify you of any changes to this Policy. You can always opt-out of receiving communications from us by following the "opt-out" procedures set forth on our Website
			</p>
			<p class="text-center text-justify">
				Information You Provide to Us
			</p>
			<p class="text-center text-justify">
				We collect the Personal Information you voluntarily provide when you use a limited access portion of this Website. For example, the information that you provide when you become a registered member and create an account, purchase products, subscribe to e-newsletters, or send us questions and comments is information that we may collect. This information may include, for example, your name, address, e-mail address, phone number, information about your organization, credit card information, and information about your purchases.
			</p>
			<p class="text-center text-justify">
				Information Sent to Us by Your Web Browser-Usage Data
			</p>
			<p class="text-center text-justify">
				We collect information that is sent to us automatically by your Web browser. This information typically includes your IP address, the address of the Web page you were visiting when you accessed this Website, the name and version of your operating system and browser, and the date and time of your visit. We collect and store this information to measure the Website's performance and improve the Website's design and functionality. We may share this information with third parties to illustrate how the Website is used and for other marketing purposes, to improve the Website's design and functionality, statistically evaluate Website usage, or customize our Website's content, layout and services.
			</p>
			<p class="text-center text-justify">
				Cookies and Clear Gifs
			</p>
			<p class="text-center text-justify">
				We use "cookies" to collect information and support certain features and functionality of this Website. A cookie is a small text file that is placed on your hard disk by a Web server or that is stored in your computer's memory for the duration of your visit. For example, we use cookies to collect statistical information about the ways visitors use this Website — which pages they visit, which links they use, how long they stay on each page and how often they return. This information is known as "click-stream information" and does not include your Personal Information.
			</p>
			<p class="text-center text-justify">
				If, however, you have created a user identity on one of your visits to this Website (for example, by creating an account), we may link the information collected by cookies to information that identifies you personally. When you log into our Website, your registration ID number, e-mail address, name and other information may be stored in a cookie and used to customize your experience on the Website
			</p>
			<p class="text-center text-justify">
				If you do not wish to receive cookies, you may set your browser to reject cookies or to alert you when a cookie is placed on your computer. You may also delete our cookies as soon as you leave this Website. Although you are not required to accept our cookies when you visit this Website, if you set your browser to reject cookies, you will not be able to use all of the features and functionality of this Website.
			</p>
			<p class="text-center text-justify">
				The Website may also use clear gifs (also known as "web beacons") in combination with cookies, to help Website operators understand how visitors interact with the Website. A clear gif is typically a transparent graphic image (usually 1 pixel by 1 pixel in size) that is placed on the Website, which allows the Website to measure the actions of a visitor who opens the page that contains the clear gif. We use clear gifs to measure traffic and related behavior, and to improve your experience when visiting the Website.
			</p>
			<p class="text-center text-justify">
				The information provided by your browser and stored in our web server logs does not identify you personally. We use this non-personal information primarily to create statistics that help us improve this Website and make it more compatible with the technology used by our visitors. In addition, under appropriate circumstances, for example, if we receive a subpoena or suspect fraud, we may share our server logs — which contain visitors' IP addresses — with law enforcement authorities or others who may use that information to trace and identify individuals.
			</p>
			<p class="text-center text-justify">
				To "opt-out" of (a) receiving communications from NTV site (except for communications necessary for your use of the Website), (b) having your personally identifiable information disclosed to third parties for marketing purposes, or (c) any other consent previously granted for a specific purpose concerning your personally identifiable information, send an e-mail to NTV site at feedback@ntvbd.com.
			</p>
			<p class="text-center text-justify">
				IV. Our Use and Disclosure Of Information
			</p>
			<p class="text-center text-justify">
				In addition to the uses described throughout this Privacy Policy, and subject to applicable law, we and our Service Providers (as described below) may disclose your Personal Information to:
			</p>
			<p class="text-center text-justify">
				Our Service Providers
			</p>
			<p class="text-center text-justify">
				The NTV site contracts with service providers who use cookies to track and analyze usage and volume statistical information, and monitor responses to e-mail and advertising campaigns. The information obtained from cookies is used to administer the Website, improve the quality of your experience when visiting, and monitor the effectiveness of our marketing activities. Data collected by third parties from this Website is owned and used by NTV site, but is accessible by such third parties. The NTV site may share your personal information with, for example, companies that help process credit card payments. Our service providers are required by contract to protect the confidentiality of the personal information we share with them and to use it only to provide specific services on our behalf
			</p>
			<p class="text-center text-justify">
				Information submitted through this Website is a business asset of NTV site and will become part of its normal business records. Your Personal Information may be transferred to another entity (either an affiliated entity or an unrelated third party) in connection with a merger, reorganization, dissolution or similar corporate event. In the event of a merger, liquidation, dissolution, or sale or transfer of substantially all of the assets of NTV site, Personal Information and/or Usage Data collected from you or about you may be sold, assigned, or transferred to the party acquiring all or substantially all of the equity and/or assets of NTV site to permit the party to continue the operation of the Website, including the restricted areas. Subject to your ability to opt-out, by using this Website and submitting your information to us, you consent to the sale and transfer of your Personal Information as described in this paragraph.
			</p>

			<!-- add-start -->	
			<div class="row">
				<div class="col-md-12 col-sm-12">
					@php
					 $horizontal12 = DB::table('ads')->where('type',2)->skip(12)->first();
					@endphp
					<div class="sidebar-add">
						<a href="{{$horizontal12->link}}" target="_blank">
						  <img src="{{asset($horizontal12->ads)}}" alt="$horizontal12->link" />
						</a>
					</div>
				</div>
			</div><!-- /.add-close -->

			@else
            
            <!-- add-start -->	
			<div class="row">
				<div class="col-md-12 col-sm-12">
					@php
					 $horizontal13 = DB::table('ads')->where('type',2)->skip(13)->first();
					@endphp
					<div class="sidebar-add">
						<a href="{{$horizontal13->link}}" target="_blank">
						  <img src="{{asset($horizontal13->ads)}}" alt="$horizontal13->link" />
						</a>
					</div>
				</div>
			</div><!-- /.add-close -->

			<h2>শর্তাবলী </h2>
			<p class="text-center text-justify" >
				এই গোপনীয়তা নীতি NTV সাইট এবং অন্য যে কোন ডিজিটাল পরিষেবার জন্য গোপনীয়তা অনুশীলন প্রকাশ করে, অথবা যে অ্যাপ্লিকেশনগুলির উপর এই গোপনীয়তা নীতির একটি যোগসূত্র প্রদর্শিত হয় (সম্মিলিতভাবে, "এনটিভি সাইট")। এই গোপনীয়তা নীতি NTV সাইটে আপনার কাছ থেকে সংগৃহীত তথ্যের ব্যবহার এবং সংগ্রহ নিয়ন্ত্রণ করে। এই গোপনীয়তা নীতিটি আপনি অফলাইনে বা NTV সাইট ছাড়া অন্য কোন উপায়ে আমাদের প্রদান করতে পারেন এমন তথ্যের ক্ষেত্রে প্রযোজ্য নয়, যা নিচে বিশেষভাবে চিহ্নিত করা হয়েছে। উদাহরণস্বরূপ, এই গোপনীয়তা নীতি অফলাইনে একটি হোম ডেলিভারি সদস্যতা পাওয়ার সময় অথবা মেইল, ফ্যাক্স বা ইমেইলদ্বারা একটি সুইপস্টেক প্রবেশ করার সময় আপনার প্রদান করা তথ্যের ক্ষেত্রে প্রযোজ্য নয়। এখানে যেমন ব্যবহার করা হয়েছে, "আমরা", "আমরা" এবং "আমাদের" এনটিভি সাইটকে নির্দেশ করে।
			</p>
			<p class="text-center text-justify">
				অনুগ্রহ করে এই গোপনীয়তা নীতিটি সাবধানে পড়ুন যাতে আপনি আমাদের অনলাইন গোপনীয়তা অনুশীলনবুঝতে পারেন। এই গোপনীয়তা নীতিটি যে কোন সময় এবং সময়ে সময়ে পরিবর্তন করা হতে পারে; সাম্প্রতিক সংশোধনের তারিখ এই পৃষ্ঠায় প্রদর্শিত হবে তাই পর্যায়ক্রমে চেক করুন। আপনি একমত যে এনটিভি সাইটের ব্যবহার এই গোপনীয়তা নীতির অধীন। এই গোপনীয়তা নীতিতে যে কোন পরিবর্তনের পর আপনি এনটিভি সাইটে অব্যাহত প্রবেশাধিকার এই গোপনীয়তা নীতির গ্রহণযোগ্যতা পরিবর্তন হিসাবে আপনার গ্রহণযোগ্যতা গঠন করবে.
			</p>
			<p class="text-center text-justify">
				আপনি যদি নিচের সকল শর্তাবলী দ্বারা আবদ্ধ হতে সম্মত না হন, তাহলে এনটিভি সাইটটি ব্যবহার করবেন না।
			</p>
			<p class="text-center text-justify">
				II. এই গোপনীয়তা নীতিতে আপনার সম্মতি এই ওয়েবসাইটে আপনার প্রবেশ এবং ব্যবহার এই গোপনীয়তা নীতির আওতাধীন। আমাদের ওয়েবসাইট ব্যবহার করে, অথবা আমাদের তথ্য সরবরাহ ের মাধ্যমে, আপনি এই নীতিতে বর্ণিত উদ্দেশ্যে আমাদের সংগ্রহ, ব্যবহার, প্রকাশ, প্রক্রিয়াকরণ, স্থানান্তর এবং ব্যবহারে সম্মত হন, কিন্তু এই নীতি অনুযায়ী আমাদের পরিষেবা প্রদানকারী, সহযোগী এবং সহযোগী সংস্থাগুলির মধ্যে আপনার ব্যক্তিগত তথ্য স্থানান্তরের মধ্যে সীমাবদ্ধ নয়। এই ধরনের তথ্যে যে কোন অ্যাক্সেস আমাদের সহযোগী, সহযোগী বা পরিষেবা প্রদানকারীকে এই ধরনের তথ্য সরবরাহ করার উদ্দেশ্যে সীমাবদ্ধ থাকবে।
			</p>
			<p class="text-center text-justify">
				এই ওয়েবসাইটে বাংলাদেশ বা অন্য কোথাও অসম্পৃক্ত তৃতীয় পক্ষের মালিকানাধীন এবং পরিচালিত ওয়েব সাইটের লিংক থাকতে পারে। এই গোপনীয়তা নীতি কোন তৃতীয় পক্ষের ওয়েবসাইটে সংগৃহীত ব্যক্তিগত তথ্যের ক্ষেত্রে প্রযোজ্য নয়। বেশিরভাগ ক্ষেত্রে, তৃতীয় পক্ষের ওয়েবসাইটগোপনীয়তা সম্পর্কে তাদের নিজস্ব নীতি আছে। আমরা আপনাকে সাইটটি ব্যবহার করার আগে আপনার পরিদর্শন করা যেকোন সাইটে পোস্ট করা গোপনীয়তা নীতি পর্যালোচনা করার সুপারিশ করছি অথবা আপনার সম্পর্কে কোন ব্যক্তিগত তথ্য প্রদান করুন। আপনি যদি এই গোপনীয়তা নীতিতে বর্ণিত আপনার ব্যক্তিগত তথ্য সংগ্রহ, ব্যবহার এবং প্রকাশে সম্মতি না দেন, তাহলে আপনার এই ওয়েবসাইটে প্রবেশ বা ব্যবহার করা উচিত নয়।
			</p>
			<p class="text-center text-justify">
				III. ওয়েবসাইট যে ধরনের তথ্য সাধারণ বিবরণ সংগ্রহ করে।
			</p>
			<p class="text-center text-justify">
				"ব্যক্তিগত তথ্য" হচ্ছে তথ্য যা আপনার নাম, ডাক ঠিকানা, ইমেইল ঠিকানা, ক্রেডিট কার্ড নম্বর, টেলিফোন নম্বর এবং অনুরূপ তথ্য সনাক্ত বা যোগাযোগ করতে ব্যবহার করা যেতে পারে। এই ধরনের তথ্য আপনাকে ব্যক্তিগতভাবে সনাক্ত করে, হয় একা অথবা অন্যান্য তথ্যের সমন্বয়ে। আমরা শুধুমাত্র ব্যক্তিগত তথ্য সংগ্রহ করি যা আপনি আমাদের ওয়েবসাইট ব্যবহার করে আমাদের প্রদান করেন। এই ধরনের তথ্যের মধ্যে রয়েছে আপনার কম্পিউটার দ্বারা স্বয়ংক্রিয়ভাবে স্থানান্তরিত তথ্য এবং তথ্য যা আপনি জেনেশুনে নিবন্ধন ফর্ম, অ্যাপ্লিকেশন এবং অন্যান্য নথিতে প্রবেশ করান, যেমন যখন আপনি শুধুমাত্র নিবন্ধিত ব্যবহারকারীদের জন্য ওয়েবসাইটের একটি সীমাবদ্ধ এলাকায় প্রবেশের জন্য নিবন্ধন করেন।
			</p>
			<p class="text-center text-justify">
				আপনি যদি ওয়েবসাইটের একটি সীমাবদ্ধ এলাকায় প্রবেশ করতে চান, নিবন্ধন করতে চান, তাহলে আপনাকে অবশ্যই আপনার নাম, ই-মেইল ঠিকানা এবং ডাক মেইল ঠিকানা সহ কিছু ব্যক্তিগত তথ্য প্রদান করতে হবে। আপনার নিবন্ধন তথ্য পর্যালোচনা এবং যাচাই করতে আমরা এই ব্যক্তিগত তথ্য ব্যবহার করব। এই নীতিতে কোন পরিবর্তন সম্পর্কে আপনাকে অবহিত করতে আমরা আপনার ব্যক্তিগত তথ্য ব্যবহার করতে পারি। আপনি সবসময় আমাদের ওয়েবসাইটে বর্ণিত "অপ্ট-আউট" পদ্ধতি অনুসরণ করে আমাদের কাছ থেকে যোগাযোগ গ্রহণ থেকে অপ্ট-আউট করতে পারেন।
			</p>
			<p class="text-center text-justify">
				আপনি আমাদের যে তথ্য প্রদান করেন।
			</p>
			<p class="text-center text-justify">
				আপনি যখন এই ওয়েবসাইটের একটি সীমিত অ্যাক্সেস অংশ ব্যবহার করেন তখন আপনি স্বেচ্ছায় আপনার প্রদান করা ব্যক্তিগত তথ্য সংগ্রহ করি। উদাহরণস্বরূপ, আপনি যখন একজন নিবন্ধিত সদস্য হন এবং একটি অ্যাকাউন্ট তৈরি করেন, পণ্য ক্রয় করেন, ই-নিউজলেটারে সাবস্ক্রাইব করেন, অথবা আমাদের প্রশ্ন এবং মন্তব্য পাঠান তা হল তথ্য যা আমরা সংগ্রহ করতে পারি। এই তথ্যের মধ্যে থাকতে পারে, উদাহরণস্বরূপ, আপনার নাম, ঠিকানা, ই-মেইল ঠিকানা, ফোন নম্বর, আপনার সংস্থা সম্পর্কে তথ্য, ক্রেডিট কার্ডের তথ্য এবং আপনার ক্রয় সম্পর্কে তথ্য।
			</p>
			<p class="text-center text-justify">
				আপনার ওয়েব ব্রাউজার-ব্যবহার উপাত্ত দ্বারা আমাদের কাছে পাঠানো তথ্য।
			</p>
			<p class="text-center text-justify">
				আমরা আপনার ওয়েব ব্রাউজার দ্বারা স্বয়ংক্রিয়ভাবে আমাদের কাছে প্রেরিত তথ্য সংগ্রহ করি। এই তথ্যসাধারণত আপনার IP ঠিকানা, আপনি যে ওয়েব পৃষ্ঠাটি পরিদর্শন করছিলেন তার ঠিকানা, আপনার অপারেটিং সিস্টেম এবং ব্রাউজারের নাম এবং সংস্করণ, এবং আপনার ভ্রমণের তারিখ এবং সময় অন্তর্ভুক্ত করে। আমরা ওয়েবসাইটের কার্যক্ষমতা পরিমাপ এবং ওয়েবসাইটের নকশা এবং কার্যকারিতা উন্নত করতে এই তথ্য সংগ্রহ এবং সংরক্ষণ করি। ওয়েবসাইটকিভাবে ব্যবহার করা হয় এবং অন্যান্য বিপণনের উদ্দেশ্যে, ওয়েবসাইটের নকশা ও কার্যকারিতা উন্নত করতে, পরিসংখ্যানগতভাবে ওয়েবসাইটের ব্যবহার মূল্যায়ন করতে, অথবা আমাদের ওয়েবসাইটের বিষয়বস্তু, বিন্যাস এবং পরিষেবাগুলি কাস্টমাইজ করতে আমরা এই তথ্য তৃতীয় পক্ষের সাথে শেয়ার করতে পারি।
			</p>
			<p class="text-center text-justify">
				কুকিজ এবং মুছে ফেলুন।
			</p>
			<p class="text-center text-justify">
				আমরা তথ্য সংগ্রহ করতে এবং এই ওয়েবসাইটের কিছু বৈশিষ্ট্য এবং কার্যকারিতা সমর্থন করতে "কুকিজ" ব্যবহার করি। একটি কুকি একটি ছোট টেক্সট ফাইল যা একটি ওয়েব সার্ভার দ্বারা আপনার হার্ডডিস্কে রাখা হয় অথবা যা আপনার পরিদর্শনের সময়কালের জন্য আপনার কম্পিউটারের স্মৃতিতে সংরক্ষিত। উদাহরণস্বরূপ, আমরা কুকিজ ব্যবহার করি কিভাবে দর্শনার্থীরা এই ওয়েবসাইট ব্যবহার করে - তারা কোন পৃষ্ঠাপরিদর্শন করে, কোন টি লিংক ব্যবহার করে, তারা প্রতিটি পৃষ্ঠায় কতদিন অবস্থান করে এবং তারা কতবার ফিরে আসে সে সম্পর্কে পরিসংখ্যানগত তথ্য সংগ্রহ করতে আমরা কুকিজ ব্যবহার করি। এই তথ্য "ক্লিক-স্ট্রিম তথ্য" নামে পরিচিত এবং আপনার ব্যক্তিগত তথ্য অন্তর্ভুক্ত করে না।
			</p>
			<p class="text-center text-justify">
				যাইহোক, আপনি যদি এই ওয়েবসাইটে আপনার কোন একটি পরিদর্শনে একটি ব্যবহারকারী পরিচয় তৈরি করে থাকেন (উদাহরণস্বরূপ, একটি অ্যাকাউন্ট তৈরি করে), আমরা আপনাকে ব্যক্তিগতভাবে সনাক্ত করা তথ্যের সাথে কুকিজ দ্বারা সংগৃহীত তথ্যলিঙ্ক করতে পারি। আপনি যখন আমাদের ওয়েবসাইটে লগ ইন করেন, আপনার রেজিস্ট্রেশন আইডি নম্বর, ই-মেইল ঠিকানা, নাম এবং অন্যান্য তথ্য একটি কুকিতে সংরক্ষণ করা যেতে পারে এবং ওয়েবসাইটে আপনার অভিজ্ঞতা কাস্টমাইজ করতে ব্যবহার করা হতে পারে।
			</p>
			<p class="text-center text-justify">
				আপনি যদি কুকিগুলি গ্রহণ করতে না চান, আপনি আপনার ব্রাউজারকে কুকিপ্রত্যাখ্যান করতে বা আপনার কম্পিউটারে একটি কুকি স্থাপন করা হলে আপনাকে সতর্ক করতে পারেন। আপনি এই ওয়েবসাইট থেকে বের হওয়ার সাথে সাথে আপনি আমাদের কুকিজমুছে ফেলতে পারেন। যদিও আপনি এই ওয়েবসাইট পরিদর্শনের সময় আপনার আমাদের কুকিগুলি গ্রহণ করার প্রয়োজন নেই, আপনি যদি কুকিপ্রত্যাখ্যান করার জন্য আপনার ব্রাউজার সেট করেন, আপনি এই ওয়েবসাইটের সকল বৈশিষ্ট্য এবং কার্যকারিতা ব্যবহার করতে পারবেন না।
			</p>
			<p class="text-center text-justify">
				ওয়েবসাইট টি কুকির সমন্বয়ে পরিষ্কার জিফ (ওয়েব বিকন নামেও পরিচিত) ব্যবহার করতে পারে, যাতে ভিজিটররা ওয়েবসাইটের সাথে কিভাবে মিথস্ক্রিয়া করে তা বুঝতে পারে। একটি পরিষ্কার gif সাধারণত একটি স্বচ্ছ গ্রাফিক ছবি (সাধারণত 1 পিক্সেল বাই 1 পিক্সেল আকারে) যা ওয়েবসাইটে রাখা হয়, যা ওয়েবসাইট একটি ভিজিটরের ক্রিয়া পরিমাপ করতে অনুমতি দেয় যে পৃষ্ঠা টি পরিষ্কার gif ধারণ করে. আমরা ট্রাফিক এবং সংশ্লিষ্ট আচরণ পরিমাপ করতে এবং ওয়েবসাইটে যাওয়ার সময় আপনার অভিজ্ঞতা উন্নত করতে পরিষ্কার জিফ ব্যবহার করি।
			</p>
			<p class="text-center text-justify">
				আপনার ব্রাউজার দ্বারা প্রদত্ত তথ্য এবং আমাদের ওয়েব সার্ভার লগ-এ সংরক্ষিত তথ্য আপনাকে ব্যক্তিগতভাবে শনাক্ত করে না। আমরা এই অ-ব্যক্তিগত তথ্য প্রাথমিকভাবে পরিসংখ্যান তৈরি করতে ব্যবহার করি যা আমাদের এই ওয়েবসাইটের উন্নতি করতে এবং আমাদের দর্শকদের ব্যবহৃত প্রযুক্তির সাথে আরো সামঞ্জস্যপূর্ণ করে তুলতে সাহায্য করে। উপরন্তু, যথাযথ পরিস্থিতিতে, উদাহরণস্বরূপ, যদি আমরা কোন সাবপোয়েনা বা সন্দেহভাজন জালিয়াতি পাই, আমরা আমাদের সার্ভার লগ শেয়ার করতে পারি- যাতে দর্শনার্থীদের আইপি ঠিকানা থাকে- আইন প্রয়োগকারী কর্তৃপক্ষ বা অন্যদের সাথে যারা এই তথ্য ব্যবহার করে ব্যক্তিকে চিহ্নিত করতে এবং সনাক্ত করতে পারে।
			</p>
			<p class="text-center text-justify">
				এনটিভি সাইট থেকে যোগাযোগ গ্রহণ (a) থেকে যোগাযোগ গ্রহণ করা (ওয়েবসাইট ব্যবহারের জন্য প্রয়োজনীয় যোগাযোগ ব্যতীত), (খ) আপনার ব্যক্তিগত ভাবে শনাক্তযোগ্য তথ্য বিপণনের উদ্দেশ্যে তৃতীয় পক্ষের কাছে প্রকাশ করা, অথবা (c) আপনার ব্যক্তিগত ভাবে শনাক্তযোগ্য তথ্য সম্পর্কে একটি নির্দিষ্ট উদ্দেশ্যে প্রদত্ত অন্য কোন সম্মতি, feedback@ntvbd.com
			</p>
			<p class="text-center text-justify">
				IV. আমাদের তথ্য ব্যবহার এবং প্রকাশ।
			</p>
			<p class="text-center text-justify">
				এই গোপনীয়তা নীতিজুড়ে বর্ণিত ব্যবহার ছাড়াও, এবং প্রযোজ্য আইনের সাপেক্ষে, আমরা এবং আমাদের পরিষেবা প্রদানকারী (নীচে বর্ণিত) আপনার ব্যক্তিগত তথ্য প্রকাশ করতে পারি:
			</p>
			<p class="text-center text-justify">
				আমাদের সেবা প্রদানকারী।
			</p>
			<p class="text-center text-justify">
				এনটিভি সাইট পরিষেবা প্রদানকারীদের সাথে চুক্তি করে যারা ব্যবহার এবং ভলিউম পরিসংখ্যানগত তথ্য ট্র্যাক এবং বিশ্লেষণ করতে কুকিজ ব্যবহার করে, এবং ই-মেইল এবং বিজ্ঞাপন প্রচারণার প্রতিক্রিয়া পর্যবেক্ষণ করে। কুকিজ থেকে প্রাপ্ত তথ্য ওয়েবসাইট পরিচালনা, পরিদর্শনের সময় আপনার অভিজ্ঞতার মান উন্নত করতে এবং আমাদের বিপণন কার্যক্রমের কার্যকারিতা পর্যবেক্ষণ করতে ব্যবহার করা হয়। এই ওয়েবসাইট থেকে তৃতীয় পক্ষের সংগৃহীত তথ্য এনটিভি সাইটের মালিকানাধীন এবং ব্যবহার করা হয়, কিন্তু এই ধরনের তৃতীয় পক্ষের দ্বারা সহজলভ্য। এনটিভি সাইট আপনার ব্যক্তিগত তথ্য শেয়ার করতে পারে, উদাহরণস্বরূপ, যে সব কোম্পানি ক্রেডিট কার্ড পেমেন্ট প্রক্রিয়ায় সহায়তা করে। আমাদের পরিষেবা প্রদানকারী আমাদের ব্যক্তিগত তথ্যের গোপনীয়তা রক্ষা করতে এবং শুধুমাত্র আমাদের পক্ষ থেকে নির্দিষ্ট পরিষেবা প্রদানের জন্য এটি ব্যবহার করতে হবে।
			</p>
			<p class="text-center text-justify">
				এই ওয়েবসাইটের মাধ্যমে জমা দেওয়া তথ্য এনটিভি সাইটের একটি ব্যবসায়িক সম্পদ এবং এটি তার স্বাভাবিক ব্যবসায়িক রেকর্ডের অংশ হবে। আপনার ব্যক্তিগত তথ্য একটি একত্রীকরণ, পুনর্গঠন, বিসর্জন বা অনুরূপ কর্পোরেট ইভেন্টের সাথে সম্পর্কিত অন্য সত্তা (হয় একটি সংশ্লিষ্ট সত্তা অথবা একটি অসম্পৃক্ত তৃতীয় পক্ষের) স্থানান্তর করা হতে পারে। এনটিভি সাইটের সকল সম্পদ, ব্যক্তিগত তথ্য এবং/অথবা আপনার কাছ থেকে সংগৃহীত ব্যক্তিগত তথ্য এবং/অথবা ব্যবহার ডেটা একত্রিত করণ, লিকুইডেশন, ডিসলিউশন বা বিক্রয় বা হস্তান্তরের ক্ষেত্রে এনটিভির সকল ইকুইটি এবং/অথবা সম্পত্তি সংগ্রহ করে পার্টিতে বিক্রি, বরাদ্দ বা হস্তান্তর করা হতে পারে। আপনার অপ্ট-আউট করার ক্ষমতা সাপেক্ষে, এই ওয়েবসাইট ব্যবহার করে এবং আমাদের কাছে আপনার তথ্য জমা দিয়ে, আপনি এই অনুচ্ছেদে বর্ণিত আপনার ব্যক্তিগত তথ্য বিক্রয় এবং স্থানান্তরে সম্মত হন।
			</p>
			 <!-- add-start -->	
			<div class="row">
				<div class="col-md-12 col-sm-12">
					@php
					 $horizontal14 = DB::table('ads')->where('type',2)->skip(14)->first();
					@endphp
					<div class="sidebar-add">
						<a href="{{$horizontal14->link}}" target="_blank">
						  <img src="{{asset($horizontal14->ads)}}" alt="$horizontal14->link" />
						</a>
					</div>
				</div>
			</div><!-- /.add-close -->
			@endif
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2">
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			@php
			 $vertical14 = DB::table('ads')->where('type',1)->skip(14)->first();
			@endphp
			<div class="sidebar-add">
				<a href="{{$vertical14->link}}" target="_blank">
				  <img src="{{asset($vertical14->ads)}}" alt="$vertical14->link" />
				</a>
			</div>

			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			@php
			 $vertical15 = DB::table('ads')->where('type',1)->skip(15)->first();
			@endphp
			<div class="sidebar-add">
				<a href="{{$vertical15->link}}" target="_blank">
				  <img src="{{asset($vertical15->ads)}}" alt="$vertical15->link" />
				</a>
			</div>

			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			@php
			 $vertical16 = DB::table('ads')->where('type',1)->skip(16)->first();
			@endphp
			<div class="sidebar-add">
				<a href="{{$vertical16->link}}" target="_blank">
				  <img src="{{asset($vertical16->ads)}}" alt="$vertical16->link" />
				</a>
			</div>

			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			@php
			 $vertical17 = DB::table('ads')->where('type',1)->skip(17)->first();
			@endphp
			<div class="sidebar-add">
				<a href="{{$vertical17->link}}" target="_blank">
				  <img src="{{asset($vertical17->ads)}}" alt="$vertical17->link" />
				</a>
			</div>

	    </div>
	</div>
</div>
@endsection