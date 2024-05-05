<?php

use App\Http\Controllers\AvailableunitsController;
use App\Http\Controllers\BacktypeController;
use App\Http\Controllers\DrivertechnologyController;
use App\Http\Controllers\FittypeController;
use App\Http\Controllers\HeadphoneController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RentedunitController;
use App\Http\Controllers\RentextensionController;
use App\Http\Controllers\RentingController;
use App\Http\Controllers\RentstatusController;
use App\Http\Controllers\SubrentController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::name('users.')->prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index'])
            ->name('index')
            ->middleware(['permission:users.index']);
    });

     $tableNames = [
        ['fittypes', FittypeController::class],
        ['backtypes', BacktypeController::class],
        ['drivertechnologies', DrivertechnologyController::class],
        ['headphones', HeadphoneController::class],
        ['manufacturers', ManufacturerController::class],
        ['units', UnitController::class],
        ['rents', RentController::class],
        ['rentedunits', RentedunitController::class],
        ['rentextensions', RentextensionController::class],
        ['rentstatuses', RentstatusController::class],
    ];

    foreach($tableNames as $tableName) {
        Route::resource($tableName[0], $tableName[1])->only([
            'index', 'create', 'edit'
        ]);
    }

    Route::resource('subrents', SubrentController::class)->only([
        'index'
    ]);

    Route::resource('availableunits', AvailableunitsController::class)->only([
        'index', 'rent'
    ]);

    /*
    Route::get('/availableunits.index', 'AvailableunitsController@index')->middleware('view-availableunits');
    Route::get('/availableunits.index', 'AvailableunitsController@index')->middleware('guest');
    Route::get('/availableunits.index', 'AvailableunitsController@index')->middleware(['guest', 'view-availableunits']);

    Route::get('availableunits.index', 'AvailableunitsController@index')->middleware('view-availableunits');
    Route::get('availableunits.index', 'AvailableunitsController@index')->middleware('guest');
    //Route::get('availableunits.index', 'AvailableunitsController@index')->middleware(['guest', 'view-availableunits']);
    */

    Route::get('async/manufacturers', [ManufacturerController::class, 'async'])->name('async.manufacturers');
    Route::get('async/drivertechnologies', [DrivertechnologyController::class, 'async'])->name('async.drivertechnologies');
    Route::get('async/fittypes', [FittypeController::class, 'async'])->name('async.fittypes');
    Route::get('async/backtypes', [BacktypeController::class, 'async'])->name('async.backtypes');
    Route::get('async/rents', [RentController::class, 'async'])->name('async.rents');
    Route::get('async/rentstatuses', [RentstatusController::class, 'async'])->name('async.rentstatuses');

    Route::get('async/users', [UserController::class, 'async'])->name('async.users');

    Route::get('renting', [RentingController::class, 'index'])->name('renting.index');
});

