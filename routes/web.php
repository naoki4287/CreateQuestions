<?php

use App\Http\Controllers\HomeController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/create', [HomeController::class, 'create'])->name('create');
Route::post('/insert', [HomeController::class, 'insert'])->name('insert');
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::post('/update', [HomeController::class, 'update'])->name('update');
Route::post('/delete', [HomeController::class, 'delete'])->name('delete');
Route::get('/questions/{id}', [HomeController::class, 'questions'])->name('questions');



require __DIR__.'/auth.php';
