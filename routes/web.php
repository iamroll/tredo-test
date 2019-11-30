<?php

Route::get('/', 'MainController@main')->name('main');
Route::get('/departments', 'DepartmentController@departments')->name('departments');
Route::get('/employees', 'EmployeeController@employees')->name('employees');


Route::get('employees/list', 'EmployeeController@getEmployeesList');
Route::post('employees/save', 'EmployeeController@saveEmployee');

Route::get('departments/list', 'DepartmentController@getDepartmentsList');
Route::post('departments/save', 'DepartmentController@saveDepartment');
Route::post('departments/delete/{id}', 'DepartmentController@deleteDepartment');
