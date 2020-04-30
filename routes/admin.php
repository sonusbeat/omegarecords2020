<?php

Route::namespace("Admin")
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {
        Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
});
