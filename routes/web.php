<?php

use App\Http\Controllers\ClienteController;
use App\Models\Country;
use App\Models\Department;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('cliente.create');
});

Route::get('/cliente/create', function () {
    return view('cliente.create');
})->name('cliente.create');

Route::resource('cliente',ClienteController::class);
Route::get('/clienteExport', [ClienteController::class,'exportClientes'])->name('exportClientes');

Route::post('cliente/clienteDepartament', [ClienteController::class, 'Consultardepartamentos'])->name('Consultardepartamentos');
