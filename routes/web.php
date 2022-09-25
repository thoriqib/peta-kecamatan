<?php

use App\Http\Controllers\PetaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UploadController;
use App\Kecamatan;
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
    return view('index');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout']);


Route::group(['middleware' => ['auth']], function (){
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'data_kec' => Kecamatan::orderBy('nama')->get()
        ]);
    })->name('dashboard');
    Route::get('/upload', [UploadController::class, 'index']);
    Route::post('/upload', [UploadController::class, 'store']);

    Route::get('/peta/{kecamatan}', [PetaController::class, 'show']);

    Route::post('/catatan', [PetaController::class, 'storeCatatan'])->name('catatan.store');
});



