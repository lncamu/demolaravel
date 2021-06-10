<?php

namespace App\Http\Controllers;

use App\Models\consultas;
use App\Models\empleado;
use App\Models\egreso_empleados;
use App\Models\ingreso_empleado;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $datos_empleado = empleado::findOrFail($id);  //busca la info con el id que le pasamos
        $datos_ingreso['ingreso_empleados'] = ingreso_empleado::paginate(5); //variable para almacenar la informacion de la base y se la pase al archivo;
        $datos_egreso['egreso_empleados'] = egreso_empleados::paginate(5); //variable para almacenar la informacion de la base y se la pase al archivo;

        // return view('empleados.show', $datos_egreso,$datos_ingreso,$datos_empleado);
        return view('consultas.show', compact('datos_empleado')); //compac para pasar todos los datos      
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function edit(consultas $consultas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, consultas $consultas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function destroy(consultas $consultas)
    {
        //
    }
}
