<?php

Route::group(['prefix' => 'exam-supervisor'], function () {
	Route::get('/error', 'Student\ExamSupervisorController@error');
	Route::get('/create', 'Student\ExamSupervisorController@create');
	Route::post('/create', 'Student\ExamSupervisorController@store')->name('exam-supervisor.store');
	Route::get('/detail', 'Student\ExamSupervisorController@detail');
	Route::get('/edit', 'Student\ExamSupervisorController@edit');
	Route::put('/edit', 'Student\ExamSupervisorController@update')->name('exam-supervisor.update');
	Route::delete('/delete', 'Student\ExamSupervisorController@delete')->name('exam-supervisor.delete');
});

Route::group(['prefix' => 'course'], function () {
	Route::get('/getAvailableRoom/{start_time}/{end_time}/{day}', 'Student\LectureScheduleController@getAvailableRoom');
	Route::get('/getAvailableRoomByDate/{start_time}/{end_time}/{date}', 'Student\LectureScheduleController@getAvailableRoomByDate');
	Route::get('/create/{mode}/{old_id}', 'Student\LectureScheduleController@create');
	Route::post('/create/{mode}/{old_id}', 'Student\LectureScheduleController@store')->name('course.store');
	Route::get('/{pagination}', 'Student\LectureScheduleController@index');
	Route::get('/req/{type}/{pagination}', 'Student\LectureScheduleController@indexReq');
	Route::get('/{course_id}/detail', 'Student\LectureScheduleController@detail');
	Route::get('/{course_id}/edit', 'Student\LectureScheduleController@edit');
	Route::put('/{course_id}/edit', 'Student\LectureScheduleController@update')->name('course.update');
	Route::delete('/{course_id}/delete', 'Student\LectureScheduleController@delete')->name('course.delete');
});

Route::group(['prefix' => 'complaint'], function () {
	Route::get('/create', 'Student\ComplaintController@create');
	Route::post('/create', 'Student\ComplaintController@store')->name('complaint.store');
	Route::get('/{pagination}', 'Student\ComplaintController@index');
	Route::get('/{inventory_id}/detail', 'Student\ComplaintController@detail');
	Route::get('/{inventory_id}/edit', 'Student\ComplaintController@edit');
	Route::put('/{inventory_id}/edit', 'Student\ComplaintController@update')->name('complaint.update');
	Route::delete('/{inventory_id}/delete', 'Student\ComplaintController@delete')->name('complaint.delete');
});

Route::group(['prefix' => 'student-exchange'], function () {
	Route::get('/error', 'Student\StudentExchangeController@error');
	Route::get('/create', 'Student\StudentExchangeController@create');
	Route::post('/create', 'Student\StudentExchangeController@store')->name('exchange.store');
	Route::get('/detail', 'Student\StudentExchangeController@detail');
	Route::get('/edit', 'Student\StudentExchangeController@edit');
	Route::put('/edit', 'Student\StudentExchangeController@update')->name('exchange.update');
	Route::delete('/delete', 'Student\StudentExchangeController@delete')->name('exchange.delete');
});

Route::group(['prefix' => 'dual-degree'], function () {
	Route::get('/error', 'Student\DualDegreeController@error');
	Route::get('/create', 'Student\DualDegreeController@create');
	Route::post('/create', 'Student\DualDegreeController@store')->name('dual-degree.store');
	Route::get('/detail', 'Student\DualDegreeController@detail');
	Route::get('/edit', 'Student\DualDegreeController@edit');
	Route::put('/edit', 'Student\DualDegreeController@update')->name('dual-degree.update');
	Route::delete('/delete', 'Student\DualDegreeController@delete')->name('dual-degree.delete');
});

Route::group(['prefix' => 'summer'], function () {
	Route::get('/error', 'Student\SummerController@error');
	Route::get('/create', 'Student\SummerController@create');
	Route::post('/create', 'Student\SummerController@store')->name('summer.store');
	Route::get('/detail', 'Student\SummerController@detail');
	Route::get('/edit', 'Student\SummerController@edit');
	Route::put('/edit', 'Student\SummerController@update')->name('summer.update');
	Route::delete('/delete', 'Student\SummerController@delete')->name('summer.delete');
});

Route::group(['prefix' => 'winter'], function () {
	Route::get('/error', 'Student\WinterController@error');
	Route::get('/create', 'Student\WinterController@create');
	Route::post('/create', 'Student\WinterController@store')->name('winter.store');
	Route::get('/detail', 'Student\WinterController@detail');
	Route::get('/edit', 'Student\WinterController@edit');
	Route::put('/edit', 'Student\WinterController@update')->name('winter.update');
	Route::delete('/delete', 'Student\WinterController@delete')->name('winter.delete');
});

Route::group(['prefix' => 'inventory'], function () {
	Route::group(['prefix' => 'booking'], function () {
		Route::get('/create', 'Student\InventoryBookingController@create');
		Route::post('/create', 'Student\InventoryBookingController@store')->name('inventory.booking.store');
		Route::get('/{pagination}', 'Student\InventoryBookingController@index');
		Route::get('/{booking_id}/detail', 'Student\InventoryBookingController@detail');
		Route::get('/{booking_id}/edit', 'Student\InventoryBookingController@edit');
		Route::put('/{booking_id}/edit', 'Student\InventoryBookingController@update')->name('inventory.booking.update');
		Route::delete('/{booking_id}/delete', 'Student\InventoryBookingController@delete')->name('inventory.booking.delete');
	});

	Route::get('/{pagination}', 'Student\InventoryController@index');
	Route::get('/{inventory_id}/detail', 'Student\InventoryController@detail');
});

Route::group(['prefix' => 'room'], function () {
	Route::group(['prefix' => 'booking'], function () {
		Route::get('/create', 'Student\RoomBookingController@create');
		Route::post('/create', 'Student\RoomBookingController@store')->name('room.booking.store');
		Route::get('/{pagination}', 'Student\RoomBookingController@index');
		Route::get('/{booking_id}/detail', 'Student\RoomBookingController@detail');
		Route::get('/{booking_id}/edit', 'Student\RoomBookingController@edit');
		Route::put('/{booking_id}/edit', 'Student\RoomBookingController@update')->name('room.booking.update');
		Route::delete('/{booking_id}/delete', 'Student\RoomBookingController@delete')->name('room.booking.delete');
	});

	Route::get('/{pagination}', 'Student\RoomController@index');
	Route::get('/{room_id}/detail', 'Student\RoomController@detail');
});
