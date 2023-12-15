<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;


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

//Portada
Route::get('/',[PagesController::class, 'fnIndex']) -> name('xIndex');


//Create
Route::post('/', [PagesController::class, 'fnRegistrar']) ->name('Estudiante.xRegistrar');
Route::post('/1', [PagesController::class, 'fnRegistrarSeg']) ->name('Seguimiento.xRegistrarSeg');


//read
Route::get('/lista',[PagesController::class, 'fnlista']) -> name('xLista');
Route::get('/detalle/{id}', [PagesController::class, 'fnEstDetalle'])->name('Estudiante.xDetalle');

Route::get('/seguimiento',[PagesController::class, 'fnSeguimiento']) -> name('xSeguimiento');
Route::get('/detalleseg/{id}', [PagesController::class, 'fnEstSeguimiento'])->name('Seguimiento.xDetalleSeguimiento');

//update
Route::get('/actualizar/{id}',[PagesController::class, 'fnEstActualizar']) -> name('Estudiante.xActualizar');
Route::put('/actualizar/{id}',[PagesController::class, 'fnUpdate']) -> name('Estudiante.xUpdate');

Route::get('/actualizarseg/{id}',[PagesController::class, 'fnEstActualizarSeg']) -> name('Seguimiento.xActualizarSeg');
Route::put('/actualizarseg/{id}',[PagesController::class, 'fnUpdateSeg']) -> name('Seguimiento.xUpdateSeg');

//delete
Route::delete('/eliminar/{id}',[PagesController::class, 'fnEliminar']) -> name('Estudiante.xEliminar');

Route::delete('/eliminarseg/{id}',[PagesController::class, 'fnEliminarSeg']) -> name('Seguimiento.xEliminarSeg');



Route::get('/galeria/{numero?}',[PagesController::class, 'fnGaleria']) -> where('numero', '[0-9]+') -> name('xGaleria');




/*
Route::get('/', function () {
    return view('welcome');
}) -> name('xInicio');

Route::get('/saludo', function () {
    return 'Hola mundo soy Gustavo';
});

Route::get('/galeria/{numero?}', function ($numero=null) {
    return 'Este es el codigo de la foto: '.$numero;
}) -> where('numero', '[0-9]+');

Route::view('/galeria', 'pagGaleria', ['valor' => 15]) -> name('xGaleria');

Route::get('/lista', function () {
    return view('pagLista');
}) -> name('xLista');
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
