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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [HomeController::class, 'home'])->middleware(['auth'])->name('home');
Route::get('/create', [HomeController::class, 'create'])->name('create');
Route::post('/insert', [HomeController::class, 'insert'])->name('insert');
Route::get('/add/{id}', [HomeController::class, 'add'])->name('add');
Route::post('/make', [HomeController::class, 'make'])->name('make');
Route::get('/questionlists/{id}', [HomeController::class, 'questionlists'])->name('questionlists');
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::post('/update', [HomeController::class, 'update'])->name('update');
Route::post('/delete', [HomeController::class, 'delete'])->name('delete');
Route::get('/questions/{id}', [HomeController::class, 'questions'])->name('questions');
Route::get('/result', [HomeController::class, 'result'])->name('result');



require __DIR__.'/auth.php';
