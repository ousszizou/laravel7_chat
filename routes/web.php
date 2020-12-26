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
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    "namespace" => "Auth",
    "prefix" => "admin",
],function() {
    Route::get("login", "AdminLoginController@showLoginForm")->name("admin.show_login");
    Route::post("login", "AdminLoginController@login")->name("admin.do_login");
    Route::post("logout", "AdminLoginController@logout")->name("admin.logout");

    // password reset
    Route::get('/password/reset', 'ForgotPasswordAdminController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'ForgotPasswordAdminController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'ResetPasswordAdminController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'ResetPasswordAdminController@reset')->name('admin.password.update');
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

Route::group(["prefix" => "{lang}"], function() {
    Route::get("/", function() {
        echo __("test");
    });
    Route::get("/test", function() {
        return view("test");
    })->name("test-lang");
});
