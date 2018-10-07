<?php

Route::get('api/dashboard', 'DashboardController@index');

Route::get('/', function () {
    return view('welcome');
});
