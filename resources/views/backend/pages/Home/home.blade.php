@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            @php
             $category = DB::table('categories')->get();
             $subcategory = DB::table('subcategories')->get();
             $post = DB::table('posts')->get();
             $importantwebsite = DB::table('websites')->get();
             $ads = DB::table('ads')->get();
             $photo = DB::table('photos')->get();
             $video = DB::table('videos')->get();
             $userrole = DB::table('admins')->get();
             $usercontact = DB::table('contactus')->get();
             $newslatter = DB::table('newslatters')->get();
            @endphp
            <div class="row">
                @if(Auth::user()->category == 1)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$category->count()}}</h3>

                            <p>Category</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('categories')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endif
                <!-- ./col -->
                @if(Auth::user()->subcategory == 1)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$subcategory->count()}}<sup style="font-size: 20px"></sup></h3>

                            <p>SubCategory</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{route('subcategories')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endif
                <!-- ./col -->
                @if(Auth::user()->post == 1)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$post->count()}}</h3>

                            <p>Post</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('all.posts')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endif
                <!-- ./col -->
                @if(Auth::user()->importantwebsite == 1)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$importantwebsite->count()}}</h3>

                            <p>ImportantWebsite</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{route('websites.setting')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endif
                <!-- ./col -->
            </div>

             <div class="row">
                @if(Auth::user()->ads == 1)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$ads->count()}}</h3>

                            <p>Ads</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('ads.setting')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endif
                <!-- ./col -->
                @if(Auth::user()->photogallery == 1)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$photo->count()}}<sup style="font-size: 20px"></sup></h3>

                            <p>Photo Gallery</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{route('photos.setting')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endif
                <!-- ./col -->
                @if(Auth::user()->videogallery == 1)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$video->count()}}</h3>

                            <p>Video Gallery</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('videos.setting')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endif
                <!-- ./col -->
                @if(Auth::user()->role == 1)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$userrole->count()}}</h3>

                            <p>User Role</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{route('all.role')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endif
                <!-- ./col -->
            </div>


             <div class="row">
                @if(Auth::user()->contactinformation == 1)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$usercontact->count()}}</h3>

                            <p>User Contact</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{route('contactinformation.setting')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endif

                @if(Auth::user()->newslatter == 1)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$newslatter->count()}}</h3>

                            <p>Newslatter</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('all.newslatter')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endif
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
