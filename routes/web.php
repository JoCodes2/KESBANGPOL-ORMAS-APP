<?php

use App\Http\Controllers\CMS\DocumentOrmasController;
use App\Http\Controllers\CMS\FlowReportController;
use App\Http\Controllers\CMS\OrmasController;
use App\Http\Controllers\CMS\ProdukHukumController;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Node\Block\Document;

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
Route::get('/ormas', function () {
    return view('admin.Ormas');
});
Route::get('/document-ormas', function () {
    return view('admin.DocumentOrmas');
});

Route::get('/produk-hukum', function () {
    return view('admin.ProdukHukum');
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

// Route api ormas //
Route::prefix('v1/ormas')->controller(OrmasController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/create', 'createData');
    Route::get('/get/{id}', 'getDataById');
    Route::post('/update/{id}', 'updateDataById');
    Route::delete('/delete/{id}', 'deleteData');
});

Route::prefix('v1/produk-hukum')->controller(ProdukHukumController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/create', 'createData');
    Route::get('/get/{id}', 'getDataById');
    Route::post('/update/{id}', 'updateDataById');
    Route::delete('/delete/{id}', 'deleteData');
});

Route::prefix('v1/document-ormas')->controller(DocumentOrmasController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::delete('/delete/{id}', 'deleteData');
});

// * end route api *//
