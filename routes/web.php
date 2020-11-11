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

Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/resetPassword', 'HomeController@cambiarPassword')->name('resetPassword');
Route::post('/resetPassword', 'HomeController@resetPass')->name('resetPass');
Route::get('/equipo', 'NominaController@index')->name('equipo');
Route::get('/historial', 'HistoricalController@index')->name('historial');
Route::get('/timesheet', 'TimesheetController@index')->name('timesheet');
Route::post('/timesheet', 'TimesheetController@busqueda')->name('busqueda');
Route::post('/timesheet/actualizar', 'TimesheetController@actualizar')->name('actualizar');

Route::get('descargar/{id}', 'HistoricalController@pdf')->name('reciboPago');


Route::resource('/ajustes','AjusteController');
Route::resource('/usuarios','UsersController');

//Rutas de la API.
Route::prefix('api')->group(function () {
	//Route::resource('/rutas','ApiController@index')->name('rutas');
	Route::post('createProduct', 'ApiController@createProduct')->name('create_product');
    Route::get('searchArticle', 'ApiController@searchArticle')->name('search_article');
	
});

// //Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

// //Clear Cache facade value:
Route::get('/clear-cache', function() {
     $exitCode = Artisan::call('cache:clear');
     return '<h1>Cache facade value cleared</h1>';
});

// //View Clear facade value:
Route::get('/view-clear', function() {
     $exitCode = Artisan::call('view:clear');
     return '<h1>View facade value cleared</h1>';
});

// //View cache facade value:
Route::get('/view-cache', function() {
     $exitCode = Artisan::call('view:cache');
     return '<h1>View facade value cache</h1>';
});
