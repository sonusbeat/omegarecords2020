<?php

Route::namespace("Admin")
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {
        Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
        Route::resource('users', 'UsersController');
        Route::resource('studio_gallery', 'StudioGalleryController');
});
