<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\apiOrden;
use Illuminate\Http\Request;

class ApiOrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
            //
            /*$orden = DB::table('api_ordens')
            ->where([
                ['orden','=','12']
            ])
            ->limit(2)
            ->get();
    
            return view('ordenes.index',['orden' => $orden]);
            */
        
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
        $tipo = $request->tipo;
        $cuenta_contrato = $request->cuenta_contrato;
        $rif_O_Cedula = $request->rif_O_Cedula;
        $created_at = $request->created_at;
        $estado = $request->estado;
        
        //Query a la tabla api_ordens para confirmar la existencia de la orden 
        $orden = DB::table('api_ordens')
        ->where('tipo','=',"$tipo")
        ->orWhere('cuenta_contrato','=',"$cuenta_contrato")
        ->orWhere('rif_O_Cedula','=',"$rif_O_Cedula")
        ->orWhere('created_at','=',"$created_at")
        ->orWhere('estado','=',"$estado")
        ->get();
        
        return $orden;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\apiOrden  $apiOrden
     * @return \Illuminate\Http\Response
     */
    public function show(apiOrden $apiOrden)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\apiOrden  $apiOrden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, apiOrden $apiOrden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\apiOrden  $apiOrden
     * @return \Illuminate\Http\Response
     */
    public function destroy(apiOrden $apiOrden)
    {
        //
    }
}
