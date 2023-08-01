<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContentController;
use App\Models\Content;
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
    return view('welcome')->with('content',Content::all());
});

Route::get('/dashboard', function () {
    return view('dashboard')->with('content',Content::all());
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('contents', ContentController::class);
Route::get('Content/index',[ContentController::class, 'index'])->name('Content.index');
Route::get('Content/create',[ContentController::class, 'create'])->name('Content.create');
Route::post('Content/insert',[ContentController::class, 'insert'])->name('contents.store');
Route::post('Content/update/{id}',[ContentController::class, 'update']);
Route::get('Content/destroy/{id}',[ContentController::class, 'destroy']);
Route::get('Content/edit/{id}',[ContentController::class, 'edit']);
