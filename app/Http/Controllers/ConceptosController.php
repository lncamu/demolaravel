<?php

namespace App\Http\Controllers;

use App\Models\conceptos;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ConceptosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['conceptos'] = conceptos::paginate(5); //variable para almacenar la informacion de la base y se la pase al index;
        return view('conceptos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conceptos.add'); //add es el nombre del archivo que se llama .blade.php
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
        $datosConcepto = request()->except('_token'); //QUITAR EL DATO TOKEN

        conceptos::insert($datosConcepto); //agarro el modelo e inserto los datos de conceptos menos el _token

        // return response()->json($datosconceptos);
        return redirect('conceptos')->with('mensaje', 'Concepto registrado con éxito'); //mensaje con redireccionamiento
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\conceptos  $conceptos
     * @return \Illuminate\Http\Response
     */
    public function show(conceptos $conceptos)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\conceptos  $conceptos
     * @return \Illuminate\Http\Response
     */
    public function edit(conceptos $conceptos)
    {
        //
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\conceptos  $conceptos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, conceptos $conceptos)
    {
        //
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\conceptos  $conceptos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_conceptos)
    {
        conceptos::where('id_conceptos', $id_conceptos)->delete();
        // conceptos::destroy($id_conceptos);
        return redirect('conceptos')->with('mensaje', 'Registro borrado con éxito'); //mensaje con redireccionamiento
    }
}
