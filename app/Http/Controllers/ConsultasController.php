<?php

namespace App\Http\Controllers;

use App\Models\consultas;
use App\Models\empleado;
use App\Models\egreso_empleados;
use App\Models\ingreso_empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $consultas_report_ingresos['consultas_report_ingreso'] = consultas::paginate(5); //variable para almacenar la informacion de la base y se la pase al index;
        // return view('consultas.index', $consultas_report_ingresos);
        $datos_vista = consultas::select("*")
            ->get();
        return view('consultas.index', ['datos_vista' => $datos_vista]);
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
        $datos_ingresos = DB::select('SELECT id, nombre, apellido_paterno,
                                    ( select SUM(valor_ingreso) from ingreso_empleados
                                            where empleado_id = empleados.id ) AS valor_de_ingreso,
                                    ( select SUM(valor_egreso) from egreso_empleados
                                            where empleado_id = empleados.id ) AS valor_de_egreso,
                                    ( select SUM(valor_sueldo) from sueldos
                                            where empleado_id = empleados.id ) AS valor_de_sueldo
                                    from empleados
                        WHERE empleados.id = ?', [$id]);

        return view('consultas.show', ['datos_ingresos' => $datos_ingresos]);
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Era para utilizar la  vista migrada
        $empleado         = empleado::whereId($id)->firstOrFail();
        $ingreso_empleado = ingreso_empleado::all();
        $selecIngreso     = $empleado->ingreso_empleados()->lists('empleado_id')->toArray();
        return view('consultas.show', compact($empleado, $ingreso_empleado, $selecIngreso));
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
