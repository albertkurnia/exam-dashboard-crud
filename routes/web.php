<?php

use App\Http\Controllers\QuestionsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/questions', [QuestionsController::class, 'index']);
Route::post('/questions', [QuestionsController::class, 'store']);
Route::get('/questions/create', [QuestionsController::class, 'create']);
Route::get('/questions/{question}/edit', [QuestionsController::class, 'edit']);
Route::put('/questions/{question}', [QuestionsController::class, 'update']);
Route::delete('/questions/{question}', [QuestionsController::class, 'destroy']);
