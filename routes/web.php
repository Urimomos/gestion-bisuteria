<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;           
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\UserController;


// 1. Redirección inicial
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// 2. RUTAS PROTEGIDAS (Solo usuarios logueados)
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::post('/usuarios/guardar', [UserController::class, 'store'])->name('usuarios.store');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
    
    // Dashboard principal
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Módulo de Inventario
    Route::prefix('inventario')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('inventory.index');
        
        Route::get('/nuevo', function () {
            return view('inventory.create');
        })->name('inventory.create');

        Route::get('/{id}/editar', [ProductController::class, 'edit'])->name('productos.edit');
    });

    // Módulo de Reportes (Historial de la tabla 'edita')
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');

    // Módulo de Ventas y Clientes
    Route::prefix('ventas')->group(function () {
        // Paso 1: Buscar o Registrar Cliente
        Route::get('/buscar-cliente', [VentaController::class, 'seleccionarCliente'])->name('ventas.cliente');
        Route::post('/clientes/rapido', [VentaController::class, 'registrarClienteRapido'])->name('clientes.rapido');

        // Paso 2: Formulario de Venta (recibe idcliente)
        Route::get('/nueva/{idcliente}', [VentaController::class, 'create'])->name('ventas.create');
        Route::post('/guardar', [VentaController::class, 'store'])->name('ventas.store');
    });

    // Acciones de Base de Datos para Productos
    Route::post('/productos/guardar', [ProductController::class, 'store'])->name('productos.store');
    Route::put('/productos/{idproducto}', [ProductController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{idproducto}', [ProductController::class, 'destroy'])->name('productos.destroy');

});

// Configuración de la cuenta y perfil
require __DIR__.'/settings.php';