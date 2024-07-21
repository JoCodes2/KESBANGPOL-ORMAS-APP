<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CMS\DashboardController;
use App\Http\Controllers\CMS\DocumentOrmasController;
use App\Http\Controllers\CMS\FlowReportController;
use App\Http\Controllers\CMS\UserController;
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
// ui
Route::get('/', function () {
    return view('user.Home');
});
Route::get('/database', function () {
    return view('user.DatabaseOrmas');
});

// produkhukumui
Route::get('/produkhukum', function () {
    return view('user.ProdukHukumUi');
});

Route::get('/alur-lapor', function () {
    return view('user.AlurLapor');
});
Route::get('/search', function () {
    return view('user.searchOrmas');
});
Route::get('/register', function () {
    return view('user.registerOrmas');
});
// route view and api login
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/v1/login', [AuthController::class, 'login']);
});
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
    Route::get('/search-ormas', 'search'); // Pastikan menggunakan 'search'
    Route::get('/get-by-name', 'getByName'); // Tambahkan rute ini
    Route::get('/export-data', 'exportData')->name('export.data');
});

// route produk hukum //
Route::prefix('v1/produk-hukum')->controller(ProdukHukumController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/create', 'createData');
    Route::get('/get/{id}', 'getDataById');
    Route::post('/update/{id}', 'updateDataById');
    Route::delete('/delete/{id}', 'deleteData');
});

// end route api
Route::middleware(['web', 'auth'])->group(function () {
    Route::post('/v1/logout', [AuthController::class, 'logout']);
    Route::get('/v1/dashboard', [DashboardController::class, 'index']);

    Route::get('/cms/dashboard', function () {
        return view('admin.Dashboard');
    });
    Route::get('/cms/alur-lapor-ormas', function () {
        return view('admin.ReportOrmas');
    });
    Route::get('/cms/ormas', function () {
        return view('admin.Ormas');
    });
    Route::get('/cms/document-ormas', function () {
        return view('admin.DocumentOrmas');
    });

    Route::get('/cms/produk-hukum', function () {
        return view('admin.ProdukHukum');
    });
    Route::get('/cms/user', function () {
        return view('admin.User');
    });
    Route::get('/cms/search-ormas', function () {
        return view('admin.search');
    });

    Route::get('/cms/register-ormas', function () {
        return view('admin.RegisterOrmas');
    });
    Route::prefix('v1/document-ormas')->controller(DocumentOrmasController::class)->group(function () {
        Route::get('/', 'getAllData');
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
});
