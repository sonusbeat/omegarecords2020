<?php

Route::namespace("Front")->name('front.')->group(function() {
	Route::get('/', 'PagesController@index')->name('home');
	Route::get('estudio', 'PagesController@studio')->name('studio');
	Route::get('equipo', 'PagesController@equipment')->name('equipment');
	Route::get('servicios', 'PagesController@services')->name('services');
	Route::get('cursos', 'PagesController@courses')->name('courses');
	Route::get('curso/{permalink}', 'PagesController@course')->name('course');
	Route::get('instructor/{id}/{username}', 'PagesController@teacher')->name('teacher');
	Route::get('contacto', 'PagesController@contact')->name('contact');
	Route::post('email-process', 'PagesController@email')->name('email-process');
});

Auth::routes(['register' => false]);
