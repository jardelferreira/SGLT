<?php

use App\Http\Livewire\LoteLivewire;
use App\Http\Livewire\ProjectLivewire;
use App\Http\Livewire\TrechoLivewire;
use App\Http\Livewire\TypeLivewire;
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
Route::get('home', function () {
    return view('welcome');
});
Route::prefix('dashboard')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/',function(){return view('dashboard');})->name('dashboard');

    Route::prefix('config')->group(function (){
        Route::get('types', TypeLivewire::class)->name('dashboard.config.types');
    });
    Route::prefix('projetos')->group(function (){
        Route::get('/',ProjectLivewire::class)->name('dashboard.projects');
        Route::get('/{projeto}/lotes',LoteLivewire::class)->name('dashboard.projects.lotes');
        Route::get('lotes/{lote}/trechos',TrechoLivewire::class)->name('dashboard.lotes.trechos');
    });
    }
);