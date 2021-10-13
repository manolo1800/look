<?php

namespace App\Http\Controllers;

use App\orden;
use App\apiOrden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('ordenes.ordenes');
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
        // echo 'probando';
        // $validate = $this->validate(
        //     request(),
        //     [
        //         'tipo' => 'required|alpha_num|between:3,25',
        //         'cuent_contrato' => 'required|alpha_num|between:3,25',
        //         'fecha_creacion' => 'required|date|after:tomorrow',
        //         'status' => 'required',
        //     ]
        // );
        // if ($validate) {
        //     # code...
        //     $target_port = $request->except('_token'); //toma todos los valores excepto el token
        //     // estamos haciendo que se almacene todo lo que se envia al metodo store
        //     orden::insert([
        //         'tipo' => $request->olt_id,
        //         'cuent_contrato' => $request->ranura_tarjeta,
        //         'fecha_creacion' => $request->nombre_tarjeta,
        //         'status' => $request->status,
        //         'created_at' => now()->toDateTime(),
        //         'user_email_created' => Auth::user()->email,
        //     ]);
        //     $respuesta['respuesta'] = array(
        //         "title" => "Creación de ordenes",
        //         "msg" => "Estimado usuario, la orden se ha creado exitosamente",
        //         "ruta" => "ordenes",
        //         "otros" => ""
        //     );
        //     return view('mensajes.satisfactorio', $respuesta);
        // }

        $request->session()->put('tipo', $request->tipo);
        $request->session()->put('cuent_contrac', $request->cuent_contrac);
        $request->session()->put('rif_cedula', $request->rif_cedula);
        $request->session()->put('IDServicio_Dispositivo', $request->IDServicio_Dispositivo);
        $request->session()->put('fech_crea', $request->fech_crea);
        $request->session()->put('estado', $request->estado);


        $datos['ordene'] =  DB::select(
            'select id, orden, cuenta_contrato,"Dispositivo", "rif_O_Cedula", serial, creado, asignado, cola, estado, tipo, created_at, updated_at
        FROM api_ordens
        WHERE estado LIKE ? AND cuenta_contrato LIKE ? AND "rif_O_Cedula" LIKE ?  AND tipo LIKE ? AND "Dispositivo" LIKE ? AND created_at >= ?
        ',
            ['%' . $request->estado . '%','%'.$request->cuent_contrac.'%','%'. $request->rif_cedula.'%', '%' . $request->tipo . '%', '%' . $request->IDServicio_Dispositivo .'%',  '2021-07-24 00:11:08' ]
        );
        return
        view('ordenes.edit', $datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show(orden $orden)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit(orden $orden)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function destroy(orden $orden)
    {
        //
    }
    public function all(Request $request)
    {
        //

        $orden = apiOrden::where('estado','=', 'abierto')->get();
        return response(json_encode($orden),200)->header('Content-type','text/plain');
        // return response()->json($orden);
    }

}
