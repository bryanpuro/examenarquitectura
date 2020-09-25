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
    return view('home');
});

Route::get('/administrador', function () 
{
    return view('admin.Administrador');
    
})->middleware('auth');
;


Route::get('/empleado', function () 
{
    return view('empleado.Empleado');
    
})->middleware('auth');
;

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home')

->middleware('auth');
Route::get('/empleado', 'Clientes_Controller@index2')
->name('empleado')
->middleware('auth');

Route::post('/detallealquiler' ,'DetalleAlquiler_Controller@store')->name('detallealquiler');
Route::post('/detallealquiler' ,'DetalleAlquiler_Controller@store2')->name('detallealquiler');


Route::delete('/detallealquiler/{id_detalle}', 'DetalleAlquiler_Controller@destroy')
->where('id_detalle', '[0-9]+')
->name('detallealquiler');

Route::delete('/reporte/{id_alquiler}', 'Reporte_Controller@destroy')
->where('id_alquiler', '[0-9]+')
->name('reporte');

Route::get('/detallealquiler/reporte/{id_alquiler}', 'Reporte_Controller@index')
    ->where('id_alquiler', '[0-9]+')
    ->name('reporte');

Route::get('/detallealquiler/{id_alquiler}', 'DetalleAlquiler_Controller@edit')
->where('id_alquiler', '[0-9]+')
->name('detallealquiler');

Route::group(['middleware' => ['auth']], function () {

    Route::resource('catbicicletas','CatBicicletas_Controller');
    Route::resource('bicicletas','Bicicletas_Controller');
    Route::resource('agregarusuario','AgregarUsuario_Controller');
    Route::resource('clientes','Clientes_Controller');
    Route::resource('vistaalquiler' ,'DetalleAlquiler_Controller');
    
    
});