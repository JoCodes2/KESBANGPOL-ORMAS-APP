<?php

use App\Http\Controllers\CMS\FlowReportController;
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
    return view('welcome');
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
// * end route api *//
