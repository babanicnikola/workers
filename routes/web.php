<?php
/* Home route */
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/home', 'HomeController@index')->middleware('auth');


/* Auth routes */
Auth::routes();


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
Route::get('/finances', function() {
    return view('finances');
})->middleware('auth');

Route::get('/schedules', function() {
    return view('schedules');
})->middleware('auth');


/*Employees routes*/
Route::get('/employees', 'EmployeesController@index')->middleware('auth');
Route::get('/employees/create', 'EmployeesController@create')->middleware('auth');
Route::put('/employees/store', 'EmployeesController@store')->middleware('auth');
Route::get('/employees/edit/{emp_id}', 'EmployeesController@edit')->middleware('auth')->name('employees.edit');
Route::put('/employees/update', 'EmployeesController@update')->middleware('auth');
Route::get('/employees/delete/{id}', 'EmployeesController@destroy')->middleware('auth');;


/*Offices routes*/
Route::get('/offices', 'officesController@index')->middleware('auth');
Route::get('/offices/create', 'officesController@create')->middleware('auth');
Route::put('/offices/store', 'officesController@store')->middleware('auth');
Route::get('/offices/edit/{emp_id}', 'officesController@edit')->middleware('auth')->name('offices.edit');
Route::put('/offices/update', 'officesController@update')->middleware('auth');
Route::get('/offices/delete/{id}', 'officesController@destroy')->middleware('auth');;