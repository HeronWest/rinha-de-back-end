<?php

use App\Http\Controllers\PessoasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::get('pessoas', 'PessoasController@index');
Route::get("teste", function () {
    return response()->json([
        "message" => "Hello World",
    ], 200);
});
Route::get("pessoas", PessoasController::class . "@index");
Route::post("pessoas", PessoasController::class . "@store");
Route::get("pessoas/{id}", PessoasController::class . "@show");
Route::put("pessoas/{id}", PessoasController::class . "@update");
Route::delete("pessoas/{id}", PessoasController::class . "@destroy");