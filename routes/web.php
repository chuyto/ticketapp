<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReporteMantenimientoController;

use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return redirect()->route('login');
});


// 🔹 Deshabilitar el formulario de registro
Route::get('/register', function () {
    abort(403, 'El registro está deshabilitado.');
})->name('register');

// Grupo de rutas protegidas con autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Redirigir a /reportes en lugar de dashboard
    Route::get('/dashboard', function () {
        return redirect()->route('reportes.index');
    })->name('dashboard');

    // Rutas del CRUD de reportes
    Route::resource('reportes', ReporteMantenimientoController::class);
Route::post('/reportes', [ReporteMantenimientoController::class, 'store'])->name('reportes.store');
Route::get('/reportes/{reporte}/edit', [ReporteMantenimientoController::class, 'edit'])->name('reportes.edit');
Route::get('/reportes/{reporte}/pdf', [ReporteMantenimientoController::class, 'generarPDF'])->name('reportes.pdf');

    Route::resource('clientes', ClienteController::class);

    Route::get('/clientes/{id}', [ClienteController::class, 'show'])->name('clientes.show');

});
