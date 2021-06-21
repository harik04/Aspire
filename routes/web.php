<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('login');
});
Route::any('/loan', function () {
    return view('loan');
});
Route::any('/profile', 'UserProfileController@show')->name('profile');

Route::any('/Approval', 'LoanApprovalController@approve')->name('Approval');

Route::any('/LoanApproved/{authorized}/{isapproved}/{amountrequired}', 'UserProfileController@LoanApproved')->name('LoanApproved');
