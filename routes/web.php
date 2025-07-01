<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
});


use App\Http\Controllers\AdminController;

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});


use App\Http\Controllers\SocialController;

Route::get('/login/google', [SocialController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [SocialController::class, 'handleGoogleCallback']);



use App\Http\Controllers\Admin\ProductoController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('productos', ProductoController::class);
});


use App\Http\Controllers\Admin\ProveedorController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('proveedores', ProveedorController::class);
});

use App\Http\Controllers\Admin\EntradaController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('entradas', EntradaController::class)->only(['index', 'create', 'store']);
});


use App\Http\Controllers\Admin\SalidaController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('salidas', SalidaController::class)->only(['index', 'create', 'store']);
});








Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Vendedor\VendedorProductoController::class, 'index'])->name('dashboard');

    Route::get('/vendedor/filtro', [App\Http\Controllers\Vendedor\VendedorProductoController::class, 'buscar'])->name('vendedor.filtro');
});


use App\Http\Controllers\CarritoController;

Route::get('/carrito', [CarritoController::class, 'verCarrito'])->name('carrito.ver');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::post('/carrito/confirmar', [CarritoController::class, 'confirmarVenta'])
    ->middleware('auth')
    ->name('carrito.confirmar');
Route::get('/carrito', [CarritoController::class, 'verCarrito'])->name('carrito.ver');


use App\Http\Controllers\VentaController;

Route::get('/ventas/exito/{id}', [VentaController::class, 'exito'])->name('ventas.exito');
Route::get('/ventas/pdf/{id}', [VentaController::class, 'generarPDF'])->name('ventas.pdf');


use App\Http\Controllers\ReporteController;

Route::get('/reportes/ventas', [ReporteController::class, 'ventas'])->name('reportes.ventas');
Route::get('reportes/inventario', [ReporteController::class, 'inventario'])->name('reportes.inventario');
Route::get('/reportes/mas-vendidos', [ReporteController::class, 'masVendidos'])->name('reportes.masvendidos');
Route::get('/reportes/stock-bajo', [ReporteController::class, 'stockBajo'])->name('reportes.stockbajo');

Route::get('reportes/inventario/pdf', [ReporteController::class, 'exportarInventarioPDF'])
    ->name('reportes.inventario.pdf');

Route::get('reportes/ventas/pdf', [ReporteController::class, 'exportarVentasPDF'])->name('reportes.ventas.pdf');







require __DIR__ . '/auth.php';
