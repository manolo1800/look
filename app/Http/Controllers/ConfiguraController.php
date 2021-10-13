<?php

namespace App\Http\Controllers;

use App\configura;
use Illuminate\Http\Request;

class ConfiguraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        return view('configuracion.configura');
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

        $validate = $this->validate(
            request(),
            [
                'proveedor' => 'required|alpha_num|between:3,25',
                'conexion' => 'required|alpha_num|between:3,25',
                'comandos' => 'required|alpha_num|between:3,25'
            ]
        );
        if ($validate) {
            # code...
            $configura = $request->except('_token'); //toma todos los valores excepto el token
            // estamos haciendo que se almacene todo lo que se envia al metodo store
            configura::insert($configura);
            // return response()->json($serviceProfile);
            $respuesta['respuesta'] = array(
                "title" => "Creación de configuración",
                "msg" => "Estimado usuario, la configuración se ha creado exitosamente",
                "ruta" => "config",
                "otros" => ""
            );
            return view('mensajes.satisfactorio', $respuesta);
        }
        // return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\configura  $configura
     * @return \Illuminate\Http\Response
     */
    public function show(configura $configura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\configura  $configura
     * @return \Illuminate\Http\Response
     */
    public function edit(configura $configura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\configura  $configura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, configura $configura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configura  $configura
     * @return \Illuminate\Http\Response
     */
    public function destroy(configura $configura)
    {
        //
    }
}
