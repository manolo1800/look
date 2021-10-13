<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use yajra\DataTables\DataTables;

use App\central;
use App\Odf;


use Illuminate\Http\Request;

class OdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $central = central::get();
        // $odf = Odf::get();

        $fijo = "Fibra Central";
        return view('odf.odf',compact('central','fijo'));
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
        $request->validate([
            'central'=>'required',
            'odf'=>'required|string',
            'sala'=>'required|string|between:2,25',
            'piso'=>'required|string|between:2,4',
            'bastidor'=>'required|string|between:2,4',
            'frame'=>'required|string|between:2,4',
            'bandeja'=>'required|string|between:2,4',
            'posicion'=>'required|string',
            'tipo_cable'=>'required',
            'capacidad'=>'required|string|between:2,25',
            'distancia'=>'required|string|between:2,25',
            'ruta'=>'required|string|between:2,25',
        ]);

        // $odf = Odf::create($request->all());
        
        Odf::insert([

            'central' => $request->central,
            'odf' => $request->odf,
            'sala' => $request->sala,
            'piso' => $request->piso,
            'bastidor' => $request->bastidor,
            'frame' => $request->frame,
            'bandeja' => $request->bandeja,
            'posicion' => $request->posicion,
            'tipo_cable' => $request->tipo_cable,
            'capacidad' => $request->capacidad,
            'ruta' => $request->ruta,
            'distancia' => $request->distancia,
            'created_at' => now()->toDateTime(),
            'user_email_created' => Auth::user()->email,
        ]);

        $respuesta['respuesta'] = array(
            "title" => "Creación de central",
            "msg" => "Estimado usuario, el odf " .$request->odf. " se ha creado exitosamente",
            "ruta" => "Odf",
            "otros" => ""
        );

        return view('mensajes.satisfactorio', $respuesta);

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // public function mostrar2()
    // {
    //     //
    //     $datos['odf'] = Odf::paginate(5);
    //     // return view('service_Profile.index', $datos);
    //     return view('aprovicion.form', $datos);
    // }

    public function mostrar()
    {
        //
        $respuesta = Odf::get();
        return $respuesta;
    }
}
