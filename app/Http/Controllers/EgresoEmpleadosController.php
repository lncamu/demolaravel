<?php

namespace App\Http\Controllers;

use App\Models\egreso_empleados;
use App\Models\empleado;
use App\Models\conceptos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EgresoEmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['egreso_empleados'] = egreso_empleados::paginate(5); //variable para almacenar la informacion de la base y se la pase al index;
        return view('egresos_empleados.index', $datos);
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

        return view('egresos_empleados.add', $datos_empleado, $datos_concepto);

        return view('egresos_empleados.add'); //add es el nombre del archivo que se llama index.blade.php

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
        egreso_empleados::insert($datosEgresos); //agarro el modelo e inserto los datos de conceptos menos el _token

        return redirect('egresos_empleados')->with('mensaje', 'Egreso registrado con éxito'); //mensaje con redireccionamiento
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\egreso_empleados  $egreso_empleados
     * @return \Illuminate\Http\Response
     */
    public function show(egreso_empleados $egreso_empleados)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\egreso_empleados  $egreso_empleados
     * @return \Illuminate\Http\Response
     */
    public function edit(egreso_empleados $egreso_empleados)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\egreso_empleados  $egreso_empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, egreso_empleados $egreso_empleados)
    {
        //
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\egreso_empleados  $egreso_empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_egreso)
    {
        egreso_empleados::where('id_egreso', $id_egreso)->delete();
        return redirect('egresos_empleados')->with('mensaje', 'Registro borrado con éxito'); //mensaje con redireccionamiento
    }
}
