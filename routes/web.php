<?php

use App\Http\Controllers\DatosJsonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DependenciasController;
use App\Exports\jsonExport;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/dependence', DependenciasController::class)->names('dependence');
    
    Route::get('/dependence',[DependenciasController::class,'index'])->name('dependence.index');
    Route::post('/dependence ',[DependenciasController::class,'detail'])->name('dependence.detalles');

    Route::get('/actualizar',[DatosJsonController::class,'index'])->name('actualizar.index');

    Route::get('/excel',[DatosJsonController::class,'export'])->name('excel');

});
