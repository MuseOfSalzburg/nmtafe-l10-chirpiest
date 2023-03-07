<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChirpsController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

# VERB       URI                     Action      Route Name
# GET        /chirps                 index       chirps.index
# POST       /chirps                 store       chirps.store
# GET        /chirps/{chirp}/edit    edit        chirps.edit
# PUT/PATCH  /chirps/{chirp}         update      chirps.update
Route::resource('chirps', ChirpsController::class)
    ->only(['index', 'store', 'edit', 'update'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
