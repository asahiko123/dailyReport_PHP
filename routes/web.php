<?php

use App\Http\Controllers\DailyReportController;

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


Route::group(['middleware'=>'auth'],function(){
    Route::get('dailyReport',[DailyReportController::class,'index'])->name('dailyReport.index');
    Route::get('stuff',[StuffController::class,'index'])->name('stuff.index');
    Route::get('workDiv',[WorkDivController::class,'index'])->name('workDiv.index');
    Route::get('supplier',[SupplierController::class,'index'])->name('supplier.index');
    Route::get('labor',[LaborMgtController::class,'index'])->name('labor.index');
});
