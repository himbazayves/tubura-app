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
//Route::resource('seeds', App\Http\Controllers\SeedController::class);


//end amnin routes


//user routes


Route::get('/user/complite_profile', [App\Http\Controllers\user\CompliteProfileController::class, 'index'] )->name('complite_profile.index');
Route::post('/user/complite', [App\Http\Controllers\user\CompliteProfileController::class, 'complite'] )->name('complite_profile.complite');
Route::resource('farmers', App\Http\Controllers\user\FarmerController::class);
Route::resource('seed-requests', App\Http\Controllers\SeedRequestController::class);
Route::resource('fertilizer-requests', App\Http\Controllers\FertilizerRequestController::class);



//end user routes






