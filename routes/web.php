<?php

use App\Http\Controllers\ConceptosController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\EgresoEmpleadosController;
use App\Http\Controllers\IngresoEmpleadoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\SueldoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Route as RoutingRoute;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

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
    return view('auth.login');
});

// Route::get('/empleados', function () {
//     return view('empleados.index');
// });

// crear una ruta para acceder a create o a la creación
// Route::get('/empleados/create',[EmpleadoController::class,'create']);

//crear una ruta para llamar al modelo empleado o a todas las url y trabajar con todos los metodos
Route::resource('empleados', EmpleadoController::class);
Auth::routes();

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});


Route::resource('/conceptos', ConceptosController::class); //acceder a cualquier ruta de ese modelo
Route::resource('/egresos_empleados', EgresoEmpleadosController::class); //acceder a cualquier ruta de ese modelo
Route::resource('/ingresos_empleados', IngresoEmpleadoController::class); //acceder a cualquier ruta de ese modelo
Route::resource('/sueldos', SueldoController::class); //acceder a cualquier ruta de ese modelo
Route::resource('/consultas', ConsultasController::class); //acceder a cualquier ruta de ese modelo

// Route::get('/empleados/mostrar', [EmpleadoController::class, 'mostrar'])->name('mostrar'); //crear una ruta independiente