@php
    $prefix = Request::route()->getPrefix();
    $route  = Route::current()->getName();
    $logo  = DB::table('logos')->first();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="{{asset($logo->logo)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style=" border-radius: 8%; height: 60px;width: 60px;">
        <span class="brand-text font-weight-light">SomoyTv Ltd</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->type ==1)
                  <img src="{{asset(Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image" style="border-radius: 10%; height: 30px;width: 30px;">
                @else
                  <img src="{{asset(Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image" style="border-radius: 10%; height: 30px;width: 30px;">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">
                  @if(Auth::user()->type ==1)
                    {{Auth::user()->name_en}}
                  @else
                    {{Auth::user()->name_en}}
                  @endif
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('admin.dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
{{--                            <i class="right fas fa-angle-left"></i>--}}
                        </p>
                    </a>
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="./index.html" class="nav-link active">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Dashboard v1</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="./index2.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Dashboard v2</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="./index3.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Dashboard v3</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </li>
                @if(Auth::user()->category == 1)
                <li class="nav-item has-treeview {{($prefix == '/category'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('categories')}}" class="nav-link {{($route == 'categories'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

             @if(Auth::user()->subcategory == 1)
                <li class="nav-item has-treeview {{($prefix == '/subcategory'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Subcategories
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('subcategories')}}" class="nav-link {{($route == 'subcategories'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Subcategory</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

              @if(Auth::user()->district == 1)
                <li class="nav-item has-treeview {{($prefix == '/district'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            District
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('districts')}}" class="nav-link {{($route == 'districts'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>district</p>
                            </a>
                        </li>
                    </ul>
                </li>
               @endif

                @if(Auth::user()->subdistrict == 1)
                <li class="nav-item has-treeview {{($prefix == '/subdistrict'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            SubDistrict
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('subdistricts')}}" class="nav-link {{($route == 'subdistricts'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>subdistrict</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                 @if(Auth::user()->post == 1)
                <li class="nav-item has-treeview {{($prefix == '/post'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Post
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('create')}}" class="nav-link {{($route == 'create'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Post</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('all.posts')}}" class="nav-link {{($route == 'all.posts'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                               <p>All Post</p>
                           </a>
                       </li>
                  </ul>
                </li>
                @endif

              @if(Auth::user()->logo == 1)
                <li class="nav-item has-treeview {{($prefix == '/logo'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Logo
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('createlogo')}}" class="nav-link {{($route == 'createlogo'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>logo</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                 @if(Auth::user()->social == 1)
                <li class="nav-item has-treeview {{($prefix == '/social'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        SocialSetting
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('social.setting')}}" class="nav-link {{($route == 'social.setting'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SocialSetting</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if(Auth::user()->facebook == 1)
                <li class="nav-item has-treeview {{($prefix == '/facebook'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        FacebookPage
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('facebook.setting')}}" class="nav-link {{($route == 'facebook.setting'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FacebookPage</p>
                            </a>
                        </li>
                    </ul>
                </li>
                 @endif

                  @if(Auth::user()->seo == 1)
                <li class="nav-item has-treeview {{($prefix == '/seo'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        SeoSetting
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('seo.setting')}}" class="nav-link {{($route == 'seo.setting'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                               <p>SeoSetting</p>
                           </a>
                       </li>
                  </ul>
                </li>
                @endif

                 @if(Auth::user()->prayer == 1)
                <li class="nav-item has-treeview {{($prefix == '/prayertime'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        PrayerTimeSetting
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('prayertime.setting')}}" class="nav-link {{($route == 'prayertime.setting'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                               <p>PrayerTime</p>
                           </a>
                       </li>
                  </ul>
                </li>
                @endif

                 @if(Auth::user()->livetv == 1)
                <li class="nav-item has-treeview {{($prefix == '/livetv'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        LivetvSetting
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('livetv.setting')}}" class="nav-link {{($route == 'livetv.setting'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                               <p>LivetvSetting</p>
                           </a>
                       </li>
                  </ul>
                </li>
                @endif

                @if(Auth::user()->notice == 1)
                <li class="nav-item has-treeview {{($prefix == '/notice'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        NoticeSetting
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('notice.setting')}}" class="nav-link {{($route == 'notice.setting'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                               <p>NoticeSetting</p>
                           </a>
                       </li>
                  </ul>
                </li>
                @endif

                 @if(Auth::user()->breakingnews == 1)
                <li class="nav-item has-treeview {{($prefix == '/brakingnews'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        BrakingnewsSetting
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('brakingnews.setting')}}" class="nav-link {{($route == 'brakingnews.setting'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                               <p>brakingnewsSetting</p>
                           </a>
                       </li>
                  </ul>
                </li>
                @endif

                 @if(Auth::user()->ads == 1)
                 <li class="nav-item has-treeview {{($prefix == '/ads'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        Websites Ads
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                   <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('ads.setting')}}" class="nav-link {{($route == 'ads.setting'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                               <p>ads</p>
                           </a>
                       </li>
                  </ul>
                </li>
                @endif

                 @if(Auth::user()->contactaddress == 1)
                <li class="nav-item has-treeview {{($prefix == '/ContactAddress'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        Contact Adrees Setting
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                   <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('ContactAddress.setting')}}" class="nav-link {{($route == 'ContactAddress.setting'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                               <p>ContactAddress</p>
                           </a>
                       </li>
                  </ul>
                </li>
                @endif

                @if(Auth::user()->importantwebsite == 1)
                <li class="nav-item has-treeview {{($prefix == '/website'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        ImportantWebsiteSetting
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('websites.setting')}}" class="nav-link {{($route == 'websites.setting'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                               <p>website</p>
                           </a>
                       </li>
                  </ul>
                </li>
                @endif

                 @if(Auth::user()->photogallery == 1)
                <li class="nav-item has-treeview {{($prefix == '/photoGallery'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        PhotoGallerySettings
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('photos.setting')}}" class="nav-link {{($route == 'photos.setting'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                               <p>PhotoGallery</p>
                           </a>
                       </li>
                  </ul>
                </li>
                @endif

                 @if(Auth::user()->videogallery == 1)
                <li class="nav-item has-treeview {{($prefix == '/videoGallery'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        VideoGallerySettings
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('videos.setting')}}" class="nav-link {{($route == 'videos.setting'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                               <p>videoGallery</p>
                           </a>
                       </li>
                  </ul>
                </li>
                @endif

                 @if(Auth::user()->contactinformation == 1)
                <li class="nav-item has-treeview {{($prefix == '/contactinformation'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        contactinformation
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('contactinformation.setting')}}" class="nav-link {{($route == 'contactinformation.setting'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                               <p>contactinformation</p>
                           </a>
                       </li>
                  </ul>
                </li>
                @endif

                 @if(Auth::user()->role == 1)
                <li class="nav-item has-treeview {{($prefix == '/userrole'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            User Role
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('insert.role')}}" class="nav-link {{($route == 'insert.role'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('all.role')}}" class="nav-link {{($route == 'all.role'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                               <p>All User</p>
                           </a>
                       </li>
                  </ul>
                </li>
                @endif

                 @if(Auth::user()->newslatter == 1)
                <li class="nav-item has-treeview {{($prefix == '/newslatter'?'menu-open':'')}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Newslatter
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('all.newslatter')}}" class="nav-link {{($route == 'all.newslatter'?'active':'')}}">
                                <i class="far fa-circle nav-icon"></i>
                               <p>All Newslatter</p>
                           </a>
                       </li>
                  </ul>
                </li>
                @endif

                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
