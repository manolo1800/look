<?php

namespace App\Http\Controllers;

use App\tipo;
use App\ont_tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('tipo.tipo');
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
        $validate = request()->validate(
                [
                    'Clasificacion' => 'required|string',
                ]
            );
        try {
            //code...
            if ($validate) {
                # code...
                $olt = $request->except('_token'); //toma todos los valores excepto el _token
                // estamos haciendo que se almacene todo lo que se envia al metodo store
                ont_tipo::insert([
                    'Clasificacion' => $request->Clasificacion,
                    'created_at' => now()->toDateTime(),
                    'user_email_created' => Auth::user()->email,
                ]);
                $respuesta['respuesta'] = array(
                    "title" => "Creación de tipo ONT",
                    "msg" => "Estimado usuario,tipo ONT se ha creado exitosamente",
                    "ruta" => 'tipo',
                    "otros" => ""
                );
                return view('mensajes.satisfactorio', $respuesta);
            }
        } catch (\Throwable $th) {
            // throw $th;
            $respuesta['respuesta'] = array(
                "title" => "Creación de tipo ONT",
                "msg" => "Estimado usuario, no se ha podido realizar la creación del tipo ONT, intente más tarde.",
                "ruta" => 'tipo',
                "otros" => ""
            );
            return view('mensajes.error', $respuesta);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(tipo $tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit(tipo $tipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tipo $tipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipo $tipo)
    {
        //
    }
}
