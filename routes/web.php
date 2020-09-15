<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    "namespace" => "Auth",
    "prefix" => "admin"
],function() {
    Route::get("login", "AdminLoginController@showLoginForm")->name("admin.show_login");
    Route::post("login", "AdminLoginController@login")->name("admin.do_login");
    Route::post("logout", "AdminLoginController@logout")->name("admin.logout");
});

Route::group([
    "prefix" => "admin",
    "middleware" => [
        "assign.guard:admin,admin/login"
    ],
], function() {
    Route::get("/dashboard", "AdminController@index")->name("dashboard");
    Route::get("/just-for-admins", function(){
        return "just for admins";
    })->middleware("role:administrator");
    Route::get("/moderate", function(){
        return "moderate";
    })->middleware("role:administrator|moderator");
});
