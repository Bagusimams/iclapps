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

Route::get('/', 'Student\MainController@index');

Route::group(['prefix' => 'staff'], function () {
  Route::get('/', 'Staff\MainController@index');
  Route::get('/login', 'StaffAuth\LoginController@showLoginForm');
  // Route::post('/login', 'StaffAuth\LoginController@login')->name('staff.login');
  Route::post('/login', 'Staff\LoginController@doLogin')->name('staff.login');
  Route::post('/logout', 'StaffAuth\LoginController@logout')->name('staff.logout');

  Route::get('/register', 'StaffAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StaffAuth\RegisterController@register');

  Route::post('/password/email', 'StaffAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StaffAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StaffAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StaffAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'lecturer'], function () {
  Route::get('/', 'Lecturer\MainController@index');
  Route::get('/login', 'LecturerAuth\LoginController@showLoginForm');
  // Route::post('/login', 'LecturerAuth\LoginController@login');
  Route::post('/login', 'Lecturer\LoginController@doLogin')->name('lecturer.login');
  Route::post('/logout', 'LecturerAuth\LoginController@logout')->name('lecturer.logout');

  Route::get('/register', 'LecturerAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'LecturerAuth\RegisterController@register');

  Route::post('/password/email', 'LecturerAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'LecturerAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'LecturerAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'LecturerAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'student'], function () {
  Route::get('/', 'Student\MainController@index');
  Route::get('/login', 'StudentAuth\LoginController@showLoginForm');
  // Route::post('/login', 'StudentAuth\LoginController@login')->name('student.login');
  Route::post('/login', 'Student\LoginController@doLogin')->name('student.login');
  Route::post('/logout', 'StudentAuth\LoginController@logout')->name('student.logout');

  Route::get('/register', 'StudentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StudentAuth\RegisterController@register');

  Route::post('/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StudentAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'internship'], function () {
  Route::get('/', 'Internship\MainController@index');
  Route::get('/login', 'InternshipAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'InternshipAuth\LoginController@login');
  Route::post('/logout', 'InternshipAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'InternshipAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'InternshipAuth\RegisterController@register');

  Route::post('/password/email', 'InternshipAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'InternshipAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'InternshipAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'InternshipAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'prodi'], function () {
  Route::get('/login', 'ProdiAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'ProdiAuth\LoginController@login');
  Route::post('/logout', 'ProdiAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'ProdiAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'ProdiAuth\RegisterController@register');

  Route::post('/password/email', 'ProdiAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'ProdiAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'ProdiAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'ProdiAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'prodi-pi'], function () {
  Route::get('/login', 'ProdiPiAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'ProdiPiAuth\LoginController@login');
  Route::post('/logout', 'ProdiPiAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'ProdiPiAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'ProdiPiAuth\RegisterController@register');

  Route::post('/password/email', 'ProdiPiAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'ProdiPiAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'ProdiPiAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'ProdiPiAuth\ResetPasswordController@showResetForm');
});
