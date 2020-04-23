<?php
use \App\Mail\ContactForm;

Route::namespace("Front")->name('front.')->group(function() {
	Route::get('/', 'PagesController@index')->name('home');
	Route::get('estudio', 'PagesController@studio')->name('studio');
	Route::get('equipo', 'PagesController@equipment')->name('equipment');
	Route::get('servicios', 'PagesController@services')->name('services');
	Route::get('contacto', 'PagesController@contact')->name('contact');
	Route::post('email-process', 'PagesController@email')->name('email-process');
});
