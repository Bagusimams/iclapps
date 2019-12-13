<?php
Route::group(['prefix' => 'inventory'], function () {
	Route::group(['prefix' => 'booking'], function () {
		Route::get('/create', 'Staff\InventoryBookingController@create');
		Route::post('/create', 'Staff\InventoryBookingController@store')->name('inventory.booking.store');
		Route::get('/{pagination}', 'Staff\InventoryBookingController@index');
		Route::get('/{booking_id}/detail', 'Staff\InventoryBookingController@detail');
		Route::get('/{booking_id}/edit', 'Staff\InventoryBookingController@edit');
		Route::put('/{booking_id}/edit', 'Staff\InventoryBookingController@update')->name('inventory.booking.update');
		Route::get('/{booking_id}/change/{status}', 'Staff\InventoryBookingController@changeStatus');
		Route::get('/{booking_id}/item/{status}', 'Staff\InventoryBookingController@changeItemStatus');
		Route::delete('/{booking_id}/delete', 'Staff\InventoryBookingController@delete')->name('inventory.booking.delete');
	});

	Route::get('/create', 'Staff\InventoryController@create');
	Route::post('/create', 'Staff\InventoryController@store')->name('inventory.store');
	Route::get('/{pagination}', 'Staff\InventoryController@index');
	Route::get('/{inventory_id}/detail', 'Staff\InventoryController@detail');
	Route::get('/{inventory_id}/edit', 'Staff\InventoryController@edit');
	Route::put('/{inventory_id}/edit', 'Staff\InventoryController@update')->name('inventory.update');
	Route::delete('/{inventory_id}/delete', 'Staff\InventoryController@delete')->name('inventory.delete');
});

Route::group(['prefix' => 'room'], function () {
	Route::group(['prefix' => 'booking'], function () {
		Route::get('/create', 'Staff\RoomBookingController@create');
		Route::post('/create', 'Staff\RoomBookingController@store')->name('room.booking.store');
		Route::get('/{pagination}', 'Staff\RoomBookingController@index');
		Route::get('/{inventory_id}/detail', 'Staff\RoomBookingController@detail');
		Route::get('/{inventory_id}/edit', 'Staff\RoomBookingController@edit');
		Route::put('/{inventory_id}/edit', 'Staff\RoomBookingController@update')->name('room.booking.update');
		Route::delete('/{inventory_id}/delete', 'Staff\RoomBookingController@delete')->name('room.booking.delete');
	});

	Route::get('/create', 'Staff\RoomController@create');
	Route::post('/create', 'Staff\RoomController@store')->name('room.store');
	Route::get('/{pagination}', 'Staff\RoomController@index');
	Route::get('/{inventory_id}/detail', 'Staff\RoomController@detail');
	Route::get('/{inventory_id}/edit', 'Staff\RoomController@edit');
	Route::put('/{inventory_id}/edit', 'Staff\RoomController@update')->name('room.update');
	Route::delete('/{inventory_id}/delete', 'Staff\RoomController@delete')->name('room.delete');
});

Route::group(['prefix' => 'complaint'], function () {
	Route::get('/getMajors/{school_id}', 'Staff\ComplaintController@getMajors');
	Route::get('/create', 'Staff\ComplaintController@create');
	Route::post('/create', 'Staff\ComplaintController@store')->name('complaint.store');
	Route::get('/{pagination}', 'Staff\ComplaintController@index');
	Route::get('/{complaint_id}/detail', 'Staff\ComplaintController@detail');
	Route::get('/{complaint_id}/edit', 'Staff\ComplaintController@edit');
	Route::put('/{complaint_id}/edit', 'Staff\ComplaintController@update')->name('complaint.update');
	Route::put('/{complaint_id}/change/{status}', 'Staff\ComplaintController@changeStatus')->name('complaint.change');
	Route::delete('/{complaint_id}/delete', 'Staff\ComplaintController@delete')->name('complaint.delete');
});

Route::group(['prefix' => 'course'], function () {
	Route::get('/getAvailableRoom/{day}/{start_time}/{end_time}', 'Staff\LectureScheduleController@getAvailableRoom');
	Route::get('/getAvailableRoomByDate/{start_time}/{end_time}/{date}', 'Staff\LectureScheduleController@getAvailableRoomByDate');
	Route::get('/create/{mode}/{old_id}', 'Staff\LectureScheduleController@create');
	Route::post('/create/{mode}/{old_id}', 'Staff\LectureScheduleController@store')->name('course.store');
	Route::get('/{pagination}', 'Staff\LectureScheduleController@index');
	Route::get('/req/{type}/{pagination}', 'Staff\LectureScheduleController@indexReq');
	Route::get('/{course_id}/detail', 'Staff\LectureScheduleController@detail');
	Route::get('/{course_id}/edit', 'Staff\LectureScheduleController@edit');
	Route::put('/{course_id}/edit', 'Staff\LectureScheduleController@update')->name('course.update');
	Route::put('/{course_id}/change/{status}', 'Staff\LectureScheduleController@changeStatus')->name('course.change');
	Route::delete('/{course_id}/delete', 'Staff\LectureScheduleController@delete')->name('course.delete');
});

Route::group(['prefix' => 'exam-supervisor'], function () {
	Route::get('/create', 'Staff\ExamSupervisorController@create');
	Route::post('/create', 'Staff\ExamSupervisorController@store')->name('exam-supervisor.store');
	Route::get('/{pagination}', 'Staff\ExamSupervisorController@index');
	Route::get('/{supervisor_id}/detail', 'Staff\ExamSupervisorController@detail');
	Route::get('/{supervisor_id}/edit', 'Staff\ExamSupervisorController@edit');
	Route::put('/{supervisor_id}/edit', 'Staff\ExamSupervisorController@update')->name('exam-supervisor.update');
	Route::put('/{supervisor_id}/change/{status}', 'Staff\ExamSupervisorController@changeStatus')->name('exam-supervisor.change');
	Route::delete('/{supervisor_id}/delete', 'Staff\ExamSupervisorController@delete')->name('exam-supervisor.delete');
});

Route::group(['prefix' => 'student-exchange'], function () {
	Route::get('/create', 'Staff\StudentExchangeController@create');
	Route::post('/create', 'Staff\StudentExchangeController@store')->name('student-exchange.store');
	Route::get('/{university_id}/{status}/{pagination}', 'Staff\StudentExchangeController@index');
	Route::get('/{university_id}/edit', 'Staff\StudentExchangeController@edit');
	Route::put('/{university_id}/edit', 'Staff\StudentExchangeController@update')->name('exchange.update');
	Route::get('/{university_id}/upload', 'Staff\StudentExchangeController@upload');
	Route::put('/{university_id}/upload', 'Staff\StudentExchangeController@updateUpload')->name('student-exchange.upload');
	Route::put('/{university_id}/assign', 'Staff\StudentExchangeController@assignLecturer')->name('student-exchange.assign');
	Route::get('/{exchange_id}/assign', 'Staff\StudentExchangeController@assign');
	Route::get('/{exchange_id}/important', 'Staff\StudentExchangeController@important');
	Route::get('/{exchange_id}/detail', 'Staff\StudentExchangeController@detail');
	Route::get('/{exchange_id}/accept', 'Staff\StudentExchangeController@accept');
	Route::get('/{exchange_id}/reject', 'Staff\StudentExchangeController@reject');
	Route::get('/{exchange_id}/ticket', 'Staff\StudentExchangeController@ticket');
	Route::get('/{exchange_id}/payment', 'Staff\StudentExchangeController@payment');
	Route::delete('/{exchange_id}/delete', 'Staff\StudentExchangeController@delete')->name('student-exchange.delete');
});

Route::group(['prefix' => 'university-exchange'], function () {
	Route::get('/create', 'Staff\UniversityExchangeController@create');
	Route::post('/create', 'Staff\UniversityExchangeController@store')->name('university-exchange.store');
	Route::get('/{pagination}', 'Staff\UniversityExchangeController@index');
	Route::get('/{university_id}/detail', 'Staff\UniversityExchangeController@detail');
	Route::get('/{university_id}/edit', 'Staff\UniversityExchangeController@edit');
	Route::put('/{university_id}/edit', 'Staff\UniversityExchangeController@update')->name('university-exchange.update');
	Route::delete('/{university_id}/delete', 'Staff\UniversityExchangeController@delete')->name('university-exchange.delete');
});

Route::group(['prefix' => 'dual-degree'], function () {
	Route::get('/create', 'Staff\DualDegreeController@create');
	Route::post('/create', 'Staff\DualDegreeController@store')->name('dual-degree.store');
	Route::get('/{university_id}/{status}/{pagination}', 'Staff\DualDegreeController@index');
	Route::get('/{university_id}/upload', 'Staff\DualDegreeController@upload');
	Route::put('/{university_id}/upload', 'Staff\DualDegreeController@updateUpload')->name('dual-degree.upload');
	Route::put('/{university_id}/assign', 'Staff\DualDegreeController@assignLecturer')->name('dual-degree.assign');
	Route::get('/{joint_id}/assign', 'Staff\DualDegreeController@assign');
	Route::get('/{joint_id}/important', 'Staff\DualDegreeController@important');
	Route::get('/{joint_id}/detail', 'Staff\DualDegreeController@detail');
	Route::get('/{joint_id}/accept', 'Staff\DualDegreeController@accept');
	Route::get('/{joint_id}/ticket', 'Staff\DualDegreeController@ticket');
	Route::get('/{joint_id}/payment', 'Staff\DualDegreeController@payment');
	Route::delete('/{joint_id}/delete', 'Staff\DualDegreeController@delete')->name('dual-degree.delete');
});

Route::group(['prefix' => 'university-joint'], function () {
	Route::get('/create', 'Staff\UniversityJointController@create');
	Route::post('/create', 'Staff\UniversityJointController@store')->name('university-joint.store');
	Route::get('/{pagination}', 'Staff\UniversityJointController@index');
	Route::get('/{university_id}/detail', 'Staff\UniversityJointController@detail');
	Route::get('/{university_id}/edit', 'Staff\UniversityJointController@edit');
	Route::put('/{university_id}/edit', 'Staff\UniversityJointController@update')->name('university-joint.update');
	Route::delete('/{university_id}/delete', 'Staff\UniversityJointController@delete')->name('university-joint.delete');
});

Route::group(['prefix' => 'summer'], function () {
	Route::get('/create', 'Staff\SummerController@create');
	Route::post('/create', 'Staff\SummerController@store')->name('summer.store');
	Route::get('/{university_id}/{status}/{pagination}', 'Staff\SummerController@index');
	Route::get('/{university_id}/upload', 'Staff\SummerController@upload');
	Route::put('/{university_id}/upload', 'Staff\SummerController@updateUpload')->name('summer.upload');
	Route::put('/{university_id}/assign', 'Staff\SummerController@assignLecturer')->name('summer.assign');
	Route::get('/{joint_id}/assign', 'Staff\SummerController@assign');
	Route::get('/{joint_id}/important', 'Staff\SummerController@important');
	Route::get('/{joint_id}/detail', 'Staff\SummerController@detail');
	Route::get('/{joint_id}/accept', 'Staff\SummerController@accept');
	Route::get('/{joint_id}/ticket', 'Staff\SummerController@ticket');
	Route::get('/{joint_id}/payment', 'Staff\SummerController@payment');
	Route::delete('/{joint_id}/delete', 'Staff\SummerController@delete')->name('summer.delete');
});

Route::group(['prefix' => 'summer-school'], function () {
	Route::get('/create', 'Staff\SummerSchoolController@create');
	Route::post('/create', 'Staff\SummerSchoolController@store')->name('summer-school.store');
	Route::get('/{pagination}', 'Staff\SummerSchoolController@index');
	Route::get('/{university_id}/detail', 'Staff\SummerSchoolController@detail');
	Route::get('/{university_id}/edit', 'Staff\SummerSchoolController@edit');
	Route::put('/{university_id}/edit', 'Staff\SummerSchoolController@update')->name('summer-school.update');
	Route::delete('/{university_id}/delete', 'Staff\SummerSchoolController@delete')->name('summer-school.delete');
});

Route::group(['prefix' => 'winter'], function () {
	Route::get('/create', 'Staff\WinterController@create');
	Route::post('/create', 'Staff\WinterController@store')->name('winter.store');
	Route::get('/{university_id}/{status}/{pagination}', 'Staff\WinterController@index');
	Route::get('/{university_id}/upload', 'Staff\WinterController@upload');
	Route::put('/{university_id}/upload', 'Staff\WinterController@updateUpload')->name('winter.upload');
	Route::put('/{university_id}/assign', 'Staff\WinterController@assignLecturer')->name('winter.assign');
	Route::get('/{joint_id}/assign', 'Staff\WinterController@assign');
	Route::get('/{joint_id}/important', 'Staff\WinterController@important');
	Route::get('/{joint_id}/detail', 'Staff\WinterController@detail');
	Route::get('/{joint_id}/accept', 'Staff\WinterController@accept');
	Route::get('/{joint_id}/ticket', 'Staff\WinterController@ticket');
	Route::get('/{joint_id}/payment', 'Staff\WinterController@payment');
	Route::delete('/{joint_id}/delete', 'Staff\WinterController@delete')->name('winter.delete');
});

Route::group(['prefix' => 'winter-school'], function () {
	Route::get('/create', 'Staff\WinterSchoolController@create');
	Route::post('/create', 'Staff\WinterSchoolController@store')->name('winter-school.store');
	Route::get('/{pagination}', 'Staff\WinterSchoolController@index');
	Route::get('/{university_id}/detail', 'Staff\WinterSchoolController@detail');
	Route::get('/{university_id}/edit', 'Staff\WinterSchoolController@edit');
	Route::put('/{university_id}/edit', 'Staff\WinterSchoolController@update')->name('winter-school.update');
	Route::delete('/{university_id}/delete', 'Staff\WinterSchoolController@delete')->name('winter-school.delete');
});

Route::group(['prefix' => 'variable'], function () {
	Route::get('/{pagination}', 'Staff\VariableController@index');
	Route::get('/{variable_id}/detail', 'Staff\VariableController@detail');
	Route::get('/{variable_id}/edit', 'Staff\VariableController@edit');
	Route::put('/{variable_id}/edit', 'Staff\VariableController@update')->name('variable.update');
});

Route::group(['prefix' => 'internship'], function () {
	Route::get('/create', 'Staff\InternshipController@create');
	Route::post('/create', 'Staff\InternshipController@store')->name('internship.store');
	Route::get('/{pagination}', 'Staff\InternshipController@index');

	Route::group(['prefix' => '{internship_id}/applicant'], function () {
		Route::get('/{pagination}', 'Staff\InternshipApplicantController@index');
		Route::get('/{applicant_id}/detail', 'Staff\InternshipApplicantController@detail');
		Route::get('/{applicant_id}/edit', 'Staff\InternshipApplicantController@edit');
		Route::put('/{applicant_id}/edit', 'Staff\InternshipApplicantController@update')->name('variable.update');
	});
	Route::put('/{internship_id}/change/{status}', 'Staff\InternshipController@changeActive');
	Route::get('/{internship_id}/detail', 'Staff\InternshipController@detail');
	Route::get('/{internship_id}/edit', 'Staff\InternshipController@edit');
	Route::put('/{internship_id}/edit', 'Staff\InternshipController@update')->name('internship.update');
	Route::delete('/{internship_id}/delete', 'Staff\InternshipController@delete')->name('internship.delete');
});
