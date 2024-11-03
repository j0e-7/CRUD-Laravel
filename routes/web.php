<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudiantesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/inicio', function () {
    return view('welcome');
});
//aqui se ponen las rutas
Route::get('estudiantes',[EstudiantesController::class,'index']);
Route::get('estudiantes/create',[EstudiantesController::class,'create']);
Route::post('estudiantes',[EstudiantesController::class,'store']);
Route::get('estudiantes/{cedula}', [estudiantesController::class,'show']);
Route::delete('estudiantes/{cedula}',[EstudiantesController::class,'destroy']);
Route::get('estudiantes/{cedula}/edit',[EstudiantesController::class,'edit']);
Route::put('estudiantes/{cedula}',[EstudiantesController::class,'update']);




