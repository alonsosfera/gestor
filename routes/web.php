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


Route::get('/', 'CultivosController@getDashboard')->name('Dashboard');

Auth::routes();

Route::get('/weather/{id}','CultivosController@getUrl');

Route::post('/changePassword','UsersController@changePassword')->name('changePassword');

Route::post('/nCultivos', 'CultivosController@submit')->name('crearcultivo');

Route::get('/registros', 'RegistroRiegos@getRiegos')->name('Historial de Riegos');

Route::put('/registro/{id}', 'RegistroRiegos@RealizarRiego');

Route::post('/nUsuarios', 'UsersController@new');

Route::post('/nRiegos', 'TiposriegoController@new');

Route::post('/nSuelos', 'TiposSueloController@new');

Route::delete('/dRiegos/{id}', 'TiposriegoController@destroy');

Route::delete('/dUsuarios/{id}', 'UsersController@destroy');

Route::delete('/dSuelos/{id}', 'TiposSueloController@destroy');

Route::delete('/dCultivos/{id}', 'CultivosController@destroy');

Route::put('/eRiegos/{id}', 'TiposriegoController@update');

Route::put('/eSuelos/{id}', 'TiposSueloController@update');

Route::put('/eUsuarios/{id}', 'UsersController@update');

Route::put('/eCultivos/{id}', 'CultivosController@update');

Route::put('/eFrutos/{id}', 'TiposCultivoController@update');

Route::put('/sens/{id}', 'CultivosController@sensor');

Route::get('/cultivo/{id}', 'CultivosController@getCultivo')->name('Cultivo');

Route::post('/borrar', 'CultivosController@deleteCultivo')->name('borrarcultivo');

Route::get('/Usuarios', 'UsersController@getUsuarios')->name('Usuarios');

Route::get('/Cultivos', 'CultivosController@getAll')->name('Cultivos');

Route::get('/Frutos', 'TiposCultivoController@getFrutos')->name('Frutos');

Route::get('/Riegos', 'TiposRiegoController@getAll')->name('Riegos');

Route::get('/Suelos', 'TiposSueloController@getAll')->name('Suelos');

Route::get('/Sensores', 'SensoresController@getAll')->name('Sensores');

Route::get('/search/Usuarios', 'UsersController@search');

Route::get('/search/Frutos', 'TiposCultivoController@search');

Route::get('/search/Cultivos', 'CultivosController@search');

Route::get('/search/Riegos', 'TiposRiegoController@search');

Route::get('/search/Suelos', 'TiposSueloController@search');

Route::get('/sensapi', 'CultivosController@ApiSensor');

Route::get('/CSV/Usuarios', 'CsvController@Users');

Route::get('/CSV/Cultivos', 'CsvController@Cultivos');

Route::get('/CSV/Frutos', 'CsvController@Frutos');

Route::get('/CSV/Riegos', 'CsvController@Riegos');

Route::get('/CSV/Suelos', 'CsvController@Suelos');

Route::get('/PDF/Usuarios', 'PdfController@Users');

Route::get('/PDF/Cultivos', 'PdfController@Cultivos');

Route::get('/PDF/Frutos', 'PdfController@Frutos');

Route::get('/PDF/Riegos', 'PdfController@Riegos');

Route::get('/PDF/Suelos', 'PdfController@Suelos');

Route::get('/XML/Usuarios', 'XmlController@Users');

Route::get('/XML/Cultivos', 'XmlController@Cultivos');

Route::get('/XML/Frutos', 'XmlController@Frutos');

Route::get('/XML/Riegos', 'XmlController@Riegos');

Route::get('/XML/Suelos', 'XmlController@Suelos');

Route::get('/XML/r{id}', 'XmlController@RiegosCliente');

Route::get('/PDF/r{id}', 'PdfController@RiegosCliente');

Route::get('/CSV/r{id}', 'CsvController@RiegosCliente');
