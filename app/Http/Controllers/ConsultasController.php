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
        $consultas_report_ingresos['consultas_report_ingreso'] = consultas::paginate(5); //variable para almacenar la informacion de la base y se la pase al index;
        return view('consultas.index', $consultas_report_ingresos);
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
        $datos_ingresos = DB::select('SELECT
                            empleados.id AS id_empleado,
                            empleados.nombre AS nombre_empleado,
                            empleados.apellido_paterno AS apellido_paterno,
                            empleados.apellido_materno AS apellido_materno,
                            conceptos.descripcion_conceptos AS descripcion_conceptos,
                            ingreso_empleados.valor_ingreso AS valor_de_ingreso
                        FROM
                            ingreso_empleados
                        INNER JOIN conceptos ON ingreso_empleados.conceptos_id = conceptos.id_conceptos
                        INNER JOIN empleados ON ingreso_empleados.empleado_id = empleados.id 
                        WHERE ingreso_empleados.empleado_id = ?', [$id]);

        return view('consultas.show', ['datos_ingresos' => $datos_ingresos]);

        //         $datos_egresos = DB::select('SELECT
        //         empleados.id AS id_empleado,
        //         empleados.nombre AS nombre_empleado,
        //         empleados.apellido_paterno AS apellido_paterno,
        //         empleados.apellido_materno AS apellido_materno,
        //         conceptos.descripcion_conceptos AS descripcion_conceptos,
        //         egreso_empleados.valor_egreso AS valor_de_egreso
        //     FROM
        //         egreso_empleados
        //     INNER JOIN conceptos ON egreso_empleados.conceptos_id = conceptos.id_conceptos
        //     INNER JOIN empleados ON egreso_empleados.empleado_id = empleados.id 
        //     WHERE egreso_empleados.empleado_id = ?', [$id]);

        // return view('consultas.show', ['datos_egresos' => $datos_egresos]);
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
