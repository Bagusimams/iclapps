<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('internship')->user();

    //dd($users);

    return view('internship.home');
})->name('home');

