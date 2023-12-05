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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/employer', [App\Http\Controllers\Employer\Employer::class, 'index']);
Route::get('/employer/edit/{id}', [App\Http\Controllers\Employer\Editemployer::class, 'index']);
Route::get('/employer/edit', [App\Http\Controllers\Employer\Editemployer::class, 'index']);

Route::get('/employer/delete/{id}', [App\Http\Controllers\Employer\Employer::class, 'remove']);
Route::post('/employer/ajout', [App\Http\Controllers\Employer\Employer::class, 'ajout']);
Route::post('/employer/modifier', [App\Http\Controllers\Employer\Employer::class, 'modifier']);
Route::post('/employer/find', [App\Http\Controllers\Employer\Employer::class, 'recherche']);

// route pointage

Route::get('/pointage', [App\Http\Controllers\Pointage\Pointage::class, 'index']);
Route::post('/pointage/ajout', [App\Http\Controllers\Pointage\Pointage::class, 'ajout']);
Route::post('/pointage/find', [App\Http\Controllers\Pointage\Pointage::class, 'recherche']);

Route::get('/conger', [App\Http\Controllers\conger\Conger::class, 'index']);
Route::post('/conger/ajout', [App\Http\Controllers\conger\Conger::class, 'ajout']);
Route::get('/conger/delete/{id}', [App\Http\Controllers\conger\Conger::class, 'remove']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
