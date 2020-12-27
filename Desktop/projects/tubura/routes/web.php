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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    
if(Auth::user()->is_admin){


    return view('admin.home');
}

else 

{

    echo "normal user";
}
    

    
})->name('dashboard');



///farmers routes

//Route::get('/farmers', [App\Http\Controllers\admin\farmer\FarmerController::class, 'index'] )->name('farmers.index');

///Route::get('/farmers/create', [App\Http\Controllers\admin\farmer\FarmerController::class, 'create']  )->name('farmers.create');

//Route::post('/farmers/store', [App\Http\Controllers\admin\farmer\FarmerController::class, 'store'] )->name('farmers.store');

//Route::get('/farmers/edit/{id}', [App\Http\Controllers\admin\farmer\FarmerController::class, 'edit'] )->name('farmers.edit');

////Route::post('/farmers/update/{id}', [App\Http\Controllers\admin\farmer\FarmerController::class, 'update'] )->name('farmers.update');
////Route::post('/farmers/show/{id}', [App\Http\Controllers\admin\farmer\FarmerController::class, 'show'] )->name('farmers.show');
//Route::post('/farmers/destroy/{id}', [App\Http\Controllers\admin\farmer\FarmerController::class, 'destroy'] )->name('farmers.destroy');

Route::resource('farmers', App\Http\Controllers\admin\farmer\FarmerController::class);
Route::resource('users', App\Http\Controllers\admin\UserController::class);

Route::resource('years', App\Http\Controllers\admin\YearController::class);
Route::resource('season-types', App\Http\Controllers\admin\SeasonTypeController::class);
Route::resource('seasons', App\Http\Controllers\admin\SeasonController::class);
Route::resource('seeds', App\Http\Controllers\admin\SeedController::class);
Route::resource('fertilizers', App\Http\Controllers\admin\FertilizerController::class);
Route::resource('stocks', App\Http\Controllers\admin\StockController::class);
//Route::resource('seeds', App\Http\Controllers\SeedController::class);







