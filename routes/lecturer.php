<?php

Route::group(['prefix' => 'student-exchange'], function () {
	Route::get('/{university_id}/{status}/{pagination}', 'Lecturer\StudentExchangeController@index');
	Route::put('/{university_id}/pre', 'Lecturer\StudentExchangeController@updatePre')->name('student-exchange.pre');
	Route::put('/{university_id}/edit', 'Lecturer\StudentExchangeController@update')->name('student-exchange.update');
	Route::put('/{university_id}/report', 'Lecturer\StudentExchangeController@report')->name('student-exchange.report');
});

Route::group(['prefix' => 'dual-degree'], function () {
	Route::get('/{university_id}/{status}/{pagination}', 'Lecturer\DualDegreeController@index');
	Route::put('/{university_id}/pre', 'Lecturer\DualDegreeController@updatePre')->name('dual-degree.pre');
	Route::put('/{university_id}/edit', 'Lecturer\DualDegreeController@update')->name('dual-degree.update');
	Route::put('/{university_id}/report', 'Lecturer\DualDegreeController@report')->name('dual-degree.report');
});

Route::group(['prefix' => 'summer'], function () {
	Route::get('/{university_id}/{status}/{pagination}', 'Lecturer\SummerController@index');
	Route::put('/{university_id}/pre', 'Lecturer\SummerController@updatePre')->name('summer.pre');
	Route::put('/{university_id}/edit', 'Lecturer\SummerController@update')->name('summer.update');
	Route::put('/{university_id}/report', 'Lecturer\SummerController@report')->name('summer.report');
});


Route::group(['prefix' => 'winter'], function () {
	Route::get('/{university_id}/{status}/{pagination}', 'Lecturer\WinterController@index');
	Route::put('/{university_id}/pre', 'Lecturer\WinterController@updatePre')->name('winter.pre');
	Route::put('/{university_id}/edit', 'Lecturer\WinterController@update')->name('winter.update');
	Route::put('/{university_id}/report', 'Lecturer\WinterController@report')->name('winter.report');
});


