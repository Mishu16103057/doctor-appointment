<?php


  Route::prefix('admin')->group(function() {

  Route::get('/dashboard', 'AdminController@index')->name('admin-dashboard');
  
  Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin-login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin-login-submit');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin-logout');
  Route::get('/profile', 'AdminController@profile')->name('admin-profile-info');
  Route::get('/reset-password', 'AdminController@passwordreset')->name('admin-password-reset');
  Route::get('/info', 'AdminController@info')->name('admin-info');
 
  Route::get('/appointment/today', 'AppointmentController@appointments_today')->name('admin-appointment-today');
  Route::get('/appointment/pending', 'AppointmentController@appointments_pending')->name('admin-appointment-pending');
  Route::get('/appointment/history', 'AppointmentController@appointments_history')->name('admin-appointment-history');
  Route::get('/appointment/remove/{id}', 'AppointmentController@appointment_remove')->name('admin-appointment-remove');
  Route::get('/appointment/done/{id}', 'AppointmentController@appointment_done')->name('admin-appointment-done');
  Route::get('/appointment/details/{id}', 'AppointmentController@appointments_info')->name('admin-appointment-info');                
  Route::get('/schedule', 'AdminController@schedule')->name('admin-schedule');
  Route::get('/patients', 'AdminUserController@index')->name('admin-user-index');
  Route::get('/slider', 'SliderController@index')->name('admin-sl-index');
  Route::post('/schedule/save', 'AdminController@schedule_save')->name('admin-schedule-update');

  Route::get('/slider', 'SliderController@index')->name('admin-sl-index');
  Route::get('/slider/create', 'SliderController@create')->name('admin-sl-create');
  Route::post('/slider/create', 'SliderController@store')->name('admin-sl-store');
  Route::get('/slider/edit/{id}', 'SliderController@edit')->name('admin-sl-edit');
  Route::post('/slider/edit/{id}', 'SliderController@update')->name('admin-sl-update');  
  Route::get('/slider/delete/{id}', 'SliderController@destroy')->name('admin-sl-delete');

  Route::get('/service', 'ServiceController@index')->name('admin-sr-index');
  Route::get('/service/create', 'ServiceController@create')->name('admin-sr-create');
  Route::post('/service/create', 'ServiceController@store')->name('admin-sr-store');
  Route::get('/service/edit/{id}', 'ServiceController@edit')->name('admin-sr-edit');
  Route::post('/service/edit/{id}', 'ServiceController@update')->name('admin-sr-update');  
  Route::get('/service/delete/{id}', 'ServiceController@destroy')->name('admin-sr-delete');
  Route::get('/video', 'AdminController@video')->name('admin-video');
  Route::post('/video', 'AdminController@videoup')->name('admin-video-submit');
  Route::post('/info', 'AdminController@infoup')->name('admin-info-submit');

  Route::get('/special', 'SpecialistController@index')->name('admin-sp-index');
  Route::get('/special/create', 'SpecialistController@create')->name('admin-sp-create');
  Route::post('/special/create', 'SpecialistController@store')->name('admin-sp-store');
  Route::get('/special/edit/{id}', 'SpecialistController@edit')->name('admin-sp-edit');
  Route::post('/special/edit/{id}', 'SpecialistController@update')->name('admin-sp-update');  
  Route::get('/special/delete/{id}', 'SpecialistController@destroy')->name('admin-sp-delete');
 
  });
