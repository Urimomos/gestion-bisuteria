<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;           
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaReporteController;

// 1. Redirección inicial
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// 2. RUTAS PROTEGIDAS
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::post('/usuarios/guardar', [UserController::class, 'store'])->name('usuarios.store');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Módulo de Inventario
    Route::prefix('inventario')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('inventory.index');
        Route::get('/nuevo', function () {
            return view('inventory.create');
        })->name('inventory.create');
        Route::get('/{id}/editar', [ProductController::class, 'edit'])->name('productos.edit');
    });

    // Módulo de Reportes (Vista general)
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');

    // Módulo de Historial (Solo Maestro)
    Route::prefix('historial')->group(function () {
        Route::get('/', [HistorialController::class, 'index'])->name('historial.index');
        Route::delete('/{id}', [HistorialController::class, 'destruir'])->name('historial.destruir');
        Route::post('/vaciar', [HistorialController::class, 'vaciar'])->name('historial.vaciar');
    });

    // Módulo de Ventas y Clientes
    // --- Módulo de Ventas (Solo el proceso de cobrar) ---
    Route::prefix('ventas')->group(function () {
        Route::get('/buscar', [VentaController::class, 'seleccionarCliente'])->name('ventas.buscar');
        Route::get('/nueva/{idcliente}', [VentaController::class, 'create'])->name('ventas.create');
        Route::post('/guardar', [VentaController::class, 'store'])->name('ventas.store');
        Route::post('/agregar', [VentaController::class, 'agregarAlCarrito'])->name('ventas.agregar');
        Route::get('/quitar/{indice}', [VentaController::class, 'quitarDelCarrito'])->name('ventas.quitar');
    });
    
    // --- NUEVO: Módulo Independiente de Clientes (CRUD completo) ---
    Route::prefix('clientes')->group(function () {
        Route::get('/', [ClienteController::class, 'index'])->name('clientes.index'); // Lista de todos
        Route::get('/nuevo', [ClienteController::class, 'create'])->name('clientes.create'); // Formulario
        Route::post('/guardar', [ClienteController::class, 'store'])->name('clientes.store'); // Guardar
        Route::get('/{id}/editar', [ClienteController::class, 'edit'])->name('clientes.edit'); // Vista editar
        Route::put('/{id}', [ClienteController::class, 'update'])->name('clientes.update'); // Actualizar
        Route::delete('/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy'); // Borrar
    });

    // Reportes de Dinero y Ventas (Solo Maestro)
    Route::get('/reportes-ventas', [VentaReporteController::class, 'index'])
        ->name('reportes.ventas')
        ->middleware('auth');
    Route::get('/ticket/{fecha}/{idcliente}/{momento}', [VentaReporteController::class, 'generarTicket'])
    ->name('ticket.generar');
    // Acciones de Productos
    Route::post('/productos/guardar', [ProductController::class, 'store'])->name('productos.store');
    Route::put('/productos/{idproducto}', [ProductController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{idproducto}', [ProductController::class, 'destroy'])->name('productos.destroy');
});

require __DIR__.'/settings.php';