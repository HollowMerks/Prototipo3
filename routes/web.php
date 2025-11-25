<?php

use App\Http\Controllers\ReporteUsuarioController;
use App\Http\Controllers\CarrerasReporteController;
use App\Http\Controllers\UniversidadesReporteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reporte/usuarios/pdf', [ReporteUsuarioController::class, 'generarPDF'])->name('reporte.usuarios.pdf');
Route::get('/reporte/usuarios/excel', [ReporteUsuarioController::class, 'generarExcel'])->name('reporte.usuarios.excel');
Route::get('/reporte/usuarios/imagen', [ReporteUsuarioController::class, 'generarImagen'])->name('reporte.usuarios.imagen');

// Rutas para reportes de Carreras
Route::get('/reporte/carreras/pdf', [CarrerasReporteController::class, 'generarPDF'])->name('reporte.carreras.pdf');
Route::get('/reporte/carreras/excel', [CarrerasReporteController::class, 'generarExcel'])->name('reporte.carreras.excel');
Route::get('/reporte/carreras/pdf/{universidad}', [CarrerasReporteController::class, 'generarPDFPorUniversidad'])->name('reporte.carreras.pdf.universidad');
Route::get('/reporte/carreras/imagen', [CarrerasReporteController::class, 'generarImagen'])->name('reporte.carreras.imagen');

// Rutas para reportes de Universidades
Route::get('/reporte/universidades/pdf', [UniversidadesReporteController::class, 'generarPDF'])->name('reporte.universidades.pdf');
Route::get('/reporte/universidades/excel', [UniversidadesReporteController::class, 'generarExcel'])->name('reporte.universidades.excel');
Route::get('/reporte/universidades/pdf-detallado', [UniversidadesReporteController::class, 'generarPDFDetallado'])->name('reporte.universidades.pdf.detallado');
Route::get('/reporte/universidades/imagen', [UniversidadesReporteController::class, 'generarImagen'])->name('reporte.universidades.imagen');

// Rutas para reportes de Notificaciones Administrativas
use App\Http\Controllers\AdminNotificationsReporteController;

Route::get('/reporte/notificaciones/pdf', [AdminNotificationsReporteController::class, 'generarPDF'])->name('reporte.notificaciones.pdf');
Route::get('/reporte/notificaciones/excel', [AdminNotificationsReporteController::class, 'generarExcel'])->name('reporte.notificaciones.excel');
