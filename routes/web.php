<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth') -> prefix('boards') -> group(function (){
    Route::get('/', [BoardController::class, 'index'])->name('boards.index');
    Route::get('create', [BoardController::class, 'create']) -> name('boards.create');
    Route::post('/', [BoardController::class, 'store']) -> name('boards.store');
    Route::get('{board}', [BoardController::class, 'show']) -> name('boards.show');
    Route::get('{board}/edit', [BoardController::class, 'edit']) -> name('boards.edit');
    Route::put('{board}', [BoardController::class, 'update']) -> name('boards.update');
    Route::delete('{board}', [BoardController::class, 'destroy']) -> name('boards.delete');
});
require __DIR__.'/auth.php';