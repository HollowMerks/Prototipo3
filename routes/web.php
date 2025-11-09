<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReporteUsuarioController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/reporte/usuarios/pdf', [ReporteUsuarioController::class, 'generarPDF'])->name('reporte.usuarios.pdf');
Route::get('/reporte/usuarios/excel', [ReporteUsuarioController::class, 'generarExcel'])->name('reporte.usuarios.excel');

