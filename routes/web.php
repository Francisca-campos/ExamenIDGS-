<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Datos;



Route::name('consulta02')->get('/consulta02',[Datos::class, 'consulta02']);
Route::name('datos2a')->get('/datos2a',[Datos::class, 'datos2a']);
Route::name('datos2b')->get('/datos2b',[Datos::class, 'datos2b']);
Route::name('datos2c')->get('/datos2c',[Datos::class, 'datos2c']);