<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::get('guest', [AuthenticatedSessionController::class,'guestLogin'])->name('login.guest');
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/create', [HomeController::class, 'create'])->middleware(['auth'])->name('create');
Route::post('/insert', [HomeController::class, 'insert'])->name('insert');
Route::get('/add/{id}', [HomeController::class, 'add'])->name('add');
Route::post('/make', [HomeController::class, 'make'])->name('make');
Route::get('/questionlists/{id}', [HomeController::class, 'questionlists'])->name('questionlists');
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::get('/titleEdit/{id}', [HomeController::class, 'titleEdit'])->name('titleEdit');
Route::post('/update', [HomeController::class, 'update'])->name('update');
Route::post('/titleUpdate', [HomeController::class, 'titleUpdate'])->name('titleUpdate');
Route::post('/delete', [HomeController::class, 'delete'])->name('delete');
Route::get('/questions/{id}', [HomeController::class, 'questions'])->name('questions');



require __DIR__.'/auth.php';
