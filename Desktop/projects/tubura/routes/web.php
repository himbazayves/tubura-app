<?php

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified','checkProfile'])->get('/dashboard', function () {

    
if(Auth::user()->is_admin){


    return view('admin.home');
}

else 
{

    return view('user.home');
}
    
//return view('dashboard');
    
})->name('dashboard');



///farmers routes




// Admin routes
Route::resource('users', App\Http\Controllers\admin\UserController::class);

Route::resource('years', App\Http\Controllers\admin\YearController::class);
Route::resource('season-types', App\Http\Controllers\admin\SeasonTypeController::class);
Route::resource('seasons', App\Http\Controllers\admin\SeasonController::class);
Route::resource('seeds', App\Http\Controllers\admin\SeedController::class);
Route::resource('fertilizers', App\Http\Controllers\admin\FertilizerController::class);
Route::resource('stocks', App\Http\Controllers\admin\StockController::class);
Route::resource('seed-stocks', App\Http\Controllers\SeedStockController::class);
Route::resource('fertilizer-stocks', App\Http\Controllers\FertilizerStockController::class);
//Route::resource('seeds', App\Http\Controllers\SeedController::class);
Route::get('/seed-request-reports', [App\Http\Controllers\admin\SeedRequestReportController::class, 'index'] )->name('seed_report.index');
Route::get('/seed-request-reports-query-result', [App\Http\Controllers\admin\SeedRequestReportController::class, 'filter'] )->name('seed_report.filter');

//end amnin routes


//user routes


Route::get('/user/complite_profile', [App\Http\Controllers\user\CompliteProfileController::class, 'index'] )->name('complite_profile.index');
Route::post('/user/complite', [App\Http\Controllers\user\CompliteProfileController::class, 'complite'] )->name('complite_profile.complite');
Route::resource('farmers', App\Http\Controllers\user\FarmerController::class);
//Route::resource('seed-requests', App\Http\Controllers\user\SeedRequestController::class);
//Route::resource('fertilizer-requests', App\Http\Controllers\user\FertilizerRequestController::class);
Route::post('/seed-request-approve/{id}', [App\Http\Controllers\SeedRequestController::class, 'approve'] )->name('seed_requests.approve');
Route::post('/seed-request-receive/{id}', [App\Http\Controllers\SeedRequestController::class, 'receive'] )->name('seed_requests.receive');



//end user routes





Route::resource('seed-requests', App\Http\Controllers\SeedRequestController::class);
Route::resource('fertilizer-requests', App\Http\Controllers\FertilizerRequestController::class);
Route::resource('fertilizer-applications', App\Http\Controllers\FertilizerApplicationController::class);
Route::resource('seed-applications', App\Http\Controllers\SeedApplicationController::class);



