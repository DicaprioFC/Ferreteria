<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\ProveedorController;
use App\Http\Controllers\Admin\EntradaController;
use App\Http\Controllers\Admin\SalidaController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ReporteController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // Admin routes
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('productos', ProductoController::class);
        Route::resource('proveedores', ProveedorController::class);
        Route::resource('entradas', EntradaController::class)->only(['index', 'create', 'store']);
        Route::resource('salidas', SalidaController::class)->only(['index', 'create', 'store']);
    });

    // Vendedor routes
    Route::get('/dashboard', [App\Http\Controllers\Vendedor\VendedorProductoController::class, 'index'])->name('dashboard');
    Route::get('/vendedor/filtro', [App\Http\Controllers\Vendedor\VendedorProductoController::class, 'buscar'])->name('vendedor.filtro');

    // Carrito routes (añadidas aquí dentro del middleware auth)
    Route::get('/carrito', [CarritoController::class, 'verCarrito'])->name('carrito.ver');
    Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmarVenta'])->name('carrito.confirmar');

    // Ventas routes
    Route::get('/ventas/exito/{id}', [VentaController::class, 'exito'])->name('ventas.exito');
    Route::get('/ventas/pdf/{id}', [VentaController::class, 'generarPDF'])->name('ventas.pdf');

    // Reportes routes
    Route::get('/reportes/ventas', [ReporteController::class, 'ventas'])->name('reportes.ventas');
    Route::get('reportes/inventario', [ReporteController::class, 'inventario'])->name('reportes.inventario');
    Route::get('/reportes/mas-vendidos', [ReporteController::class, 'masVendidos'])->name('reportes.masvendidos');
    Route::get('/reportes/stock-bajo', [ReporteController::class, 'stockBajo'])->name('reportes.stockbajo');
    Route::get('reportes/inventario/pdf', [ReporteController::class, 'exportarInventarioPDF'])->name('reportes.inventario.pdf');
    Route::get('reportes/ventas/pdf', [ReporteController::class, 'exportarVentasPDF'])->name('reportes.ventas.pdf');

});

// Social login routes (no auth middleware)
Route::get('/login/google', [SocialController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [SocialController::class, 'handleGoogleCallback']);

require __DIR__ . '/auth.php';
