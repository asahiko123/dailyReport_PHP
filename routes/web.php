<?php

use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LaborMgtController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WorkDivController;

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
    Route::post('dailyReport/store',[DailyReportController::class,'store'])->name('dailyReport.store');
    Route::get('dailyReport/download',[DailyReportController::class,'download'])->name('dailyReport.download');
    Route::get('staff',[StaffController::class,'index'])->name('staff.index');
    Route::post('staff/store',[StaffController::class,'store'])->name('staff.store');
    Route::get('workDiv',[WorkDivController::class,'index'])->name('workDiv.index');
    Route::post('workDiv/store',[WorkDivController::class,'store'])->name('workDiv.store');
    Route::get('supplier',[SupplierController::class,'index'])->name('supplier.index');
    Route::post('supplier/store',[SupplierController::class,'store'])->name('supplier.store');
    Route::get('labor',[LaborMgtController::class,'index'])->name('labor.index');
    Route::get('labor/download',[LaborMgtController::class,'download'])->name('pages.searchdownload');
    Route::post('search',[LaborMgtController::class,'search'])->name('labor.search');

});
