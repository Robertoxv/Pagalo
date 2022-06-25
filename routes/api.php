<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\articuloProveedorcontroller;
use App\Http\Controllers\proveedoresController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/crear/articulo',[articuloProveedorcontroller::class, 'creararticulo']);

Route::post('/eliminar/articulo',[articuloProveedorcontroller::class, 'eliminararticulo']);

Route::post('/editar/articulo',[articuloProveedorcontroller::class, 'editararticulo']);

Route::post('/crear/proveedores',[proveedoresController::class, 'crearproveedores']);

Route::post('/eliminar/proveedores',[proveedoresController::class, 'eliminarproveedores']);

Route::post('/editar/proveedores',[proveedoresController::class, 'editarproveedores']);

