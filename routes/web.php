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

Route::get('/hello', function () {
    return 'Hello my friend';
});

Route::get('/teste', function () {
    return view('teste');
});

Route::get('/hello/{flag}', function ($flag) {
    return "Hello my friend {$flag}";
});

Route::get('/testeid/{id}', function ($id) {
    return "O id é: {$id}";
});

Route::get('redirect1', function () {
    return redirect('/redirect2');
});

Route::get('redirect2', function () {
    return 'redirect 2';
});

Route::get('/login', function () {
    return 'Tela de login';
})->name('login');

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::get('/dashboard', 'TesteController@teste')->name('admin.dashboard');

    Route::get('/financeiro', 'TesteController@teste')->name('admin.financeiro');

    Route::get('/produtos', 'TesteController@teste')->name('admin.products');

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    })->name('home');
});

//             OU          //

/*
Route::middleware([])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::namespace('Admin')->group(function () {
            Route::name('admin.')->group(function () {
                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
                Route::get('/produtos', 'TesteController@teste')->name('products');
                Route::get('/', function () {
                    return redirect()->route('admin.dashboard');
                })->name('home');
            });
        });
    });
});
*/
