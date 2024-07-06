<?php

use App\Http\Controllers\CMS\FlowReportController;
use App\Http\Controllers\CMS\UserController;
use App\Http\Controllers\CMS\ProdukHukumController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Layouts.master');
});

Route::get('/alur-lapor-ormas', function () {
    return view('admin.ReportOrmas');
});
Route::get('/produk-hukum', function () {
    return view('admin.ProdukHukum');
});
Route::get('/user', function () {
    return view('admin.User');
});
//* route api *//
// route  api flow report //
Route::prefix('v1/flow-report')->controller(FlowReportController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/create', 'createData');
    Route::get('/get/{id}', 'getDataById');
    Route::post('/update/{id}', 'updateDataById');
    Route::delete('/delete/{id}', 'deleteData');
});

// route  api produk hukum //
Route::prefix('v1/produk-hukum')->controller(ProdukHukumController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/create', 'createData');
    Route::get('/get/{id}', 'getDataById');
    Route::post('/update/{id}', 'updateDataById');
    Route::delete('/delete/{id}', 'deleteData');
});

// route  api user //
Route::prefix('v1/user')->controller(UserController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/create', 'createData');
    Route::get('/get/{id}', 'getDataById');
    Route::post('/update/{id}', 'updateDataById');
    Route::delete('/delete/{id}', 'deleteData');
});

// * end route api *//
