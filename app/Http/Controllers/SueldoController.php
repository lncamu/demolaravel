<?php

namespace App\Http\Controllers;

use App\Models\sueldo;
use App\Models\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SueldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datos['sueldos'] = sueldo::paginate(5); //variable para almacenar la informacion de la base y se la pase al index;
        // return view('sueldos.index', $datos);
        $datos_sueldos = DB::select('SELECT * FROM sueldos s
                                 INNER JOIN empleados em ON  s.empleado_id = em.id   ORDER BY nombre');
        return view('sueldos.index', ['sueldos' => $datos_sueldos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos_empleado['empleados'] = empleado::paginate(5); //variable para almacenar la informacion de la base y se la pase al archivo;
        return view('sueldos.add', $datos_empleado);
        return view('sueldos.add'); //add es el nombre del archivo que se llama .blade.php
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
        $datosSueldo = request()->except('_token'); //QUITAR EL DATO TOKEN
        //calculo

        sueldo::insert($datosSueldo); //agarro el modelo e inserto los datos de sueldos menos el _token

        // return response()->json($datosSueldos);
        return redirect('sueldos')->with('mensaje', 'Sueldo registrado con éxito'); //mensaje con redireccionamiento
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sueldo  $sueldo
     * @return \Illuminate\Http\Response
     */
    public function show(sueldo $sueldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sueldo  $sueldo
     * @return \Illuminate\Http\Response
     */
    public function edit(sueldo $sueldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sueldo  $sueldo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sueldo $sueldo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sueldo  $sueldo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sueldo)
    {
        sueldo::destroy($id_sueldo);
        return redirect('sueldo')->with('mensaje', 'Registro borrado con éxito'); //mensaje con redireccionamiento
    }
}
