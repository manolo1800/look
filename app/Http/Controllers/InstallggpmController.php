<?php

namespace App\Http\Controllers;


use App\central;
use App\olt;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class InstallggpmController extends Controller
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
        return view('installggpm.installggpm', compact('central'));
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

    // public function mostrar2(Request $request)
    // {
    //     $id = $request->id;
    //     $central = olt::where('central_id','=',$request->id)->select('olts.Nombre_elemento')->get();//table('olts')->where('central_id','=',$request->id);//table('olts')->where('central_id','=',$request->id)->select('*');


    //     return $central;
    // }

    public function getOlt(Request $request)
    {
        //
        if ($request->ajax()) {
            # code...
            // $ciudades =  olt::where('central_id', $request->central_id)->get();

            $sfps =  DB::select('SELECT * FROM olts where central_id = ?', [$request->central_id]);
            foreach ($sfps as $sfp) {
                # code...
                // $urbanizacionArray[$sfp->id] = $sfp->nameSfp;
                $urbanizacionArray[$sfp->id] = $sfp->Nombre_elemento;
            }
            return response()->json($urbanizacionArray);
        }
    }


    
    public function getOdf(Request $request)
    {
        //
        if ($request->ajax()) {
            # code...
            // $ciudades =  olt::where('central_id', $request->central_id)->get();

            $sfps =  DB::select('SELECT * FROM odfs where central = ?', [$request->central_id]);
            foreach ($sfps as $sfp) {
                # code...
                // $urbanizacionArray[$sfp->id] = $sfp->nameSfp;
                $urbanizacionArray[$sfp->id] = $sfp->odf;
            }
            return response()->json($urbanizacionArray);
        }
    }


    public function getTarget(Request $request)
    {
        //
        if ($request->ajax()) {
            # code...
            // $ciudades =  olt::where('central_id', $request->central_id)->get();

            $sfps =  DB::select('SELECT id,nombre_tarjeta,olt_id FROM target_ports where olt_id = ?', [$request->olt_id]);
            foreach ($sfps as $sfp) {
                # code...
                // $urbanizacionArray[$sfp->id] = $sfp->nameSfp;
                $urbanizacionArray[$sfp->id] = $sfp->nombre_tarjeta;
            }
            return response()->json($urbanizacionArray);
        }
    }

    public function getPort(Request $request)
    {
        //
        if ($request->ajax()) {
            # code...
            // $ciudades =  olt::where('central_id', $request->central_id)->get();

            $sfps =  DB::select('SELECT id,"id_targetPort",puerto FROM puertos where "id_targetPort" = ?', ['10']);
            foreach ($sfps as $sfp) {
                # code...
                // $urbanizacionArray[$sfp->id] = $sfp->nameSfp;
                $urbanizacionArray[$sfp->id] = $sfp->puerto;
            }
            return response()->json($urbanizacionArray);
        }
    }

}

