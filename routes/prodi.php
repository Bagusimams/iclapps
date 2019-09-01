<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('prodi')->user();

    //dd($users);

    return view('prodi.home');
})->name('home');

