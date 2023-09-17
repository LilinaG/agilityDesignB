<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;


Route::resource('/admin/projects', ProjectController::class);//hacemos vinculación a todas las rutas del crud
Route::resource('/admin/categories', CategoryController::class);

Route::post('/create', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'loginUser']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
return $request->user();
});

