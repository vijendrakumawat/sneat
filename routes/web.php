<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LocationController;

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
// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/', [AuthenticatedSessionController::class, 'create'])
//                 ->name('login');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';
Route::middleware('auth','verified')->group(function () {
Route::get('index',                             [MovieController::class, 'index']);

Route::post('/import',                      [MovieController::class, 'import']);
Route::post('/import-insert-update',        [MovieController::class, 'importInsertUpdate']);

Route::get('/export',                       [MovieController::class, 'export']);
Route::get('/export-custom-data',           [MovieController::class, 'exportCustomData']);
Route::get('/export-query-data',            [MovieController::class, 'exportQueryData']);


Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
Route::get('/get-states/{country_id}', [LocationController::class, 'getStates']);
Route::get('/get-cities/{state_id}', [LocationController::class, 'getCities']);

});