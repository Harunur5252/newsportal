<?php

use Illuminate\Support\Facades\Route;

// front user route
Auth::routes();

Route::get('/home', 'HomeController@index')->name('frontend.Home.home');
Route::get('logout', 'Auth\LoginController@logout')->name('user.logout');


// admin route
Route::prefix('admin')->group(function(){
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.submit');
    Route::get('/home', 'AdminController@dashboard')->name('admin.dashboard');
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
});

// Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
// Route::post('admin/login', 'Admin\LoginController@login');
// Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
// Route::post('admin/logout', 'Admin\LoginController@adminlogout')->name('admin.logout');


Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('/admin/profile','AdminController@profile')->name('admin.profile'); 
Route::post('/admin/profile','AdminController@profileUpdate')->name('admin.profile.update'); 

// frontend 
Route::get('/', 'frontend\HomeController@index')->name('/');
// language
Route::get('/language/english', 'frontend\LanguageController@english')->name('language.english');
Route::get('/language/bangla', 'frontend\LanguageController@bangla')->name('language.bangla');

// single post

Route::get('view-post/{id}/{slug}', 'frontend\PostController@singlePost');
// subcategory wise posts

Route::get('posts/{id}/{subcategory}', 'frontend\PostController@allPost');
// category wise posts
Route::get('post/{id}/{category}', 'frontend\PostController@allPostCategory');
// ajax subdistrict frontend
Route::get('/get/subdistfrontend/{dist_id}','frontend\PostController@getSubdistrict');
// saradesh news search
Route::get('/saradesh/news','frontend\PostController@getSaradesh')->name('sharadesh.news');
// newslater for user
Route::post('/newslatter','frontend\NewslaterController@newslatter')->name('store.newslatter');
// privacy & policy for footer
Route::get('/privacy/policy','frontend\ExtraController@privacyPolicy')->name('privacy.policy');
// terms & condition for footer
Route::get('/terms/condition','frontend\ExtraController@termsCondition')->name('terms.condition');
// abuout us
Route::get('/about/us','frontend\AboutUsController@aboutUs')->name('about.us');
// contact us
Route::get('/contact/us','frontend\ContactController@contactUs')->name('contact.us');
// contact information
Route::post('/contact/information','frontend\ContactController@contactinformation')->name('store.information');


// backend
// user role
Route::prefix('userrole')->group(function (){
  Route::get('/insert', 'AdminController@insert')->name('insert.role');
  Route::post('/store', 'AdminController@store')->name('store.role');
  Route::get('/all/role', 'AdminController@allrole')->name('all.role');
  Route::get('/delete/role/{id}', 'AdminController@delete')->name('delete.role');
  Route::get('/edit/role/{id}', 'AdminController@edit')->name('edit.role');
  Route::post('/update/role', 'AdminController@update')->name('update.role');
});

// Newslatter
Route::prefix('newslatter')->group(function (){
  Route::get('/view',         'AdminController@newslatter')->name('all.newslatter');
  Route::post('/delete/{id}', 'AdminController@deleteNewslatter')->name('delete.newslatter');
});

// Categories
Route::prefix('category')->group(function (){
  Route::get('/view', 'backend\CategoryController@index')->name('categories');
  Route::post('/store', 'backend\CategoryController@store')->name('store.category');
  Route::get('/edit/{id}', 'backend\CategoryController@edit')->name('edit.category');
  Route::get('/delete/{id}', 'backend\CategoryController@delete')->name('delete.category');
  Route::post('/update', 'backend\CategoryController@update')->name('update.category');
});

// Subcategories
Route::prefix('subcategory')->group(function (){
  Route::get('/view', 'backend\SubcategoryController@index')->name('subcategories');
  Route::post('/store', 'backend\SubcategoryController@store')->name('store.subcategory');
  Route::get('/edit/{id}', 'backend\SubcategoryController@edit')->name('edit.subcategory');
  Route::get('/delete/{id}', 'backend\SubcategoryController@delete')->name('delete.subcategory');
  Route::post('/update', 'backend\SubcategoryController@update')->name('update.subcategory');
});

// Districts
Route::prefix('district')->group(function (){
  Route::get('/view', 'backend\DistrictController@index')->name('districts');
  Route::post('/store', 'backend\DistrictController@store')->name('store.district');
  Route::get('/edit/{id}', 'backend\DistrictController@edit')->name('edit.district');
  Route::get('/delete/{id}', 'backend\DistrictController@delete')->name('delete.district');
  Route::post('/update', 'backend\DistrictController@update')->name('update.district');
});

// Subdistricts
Route::prefix('subdistrict')->group(function (){
  Route::get('/view', 'backend\SubdistrictController@index')->name('subdistricts');
  Route::post('/store', 'backend\SubdistrictController@store')->name('store.subdistrict');
  Route::get('/edit/{id}', 'backend\SubdistrictController@edit')->name('edit.subdistrict');
  Route::get('/delete/{id}', 'backend\SubdistrictController@delete')->name('delete.subdistrict');
  Route::post('/update', 'backend\SubdistrictController@update')->name('update.subdistrict');
});

// posts
Route::prefix('post')->group(function (){
  Route::get('/create', 'backend\PostController@create')->name('create');
  Route::get('/view', 'backend\PostController@show')->name('all.posts');
  Route::post('/store', 'backend\PostController@store')->name('store.post');
  Route::get('/edit/{id}', 'backend\PostController@edit')->name('edit.post');
  Route::get('/delete/{id}', 'backend\PostController@delete')->name('delete.post');
  Route::post('/update', 'backend\PostController@update')->name('update.post');
});
// ajax subcategory request
Route::get('/get/subcat/{cat_id}', 'backend\PostController@getSubcategory');
Route::get('/get/subdist/{dist_id}', 'backend\PostController@getSubdistrict');

// logo
Route::prefix('logo')->group(function (){
  Route::get('/create', 'backend\LogoController@createLogo')->name('createlogo');
  Route::post('/update', 'backend\LogoController@update')->name('logo.update');
});



// Socila settings
Route::prefix('social')->group(function (){
  Route::get('/setting', 'backend\SocialController@social')->name('social.setting');
  Route::post('/update', 'backend\SocialController@update')->name('update.social.setting');
});

// Seo Settings
Route::prefix('seo')->group(function (){
  Route::get('/setting', 'backend\SeoController@seo')->name('seo.setting');
  Route::post('/update', 'backend\SeoController@update')->name('update.seo.setting');
});

// PrayerTime Settings
Route::prefix('prayertime')->group(function (){
  Route::get('/setting', 'backend\PrayerController@prayer')->name('prayertime.setting');
  Route::post('/update', 'backend\PrayerController@update')->name('update.prayertime.setting');
});

// LiveTv Settings
Route::prefix('livetv')->group(function (){
  Route::get('/setting', 'backend\LiveTvController@livetv')->name('livetv.setting');
  Route::post('/update', 'backend\LiveTvController@update')->name('update.livetv.setting');
  Route::get('/active/{id}', 'backend\LiveTvController@active')->name('livetv.active');
  Route::get('/deactive/{id}', 'backend\LiveTvController@deactive')->name('livetv.deactive');
});

// notice Settings
Route::prefix('notice')->group(function (){
  Route::get('/setting', 'backend\NoticeController@notice')->name('notice.setting');
  Route::post('/update', 'backend\NoticeController@update')->name('update.notice.setting');
  Route::get('/active/{id}', 'backend\NoticeController@active')->name('notice.active');
  Route::get('/deactive/{id}', 'backend\NoticeController@deactive')->name('notice.deactive');
});

// brakingnews Settings
Route::prefix('brakingnews')->group(function (){
  Route::get('/setting', 'backend\BrakingnewsController@brakingnews')->name('brakingnews.setting');
  Route::post('/update', 'backend\BrakingnewsController@update')->name('update.brakingnews.setting');
  Route::get('/active/{id}', 'backend\BrakingnewsController@active')->name('brakingnews.active');
  Route::get('/deactive/{id}', 'backend\BrakingnewsController@deactive')->name('brakingnews.deactive');
});

//ads
Route::prefix('ads')->group(function (){
  Route::get('/setting', 'backend\AdsController@ads')->name('ads.setting');
  Route::post('/store', 'backend\AdsController@store')->name('store.ads');
  Route::post('/update', 'backend\AdsController@update')->name('update.ads');
  Route::get('/edit/{id}', 'backend\AdsController@edit')->name('edit.ads');
  Route::get('/delete/{id}', 'backend\AdsController@delete')->name('delete.ads');
});

//Contact address for footer
Route::prefix('ContactAddress')->group(function (){
  Route::get('/setting', 'backend\ContactAddressController@ContactAddress')->name('ContactAddress.setting');
  Route::post('/update', 'backend\ContactAddressController@update')->name('update.ContactAddress');
});
// Contact Information
Route::prefix('contactinformation')->group(function (){
  Route::get('/manage', 'backend\ContactInformationController@contactinformation')->name('contactinformation.setting');
  Route::get('/delete/{id}', 'backend\ContactInformationController@delete')->name('delete.contactinformation');
});

//facebook page
Route::prefix('facebook')->group(function (){
  Route::get('/setting', 'backend\FacebookController@facebookPage')->name('facebook.setting');
 Route::post('/update', 'backend\FacebookController@update')->name('update.facebookpage.setting');
  Route::get('/active/{id}', 'backend\FacebookController@active')->name('facebookPage.active');
  Route::get('/deactive/{id}', 'backend\FacebookController@deactive')->name('facebookPage.deactive');
});


// important websites Settings
Route::prefix('website')->group(function (){
  Route::get('/view', 'backend\WebsiteController@view')->name('websites.setting');
  Route::post('/store', 'backend\WebsiteController@store')->name('store.website');
  Route::get('/edit/{id}', 'backend\WebsiteController@edit')->name('edit.website');
  Route::get('/delete/{id}', 'backend\WebsiteController@delete')->name('delete.website');
  Route::post('/update', 'backend\WebsiteController@update')->name('update.website');
});


// PhotoGallery Settings
Route::prefix('photoGallery')->group(function (){
  Route::get('/setting', 'backend\PhotoController@photos')->name('photos.setting');
  Route::post('/store', 'backend\PhotoController@store')->name('store.photo');
  Route::get('/edit/{id}', 'backend\PhotoController@edit')->name('edit.photo');
  Route::get('/delete/{id}', 'backend\PhotoController@delete')->name('delete.photo');
  Route::post('/update', 'backend\PhotoController@update')->name('update.photo');

});

// videoGallery Settings
Route::prefix('videoGallery')->group(function (){
  Route::get('/setting', 'backend\VideoController@videos')->name('videos.setting');
  Route::post('/store', 'backend\VideoController@store')->name('store.video');
  Route::get('/edit/{id}', 'backend\VideoController@edit')->name('edit.video');
  Route::get('/delete/{id}', 'backend\VideoController@delete')->name('delete.video');
  Route::post('/update', 'backend\VideoController@update')->name('update.video');

});