<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('prodi_pi')->user();

    //dd($users);

    return view('prodi-pi.home');
})->name('home');

