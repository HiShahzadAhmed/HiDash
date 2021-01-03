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

Route::get('users', 'PostController@users');

Route::get('queue-mail', 'PostController@queueMail');


Route::get('/pdf', 'PdfController@index');

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test')->name('test');

Route::get('/check', 'HomeController@check');

Route::get('/search', function () {
    return view('search');
});

Route::post('/autocomplete/fetch', 'HomeController@fetch')->name('autocomplete.fetch');



///////////////////admin route//////////

Route::prefix('admin')->group(function () {
    /***********Login Routes************/
    Route::get('/login', 'Admin\AdminLoginController@indexLogin')->name('login-admin');
    Route::post('/login', 'Admin\AdminLoginController@attemptLogin')->name('admin.login');

    /////////////Dashboard routes////////////
    Route::group(['middleware' => ['admin']], function() {

        Route::get('/', 'Admin\AdminLoginController@dashboard')->name('dashboard');


        Route::resources([
            'roles'     => 'Admin\RoleController',
            'users'     => 'Admin\UserController',
            'products'  => 'Admin\ProductController',
        ]);

    });


});












Route::get('/admin-logout', function () {
    auth()->logout();
    return redirect()->route('login-admin');
})->name('admin.logout');

Route::get('/models', 'HomeController@getModels');
