<?php

use App\Http\Controllers\ValeController;
use App\Http\Controllers\EmpresaController;
use App\Models\Vale;
use Illuminate\Support\Facades\Auth;
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
/*Route::resources([
    'vale' => ValeController::class,
    'empresa'=> EmpresaController::class,
]);*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/vale', 'ValeController@index')->name('vale.index');
Route::get('vales/{id}/edit', 'ValeController@editVale2')->name('vale.editVale2');
Route::put('vales/{id}', 'ValeController@updateVale2')->name('vale.updateVale2');
Route::get('/buscarID/{id}', 'ValeController@buscarID')->name('vale.buscarID');
Route::get('/vales3/index', 'ValeController@valesID')->name('vale.valesID');
Route::get('vale/lotes', 'ValeController@lotes')->name('vale.lotes');
Route::get('vale/create', 'ValeController@create')->name('vale.create');
Route::post('/vale', 'ValeController@store')->name('vale.store');
Route::get('/vale/{vale}', 'ValeController@show')->name('vale.show');
Route::get('/vale/{vale}/recibo', 'ValeController@recibo')->name('vale.recibo');
Route::get('/vale/{vale}/pdf', 'ValeController@pdf')->name('vale.pdf');
Route::get('/vale/{vale}/boleta', 'ValeController@boleta')->name('vale.boleta');
Route::get('/vale/{vale}/cheque', 'ValeController@cheque')->name('vale.cheque');

Route::get('/vale/{vale}/cheque1', 'ValeController@cheque1')->name('vale.cheque1');
Route::get('/vale/{vale}/cheque2', 'ValeController@cheque2')->name('vale.cheque2');
Route::get('/vale/{vale}/cheque3', 'ValeController@cheque3')->name('vale.cheque3');
Route::get('/vale/{vale}/cheque4', 'ValeController@cheque4')->name('vale.cheque4');
Route::get('/vale/{vale}/cheque5', 'ValeController@cheque5')->name('vale.cheque5');

Route::get('/vale/{vale}/pdfvale', 'ValeController@pdfvale')->name('vale.pdfvale');
Route::get('/vale/{vale}/pdfvale1', 'ValeController@pdfvale1')->name('vale.pdfvale1');
Route::get('/vale/{vale}/pdfvale2', 'ValeController@pdfvale2')->name('vale.pdfvale2');
Route::get('/vale/{vale}/pdfvale3', 'ValeController@pdfvale3')->name('vale.pdfvale3');
Route::get('/vale/{vale}/pdfvale4', 'ValeController@pdfvale4')->name('vale.pdfvale4');
Route::get('/vale/{vale}/pdfvale5', 'ValeController@pdfvale5')->name('vale.pdfvale5');

Route::get('/{vales2}/{id}/{vale}/{id}',['Vale2Controller@edit'])->name('vale.edit');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
