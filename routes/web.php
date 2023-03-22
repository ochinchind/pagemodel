<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PageController;
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

Route::get('', function() {
    return view('main');
} )->name('main');

Route::get('/listpages', [PageController::class, 'list'])->name('listpages');

Route::get('/listpages/{id}', [PageController::class, 'detail']);

Route::post('/change', [PageController::class, 'change'])->name('change');
Route::post('/remove', [PageController::class, 'remove'])->name('remove');

Route::get('/createpage', function() {
    return view('home');
})->name('home');

Route::post('/createpage', [PageController::class, 'createpage'])->name('createpage');


Route::get('{slug}', [PageController::class, 'view'])->name('anypage');