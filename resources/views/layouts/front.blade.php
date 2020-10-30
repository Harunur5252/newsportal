@php
 $seo = DB::table('seos')->first();
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="{{ $seo->meta_author }}">
        <meta name="keyword" content="{{ $seo->meta_keyword }}">
        <meta name="description" content="{{ $seo->meta_description }}">
        <meta name="google_analytics" content="{{ $seo->google_analytics }}">
        <meta name="google_verification" content="{{ $seo->google_verification }}">
        <meta name="title" content="{{ $seo->meta_title }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('meta')
        <title>@yield('title')</title>

        <link href="{{ asset('/') }}frontendAssets/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('/') }}frontendAssets/assets/css/menu.css" rel="stylesheet">
        <link href="{{ asset('/') }}frontendAssets/assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ asset('/') }}frontendAssets/assets/css/font-awesome.css" rel="stylesheet">
        <link href="{{ asset('/') }}frontendAssets/assets/css/responsive.css" rel="stylesheet">
        <link href="{{ asset('/') }}frontendAssets/assets/css/owl.carousel.min.css" rel="stylesheet">
        <link href="{{ asset('/') }}frontendAssets/assets/style.css" rel="stylesheet">
         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
  <!-- summernote -->
    <link rel="stylesheet" href="{{asset('/')}}backendAssets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body>

        @php
         $horizontal1 = DB::table('ads')->where('type',2)->first();
        @endphp

    @php
    function bn_date($str)
        {
        $en = array(1,2,3,4,5,6,7,8,9,0);
        $bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
        $str = str_replace($en, $bn, $str);
        $en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
        $en_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
        $bn = array( 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর' );
        $str = str_replace( $en, $bn, $str );
        $str = str_replace( $en_short, $bn, $str );
        $en = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
		$en_short = array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
		$bn_short = array('শনি', 'রবি','সোম','মঙ্গল','বুধ','বৃহঃ','শুক্র');
		$bn = array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
		$str = str_replace( $en, $bn, $str );
		$str = str_replace( $en_short, $bn_short, $str );
		$en = array( 'am', 'pm' );
        $bn = array( 'পূর্বাহ্ন', 'অপরাহ্ন' );
        $str = str_replace( $en, $bn, $str );
		$str = str_replace( $en_short, $bn_short, $str );
		$en = array( '১২', '২৪' );
        $bn = array( '৬', '১২' );
        $str = str_replace( $en, $bn, $str );
         return $str;
        }
@endphp	

        @include('frontend.template.header')
        @include('frontend.template.topbar')
        @include('frontend.template.date_start')
        @include('frontend.template.notice')

        @yield('content')

        @include('frontend.template.top_footer')
        @include('frontend.template.middle_footer')
        @include('frontend.template.bottom_footer')


        <script src="{{ asset('/') }}frontendAssets/assets/js/jquery.min.js"></script>
        <script src="{{ asset('/') }}frontendAssets/assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('/') }}frontendAssets/assets/js/main.js"></script>
        <script src="{{ asset('/') }}frontendAssets/assets/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="http://bangladate.appspot.com/index2.php"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

<!-- Summernote -->
<script src="{{asset('/')}}backendAssets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

	</body>
</html> 