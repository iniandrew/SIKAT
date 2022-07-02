<?php

use App\Http\Controllers\App\AduanController;
use App\Http\Controllers\App\AgendaController;
use App\Http\Controllers\App\DanaController;
use App\Http\Controllers\App\WargaController;
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

// Default Route
Route::redirect('/', 'login');

Route::get('/dashboard', function () {
    return view('app.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('app/')->middleware('auth')->name('app.')->group(function () {
    Route::get('dashboard', fn () => view('app/dashboard'))->name('dashboard');
    Route::resource('agenda', AgendaController::class);
    Route::resource('aduan', AduanController::class);
    Route::resource('dana', DanaController::class);
    Route::resource('warga', WargaController::class);
});

require __DIR__.'/auth.php';
