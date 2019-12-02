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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

    //return view('welcome');
    $credentials = [
        'email' => "motiur@gmail.com2",
        'password' => "123456",
    ];

    if (Auth::guard('writer')->attempt($credentials,true)) {
        //return "success";

        //return Auth::guard('writer')->user()->writer_id;
        return view('welcome');
    } else {

        return "failed";
    }

});
