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
Route::group([], function () {
    Route::match(['get', 'post'], '/', ['uses' => 'IndexController@execute', 'as' => 'home']);
    Route::get('/page/{alias}', ['uses' => 'PagesController@execute', 'as' => 'page']);
    Route::auth();
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function () {

        if (view()->exists('admin.index')) {
            $data = ['title' => 'admin board'];
            return view('admin.index', $data);
        }

    });
    Route::group(['prefix' => 'pages'], function () {
        //admin/pages
        Route::get('/', ['uses' => 'Pages2Controller@execute', 'as' => 'pages']);
        //admin/pages/add
        Route::match(['get', 'post'], '/add', ['uses' => 'PagesAddController@execute', 'as' => 'PagesAdd']);
        //admin/pages/edit
        Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses' => 'PagesEditController@execute', 'as' => 'PagesEdit']);
    });
    Route::group(['prefix' => 'portfolios'], function () {
        //admin/pages
        Route::get('/', ['uses' => 'PortfolioController@execute', 'as' => 'portfolio']);
        //admin/pages/add
        Route::match(['get', 'post'], '/add', ['uses' => 'PortfolioAddController@execute', 'as' => 'PortfolioAdd']);
        //admin/pages/edit
        Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses' => 'PortfolioEditController@execute', 'as' => 'PortfolioEdit']);
    });
    Route::group(['prefix' => 'services'], function () {
        //admin/pages
        Route::get('/', ['uses' => 'ServicesController@execute', 'as' => 'services']);
        //admin/pages/add
        Route::match(['get', 'post'], '/add', ['uses' => 'ServiceAddController@execute', 'as' => 'ServiceAdd']);
        //admin/pages/edit
        Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses' => 'ServiceEditController@execute', 'as' => 'ServiceEdit']);
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
