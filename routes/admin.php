<?php

Route::namespace("Admin")
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {
        Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
        Route::patch('users/{id}/active', 'UsersController@active')->name('users.active');
        Route::resource('users', 'UsersController');
        Route::patch('studio_gallery/{id}/active', 'StudioGalleryController@active')->name('studio_gallery.active');
        Route::resource('studio_gallery', 'StudioGalleryController');
        Route::patch('equipment_categories/{id}/active', 'EquipmentCategoriesController@active')->name('equipment_categories.active');
        Route::resource('equipment_categories', 'EquipmentCategoriesController');
});
