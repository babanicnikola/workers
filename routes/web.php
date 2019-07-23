<?php

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth');

/* Routes for the items in the top bar*/
Route::get('/profile', function() {
        return view('profile');
})->middleware('auth');

Route::get('/settings', function() {
    return view('settings');
})->middleware('auth');

Route::get('/activity', function() {
    return view('activity');
})->middleware('auth');

/* Routes for the items in the left side bar */
Route::get('/employees', 'EmployeesController@index')->middleware('auth');

Route::get('/employees/create', 'EmployeesController@create')->middleware('auth');

Route::put('/employees/store', 'EmployeesController@store')->middleware('auth');

Route::get('/jobs', function() {
    return view('jobs.jobs');
})->middleware('auth');
Route::get('/jobs/create', function() {
    return view('jobs.create');
})->middleware('auth');
Route::get('/jobs/assign', function() {
    return view('jobs.assign');
})->middleware('auth');

Route::get('/finances', function() {
    return view('finances');
})->middleware('auth');