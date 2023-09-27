<?php

use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\TarefaController;
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

/**
 * php artisan route:list
 *
 * GET|HEAD  | tarefa               | tarefa.index   | App\Http\Controllers\TarefaController@index   | web        |
 *       | POST      | tarefa               | tarefa.store   | App\Http\Controllers\TarefaController@store   | web        |
 *       | GET|HEAD  | tarefa/create        | tarefa.create  | App\Http\Controllers\TarefaController@create  | web        |
 *|        | GET|HEAD  | tarefa/{tarefa}      | tarefa.show    | App\Http\Controllers\TarefaController@show    | web        |
 * |        | PUT|PATCH | tarefa/{tarefa}      | tarefa.update  | App\Http\Controllers\TarefaController@update  | web        |
 * |        | DELETE    | tarefa/{tarefa}      | tarefa.destroy | App\Http\Controllers\TarefaController@destroy | web        |
 * |        | GET|HEAD  | tarefa/{tarefa}/edit | tarefa.edit    | App\Http\Controllers\TarefaController@edit
 */

//Route::resource('tarefa', TarefaController::class);

Route::get('/', [TarefaController::class, 'index'])->name('tarefa.index');
Route::post('/', [TarefaController::class, 'store'])->name('tarefa.store');
Route::get('/create', [TarefaController::class, 'create'])->name('tarefa.create');
Route::get('/{tarefa}', [TarefaController::class, 'show'])->name('tarefa.show');
Route::put('/{tarefa}', [TarefaController::class, 'update'])->name('tarefa.update');
Route::delete('/{tarefa}', [TarefaController::class, 'destroy'])->name('tarefa.destroy');
Route::get('/{tarefa}/edit', [TarefaController::class, 'edit'])->name('tarefa.edit');

Route::post('/set-locale', [IdiomaController::class, 'setLocale'])->name('set-locale');
