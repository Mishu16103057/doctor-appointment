<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

  Route::get('/','FrontendController@index')->name('front.index');
  Route::get('/all/doctors/{id}','FrontendController@alldoctor')->name('all-doctor');
  Route::get('/faq','FrontendController@faq')->name('front.faq');
  Route::get('/ads/{id}','FrontendController@ads')->name('front.ads');
  Route::get('/about','FrontendController@about')->name('front.about');
  Route::get('/contact','FrontendController@contact')->name('front.contact');
  Route::get('/blog','FrontendController@blog')->name('front.blog');
  Route::get('/profile/{id}','FrontendController@profile')->name('front.profile');
  Route::get('/blog/{id}','FrontendController@blogshow')->name('front.blogshow');
  Route::get('/scheduletimes/{date}/{id}','FrontendController@getScheduleTimes')->name('front.schedulebydate');
  Route::post('/contact','FrontendController@contactemail')->name('front.contact.submit');
  Route::post('/subscribe','FrontendController@subscribe')->name('front.subscribe.submit');
  Route::post('/handyman/contact','FrontendController@useremail')->name('front.user.submit');

  Route::get('schedule/appointment/{date}/{time}/{id}', 'FrontendController@bookschedule')->name('schedule.book');
  Route::post('schedule/appointment/done', 'FrontendController@bookschedule_process')->name('schedule.book.submit');
  Route::get('schedule/appointment/success', 'FrontendController@bookschedule_success')->name('schedule.book.success');

  Route::prefix('user')->group(function() {
      Route::get('/register', 'Auth\UserRegisterController@showRegisterForm')->name('user-register');
      Route::post('/register', 'Auth\UserRegisterController@register')->name('user-register-submit');
      Route::get('/login', 'Auth\UserLoginController@showLoginForm')->name('user-login');
      Route::post('/login', 'Auth\UserLoginController@login')->name('user-login-submit');
      Route::get('/dashboard', 'UserController@index')->name('user-dashboard');
      Route::get('/reset', 'UserController@resetform')->name('user-reset');
      Route::post('/reset', 'UserController@reset')->name('user-reset-submit');
      Route::get('/appointments', 'UserController@appointments')->name('user-appointments');
      Route::get('/appointment/details/{id}', 'UserController@appointments_info')->name('user-appointment-info');
     

      Route::get('generate-pdf/{id}','UserController@generatePDF')->name('user-pdf');
      Route::get('/profile', 'UserController@profile')->name('user-profile');
      Route::post('/profile', 'UserController@profileupdate')->name('user-profile-update');
      Route::get('/forgot', 'Auth\UserForgotController@showforgotform')->name('user-forgot');
      Route::post('/forgot', 'Auth\UserForgotController@forgot')->name('user-forgot-submit');
      Route::get('/logout', 'Auth\UserLoginController@logout')->name('user-logout');

      Route::post('/payment', 'PaymentController@store')->name('payment.submit');
      Route::get('/payment/cancle', 'PaymentController@paycancle')->name('payment.cancle');
      Route::get('/payment/return', 'PaymentController@payreturn')->name('payment.return');

      Route::get('/publish', 'UserController@publish')->name('user-publish');
      Route::get('/feature', 'UserController@feature')->name('user-feature');
  });  


  Route::post('/user/payment/notify', 'PaymentController@notify')->name('payment.notify');
  Route::post('/stripe-submit', 'StripeController@store')->name('stripe.submit');

  Route::prefix('admin')->group(function() {

  Route::get('/dashboard', 'AdminController@index')->name('admin-dashboard');
  

  
  Route::get('/profile', 'AdminController@profile')->name('admin-profile-info');
  Route::get('/details/{id}', 'AdminController@details')->name('admin-user-details');
  Route::post('/profile', 'AdminController@profileupdate')->name('admin-profile-update');
  Route::get('/info', 'AdminController@info')->name('admin-info');  
  Route::post('/info', 'AdminController@infoup')->name('admin-info-submit'); 
  Route::get('/proinfo', 'AdminController@proinfo')->name('admin-proinfo');  
  Route::post('/proinfo', 'AdminController@proinfoup')->name('admin-proinfo-submit'); 
  Route::get('/profileimg', 'AdminController@proimg')->name('admin-profile');  
  Route::post('/profileimg', 'AdminController@proimgup')->name('admin-proimg-submit'); 
  Route::get('/profile/image', 'AdminController@profileimg')->name('admin-proimg');  
  Route::post('/profile/image', 'AdminController@profileimgup')->name('admin-profile-submit'); 
  Route::get('/specialimg', 'AdminController@simg')->name('admin-special');  
  Route::post('/backgroundimg', 'AdminController@simgup')->name('admin-spimg-submit');
  Route::get('/backgroundimg', 'AdminController@bimg')->name('admin-back');  
  Route::post('/specialimg', 'AdminController@bimgup')->name('admin-back-submit');
  Route::get('/video', 'AdminController@video')->name('admin-video');  
  Route::post('/video', 'AdminController@videoup')->name('admin-video-submit');  
  Route::get('/reset-password', 'AdminController@passwordreset')->name('admin-password-reset');
  Route::post('/reset-password', 'AdminController@changepass')->name('admin-password-change');
  Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin-login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin-login-submit');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin-logout');

  Route::get('/patients', 'AdminUserController@index')->name('admin-user-index');
  Route::get('/patients/create', 'AdminUserController@create')->name('admin-user-create');
  Route::post('/patients/create', 'AdminUserController@store')->name('admin-user-store');
  Route::get('/patients/appointments/{id}', 'AdminUserController@appointment_history')->name('admin-user-appointments');
  Route::get('/patient/details/{id}', 'AdminUserController@user_info')->name('admin-user-info');
  Route::get('/patients/edit/{id}', 'AdminUserController@edit')->name('admin-user-edit');
  Route::post('/patients/update/{id}', 'AdminUserController@update')->name('admin-user-update');
  Route::get('/patients/delete/{id}', 'AdminUserController@destroy')->name('admin-user-delete');
  Route::get('/patients/status/{id1}/{id2}', 'AdminUserController@status')->name('admin-user-st');

  Route::get('/category', 'CategoryController@index')->name('admin-cat-index');
  Route::get('/category/create', 'CategoryController@create')->name('admin-cat-create');
  Route::post('/category/create', 'CategoryController@store')->name('admin-cat-store');
  Route::get('/category/edit/{id}', 'CategoryController@edit')->name('admin-cat-edit');
  Route::post('/category/update/{id}', 'CategoryController@update')->name('admin-cat-update');
  Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('admin-cat-delete');

  Route::get('/faq', 'FaqController@index')->name('admin-fq-index');
  Route::get('/faq/create', 'FaqController@create')->name('admin-fq-create');
  Route::post('/faq/create', 'FaqController@store')->name('admin-fq-store');
  Route::get('/faq/edit/{id}', 'FaqController@edit')->name('admin-fq-edit');
  Route::post('/faq/update/{id}', 'FaqController@update')->name('admin-fq-update');
  Route::post('/faqup', 'PageSettingController@faqupdate')->name('admin-faq-update');
  Route::get('/faq/delete/{id}', 'FaqController@destroy')->name('admin-fq-delete');


  Route::get('/blog', 'AdminBlogController@index')->name('admin-blog-index');
  Route::get('/blog/create', 'AdminBlogController@create')->name('admin-blog-create');
  Route::post('/blog/create', 'AdminBlogController@store')->name('admin-blog-store');
  Route::get('/blog/edit/{id}', 'AdminBlogController@edit')->name('admin-blog-edit');
  Route::post('/blog/edit/{id}', 'AdminBlogController@update')->name('admin-blog-update');  
  Route::get('/blog/delete/{id}', 'AdminBlogController@destroy')->name('admin-blog-delete'); 
  
  Route::get('/testimonial', 'PortfolioController@index')->name('admin-ad-index');
  Route::get('/testimonial/create', 'PortfolioController@create')->name('admin-ad-create');
  Route::post('/testimonial/create', 'PortfolioController@store')->name('admin-ad-store');
  Route::get('/testimonial/edit/{id}', 'PortfolioController@edit')->name('admin-ad-edit');
  Route::post('/testimonial/edit/{id}', 'PortfolioController@update')->name('admin-ad-update');  
  Route::get('/testimonial/delete/{id}', 'PortfolioController@destroy')->name('admin-ad-delete');

  Route::get('/slider', 'SliderController@index')->name('admin-sl-index');
  Route::get('/slider/create', 'SliderController@create')->name('admin-sl-create');
  Route::post('/slider/create', 'SliderController@store')->name('admin-sl-store');
  Route::get('/slider/edit/{id}', 'SliderController@edit')->name('admin-sl-edit');
  Route::post('/slider/edit/{id}', 'SliderController@update')->name('admin-sl-update');  
  Route::get('/slider/delete/{id}', 'SliderController@destroy')->name('admin-sl-delete');

  Route::get('/special', 'SpecialistController@index')->name('admin-sp-index');
  Route::get('/special/create', 'SpecialistController@create')->name('admin-sp-create');
  Route::post('/special/create', 'SpecialistController@store')->name('admin-sp-store');
  Route::get('/special/edit/{id}', 'SpecialistController@edit')->name('admin-sp-edit');
  Route::post('/special/edit/{id}', 'SpecialistController@update')->name('admin-sp-update');  
  Route::get('/special/delete/{id}', 'SpecialistController@destroy')->name('admin-sp-delete');

  Route::get('/service', 'ServiceController@index')->name('admin-sr-index');
  Route::get('/service/create', 'ServiceController@create')->name('admin-sr-create');
  Route::post('/service/create', 'ServiceController@store')->name('admin-sr-store');
  Route::get('/service/edit/{id}', 'ServiceController@edit')->name('admin-sr-edit');
  Route::post('/service/edit/{id}', 'ServiceController@update')->name('admin-sr-update');  
  Route::get('/service/delete/{id}', 'ServiceController@destroy')->name('admin-sr-delete');

  Route::get('/department', 'DepartmentController@index')->name('admin-department-index');
  Route::get('/department/create', 'DepartmentController@create')->name('admin-dep-create');
  Route::post('/department/store', 'DepartmentController@store')->name('admin-dep-store');
  Route::get('/department/delete/{id}', 'DepartmentController@destroy')->name('admin-dep-delete');

  Route::get('/gallery', 'ImageController@index')->name('admin-img-index');
  Route::get('/gallery/create', 'ImageController@create')->name('admin-img-create');
  Route::post('/gallery/create', 'ImageController@store')->name('admin-img-store');
  Route::get('/gallery/edit/{id}', 'ImageController@edit')->name('admin-img-edit');
  Route::post('/gallery/edit/{id}', 'ImageController@update')->name('admin-img-update');  
  Route::get('/gallery/delete/{id}', 'ImageController@destroy')->name('admin-img-delete');

  Route::get('/resume', 'ResumeController@index')->name('admin-rs-index');
  Route::get('/resume/create', 'ResumeController@create')->name('admin-rs-create');
  Route::post('/resume/create', 'ResumeController@store')->name('admin-rs-store');
  Route::get('/resume/edit/{id}', 'ResumeController@edit')->name('admin-rs-edit');
  Route::post('/resume/edit/{id}', 'ResumeController@update')->name('admin-rs-update');  
  Route::get('/resume/delete/{id}', 'ResumeController@destroy')->name('admin-rs-delete');

  Route::get('/advertise', 'AdvertiseController@index')->name('admin-adv-index');
  Route::get('/advertise/st/{id1}/{id2}', 'AdvertiseController@status')->name('admin-adv-st');
  Route::get('/advertise/create', 'AdvertiseController@create')->name('admin-adv-create');
  Route::post('/advertise/create', 'AdvertiseController@store')->name('admin-adv-store');
  Route::get('/advertise/edit/{id}', 'AdvertiseController@edit')->name('admin-adv-edit');
  Route::post('/advertise/edit/{id}', 'AdvertiseController@update')->name('admin-adv-update');  
  Route::get('/advertise/delete/{id}', 'AdvertiseController@destroy')->name('admin-adv-delete'); 

  Route::get('/page-settings/about', 'PageSettingController@about')->name('admin-ps-about');
  Route::post('/page-settings/about', 'PageSettingController@aboutupdate')->name('admin-ps-about-submit');
  Route::get('/page-settings/contact', 'PageSettingController@contact')->name('admin-ps-contact');
  Route::post('/page-settings/contact', 'PageSettingController@contactupdate')->name('admin-ps-contact-submit');

  Route::get('/social', 'SocialSettingController@index')->name('admin-social-index');
  Route::post('/social/update', 'SocialSettingController@update')->name('admin-social-update');

  Route::get('/seotools/analytics', 'SeoToolController@analytics')->name('admin-seotool-analytics');
  Route::post('/seotools/analytics/update', 'SeoToolController@analyticsupdate')->name('admin-seotool-analytics-update');
  Route::get('/seotools/keywords', 'SeoToolController@keywords')->name('admin-seotool-keywords');
  Route::post('/seotools/keywords/update', 'SeoToolController@keywordsupdate')->name('admin-seotool-keywords-update');

  Route::get('/general-settings/logo', 'GeneralSettingController@logo')->name('admin-gs-logo');
  Route::post('/general-settings/logo', 'GeneralSettingController@logoup')->name('admin-gs-logoup');

  Route::get('/general-settings/loader', 'GeneralSettingController@loader')->name('admin-gs-loader');
  Route::post('/general-settings/loader', 'GeneralSettingController@loaderup')->name('admin-gs-loaderup');

  Route::get('/general-settings/favicon', 'GeneralSettingController@fav')->name('admin-gs-fav');
  Route::post('/general-settings/favicon', 'GeneralSettingController@favup')->name('admin-gs-favup');

  Route::get('/general-settings/payments', 'GeneralSettingController@payments')->name('admin-gs-payments');
  Route::post('/general-settings/payments', 'GeneralSettingController@paymentsup')->name('admin-gs-paymentsup');

  Route::get('/general-settings/contents', 'GeneralSettingController@contents')->name('admin-gs-contents');
  Route::post('/general-settings/contents', 'GeneralSettingController@contentsup')->name('admin-gs-contentsup');

  Route::get('/general-settings/bgimg', 'GeneralSettingController@bgimg')->name('admin-gs-bgimg');
  Route::post('/general-settings/bgimgup', 'GeneralSettingController@bgimgup')->name('admin-gs-bgimgup');

  Route::get('/general-settings/about', 'GeneralSettingController@about')->name('admin-gs-about');
  Route::post('/general-settings/about', 'GeneralSettingController@aboutup')->name('admin-gs-aboutup');

  Route::get('/general-settings/address', 'GeneralSettingController@address')->name('admin-gs-address');
  Route::post('/general-settings/address', 'GeneralSettingController@addressup')->name('admin-gs-addressup');

  Route::get('/general-settings/footer', 'GeneralSettingController@footer')->name('admin-gs-footer');
  Route::post('/general-settings/footer', 'GeneralSettingController@footerup')->name('admin-gs-footerup');

  Route::get('/general-settings/bg-info', 'GeneralSettingController@bginfo')->name('admin-gs-bginfo');
  Route::post('/general-settings/bg-info', 'GeneralSettingController@bginfoup')->name('admin-gs-bginfoup');

  Route::get('/subscribers', 'SubscriberController@index')->name('admin-subs-index');
  Route::get('/subscribers/download', 'SubscriberController@download')->name('admin-subs-download');

  Route::get('/languages', 'LanguageController@lang')->name('admin-lang-index');
  Route::post('/languages', 'LanguageController@langup')->name('admin-lang-submit');
  });

  Route::prefix('doctor')->group(function() {

    Route::get('/profile', 'Doctor\DoctorController@profile')->name('doctor-profile-info');
    Route::post('/profile', 'Doctor\DoctorController@profileupdate')->name('doctor-profile-update');


       Route::get('/register-form', 'Doctor\DoctorRegisterController@showRegisterForm')->name('doctor-register');
       Route::post('/register', 'Doctor\DoctorRegisterController@register')->name('doctor-register-submit');
       Route::post('/login',  'Doctor\DoctorLoginController@login')->name('doctor-login-submit');
       Route::get('/logout',  'Doctor\DoctorLoginController@logout')->name('doctor-logout');
       Route::get('/dashboard', 'Doctor\DoctorController@index')->name('doctor-dashboard');

       Route::get('/appointment/today/{id}', 'AppointmentController@appointments_today')->name('doctor-appointment-today');
       Route::get('/appointment/pending/{id}', 'AppointmentController@appointments_pending')->name('doctor-appointment-pending');
       Route::get('/appointment/history/{id}', 'AppointmentController@appointments_history')->name('doctor-appointment-history');
       Route::get('/appointment/remove/{id}', 'AppointmentController@appointment_remove')->name('doctor-appointment-remove');
       Route::get('/appointment/done/{id}', 'AppointmentController@appointment_done')->name('doctor-appointment-done');
       Route::get('/appointment/details/{id}', 'AppointmentController@appointments_info')->name('doctor-appointment-info');

       Route::get('/schedule/{id}', 'Doctor\DoctorController@schedule')->name('doctor-schedule');
       Route::get('/check/times/schedule', 'Doctor\DoctorController@scheduletimes')->name('doctor.schedule.times');
       Route::post('/schedule/save/', 'Doctor\DoctorController@schedule_save')->name('doctor-schedule-update');
       Route::get('/patients', 'Doctor\DoctorUserController@index')->name('doctor-user-index');
       Route::get('/patients/appointments/{id}', 'Doctor\DoctorUserController@appointment_history')->name('doctor-user-appointments');
       Route::get('/patients/edit/{id}', 'Doctor\DoctorUserController@edit')->name('doctor-user-edit');
       Route::get('/patients/delete/{id}', 'Doctor\DoctorUserController@destroy')->name('doctor-user-delete');

       Route::get('/patient/details/{id}', 'Doctor\DoctorUserController@user_info')->name('doctor-user-info');



  });
