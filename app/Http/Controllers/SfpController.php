<?php

namespace App\Http\Controllers;

use App\sfp;
use App\tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SfpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sfp = sfp::get();
        return view('sfp.sfp', compact('sfp'));
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
                'id_tipo' => 'required|numeric',
                'nameSfp' => 'required|string',
                'Stream_up' => 'required|numeric',
                'Stream_down' => 'required|numeric',
            ]
        );
        $id_tipo = (int)$request->id_tipo;

        try {
            //code...
            if ($validate) {
                # code...
                $olt = $request->except('_token'); //toma todos los valores excepto el _token
                // estamos haciendo que se almacene todo lo que se envia al metodo store
                sfp::insert([
                    'id_tipo' => $id_tipo,
                    'nameSfp' => $request->nameSfp,
                    'Stream_up' => $request->Stream_up,
                    'Stream_down' => $request->Stream_down,
                    'created_at' => now()->toDateTime(),
                    'user_email_created' => Auth::user()->email,
                ]);
                $respuesta['respuesta'] = array(
                    "title" => "Creación de SFP",
                    "msg" => "Estimado usuario,SFP se ha creado exitosamente",
                    "ruta" => 'sfp',
                    "otros" => ""
                );
                return view('mensajes.satisfactorio', $respuesta);
            }
        } catch (\Throwable $th) {
            // throw $th;
            $respuesta['respuesta'] = array(
                "title" => "Creación de SFP",
                "msg" => "Estimado usuario, no se ha podido realizar la creación del SFP, intente más tarde.",
                "ruta" => 'sfp',
                "otros" => ""
            );
            return view('mensajes.error', $respuesta);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sfp  $sfp
     * @return \Illuminate\Http\Response
     */
    public function show(sfp $sfp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sfp  $sfp
     * @return \Illuminate\Http\Response
     */
    public function edit($id_sfp)
    {
        //
        $sfp = sfp::findOrFail($id_sfp);
        return view('sfp.edit', ['sfp' => $sfp]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sfp  $sfp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sfp $sfp)
    {
        //
        $validate = request()->validate(
            [
                'id_tipo' => 'required|numeric',
                'nameSfp' => 'required|string',
                'Stream_up' => 'required|numeric',
                'Stream_down' => 'required|numeric',
            ]
        );
        $id_tipo = (int)$request->id_tipo;

        try {
            //code...
            if ($validate) {
                # code...
                $olt = $request->except('_token'); //toma todos los valores excepto el _token
                // estamos haciendo que se almacene todo lo que se envia al metodo store
                sfp::insert([
                    'id_tipo' => $id_tipo,
                    'nameSfp' => $request->nameSfp,
                    'Stream_up' => $request->Stream_up,
                    'Stream_down' => $request->Stream_down,
                    'created_at' => now()->toDateTime(),
                    'user_email_created' => Auth::user()->email,
                ]);
                $respuesta['respuesta'] = array(
                    "title" => "Modificación de SFP",
                    "msg" => "Estimado usuario,SFP se ha modificado exitosamente",
                    "ruta" => 'sfp',
                    "otros" => ""
                );
                return view('mensajes.satisfactorio', $respuesta);
            }
        } catch (\Throwable $th) {
            // throw $th;
            $respuesta['respuesta'] = array(
                "title" => "Modificación de SFP",
                "msg" => "Estimado usuario, no se ha podido realizar la modificacion del SFP, intente más tarde.",
                "ruta" => 'sfp',
                "otros" => ""
            );
            return view('mensajes.error', $respuesta);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sfp  $sfp
     * @return \Illuminate\Http\Response
     */
    public function destroy(sfp $sfp)
    {
        //
    }


    public function mostrar()
    {
        $sfps = DB::table('sfps')
            ->select('sfps.*', 'tipos.Tipo')
            ->join('tipos', 'id_tipo', '=', 'tipos.id')
            ->get();
        return view('sfp.form', ['sfps' => $sfps]);
    }
    public function mostrargpon()
    {
        //
        // return  sfp::all();
        $sfps =  DB::select('SELECT id,"nameSfp",id_tipo FROM sfps where id_tipo = ?', ["1"]);
        foreach ($sfps as $sfp) {
            # code...
            $urbanizacionArray[$sfp->id] = $sfp->nameSfp;
        }
        return response()->json($urbanizacionArray);
    }
    public function mostrarup()
    {
        //
        // return  sfp::all();
        $sfps =  DB::select('SELECT id,"nameSfp",id_tipo FROM sfps where id_tipo = ?', ["2"]);
        foreach ($sfps as $sfp) {
            # code...
            $urbanizacionArray[$sfp->id] = $sfp->nameSfp;
        }
        return response()->json($urbanizacionArray);
    }
}
