<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ReporteUsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reporte/usuarios/pdf', [ReporteUsuarioController::class, 'generarPDF'])->name('reporte.usuarios.pdf');
Route::get('/reporte/usuarios/excel', [ReporteUsuarioController::class, 'generarExcel'])->name('reporte.usuarios.excel');

// Rutas para autenticación con Google
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
