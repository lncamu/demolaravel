<?php

namespace App\Http\Controllers;

use App\Models\ingreso_empleado;
use App\Models\empleado;
use App\Models\conceptos;
use Illuminate\Http\Request;

class IngresoEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['ingreso_empleados'] = ingreso_empleado::paginate(5); //variable para almacenar la informacion de la base y se la pase al index;
        return view('ingresos_empleados.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos_empleado['empleados'] = empleado::paginate(5); //variable para almacenar la informacion de la base y se la pase al archivo;
        $datos_concepto['conceptos'] = conceptos::paginate(5); //variable para almacenar la informacion de la base y se la pase al archivo;

        return view('ingresos_empleados.add', $datos_empleado, $datos_concepto);
        return view('ingresos_empleados.add'); //add es el nombre del archivo que se llama .blade.php

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //recibiendo toda la informacion y guardandola en la base
        $datosEgresos = request()->except('_token'); //QUITAR EL DATO TOKEN     
        ingreso_empleado::insert($datosEgresos); //agarro el modelo e inserto los datos de conceptos menos el _token

        return redirect('ingresos_empleados')->with('mensaje', 'Ingreso registrado con éxito'); //mensaje con redireccionamiento
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ingreso_empleado  $ingreso_empleado
     * @return \Illuminate\Http\Response
     */
    public function show(ingreso_empleado $ingreso_empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ingreso_empleado  $ingreso_empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(ingreso_empleado $ingreso_empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ingreso_empleado  $ingreso_empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ingreso_empleado $ingreso_empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ingreso_empleado  $ingreso_empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ingreso)
    {
        ingreso_empleado::destroy($id_ingreso);
        return redirect('ingresos_empleados')->with('mensaje', 'Registro borrado con éxito'); //mensaje con redireccionamiento
    }
}
