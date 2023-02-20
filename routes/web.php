<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\QrCodeController;
use App\Models\Certificate;
//use Illuminate\Support\Facades\DB;
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
Route::get('/besevic/{id}', [\App\Http\Controllers\FillPDFController::class,'process'])->name('besevic');
//Route::get('/besevic', [\App\Http\Controllers\FillPDFController::class,'process'])->name('besevic');
Route::get('/', function () {
    return view('welcome');
});

Route::get('generate-QrCode/{id}', [QrCodeController::class, 'generateQrCode'])->name('generate-code');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/lockscreen', [CertificateController::class, 'index'])->name('lockscreen');

Route::get('certificate/index', [CertificateController::class, 'index'])->name('certificate.index');
Route::get('certificate/create', [CertificateController::class, 'create'])->name('certificate.create');
Route::post('certificate/store', [CertificateController::class, 'store'])->name('certificate.store');
Route::get('certificate/edit/{id}', [CertificateController::class, 'edit'])->name('certificate.edit');
Route::get('certificate/show/{id}', [CertificateController::class, 'show'])->name('certificate.show');
Route::put('certificate/update', [CertificateController::class, 'update'])->name('certificate.update');
Route::delete('certificate/destroy', [CertificateController::class, 'destroy'])->name('certificate.destroy');



