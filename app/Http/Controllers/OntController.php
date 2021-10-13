<?php

namespace App\Http\Controllers;

use App\ont;
use App\status;
use App\proveedor;
use App\ont_tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OntController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['proveedor'] = proveedor::all();
        $datos['ont_tipo'] = ont_tipo::all();
        $datos['status'] = status::all();
        return view('ont.ont',$datos);

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
                'tipo' => 'required',
                'serial' => 'required|alpha_num|between:3,12',
                'proveedor' => 'required',
                'modelo' => 'required|alpha_num|between:3,25',
                'ID_estatus' => 'required',
            ]
        );
        try {
            //code...
            if ($validate) {
                # code...
                ont::insert([
                    'tipo' => $request->tipo,
                    'serial' => $request->serial,
                    'proveedor' => $request->proveedor,
                    'modelo' => $request->modelo,
                    'ID_estatus' => $request->ID_estatus,
                    'created_at' => now()->toDateTime(),
                    'user_email_created' => Auth::user()->email,
                ]);
                $respuesta['respuesta'] = array(
                    "title" => "Creación de ont",
                    "msg" => "Estimado usuario,ont se ha creado exitosamente",
                    "ruta" => 'ont',
                    "otros" => ""
                );
                return view('mensajes.satisfactorio', $respuesta);
            }
        } catch (\Throwable $th) {
            //throw $th;
            $respuesta['respuesta'] = array(
                    "title" => "Creación de ont",
                    "msg" => "Estimado usuario, no se ha podido realizar la creación del ONT, intente más tarde.",
                    "ruta" => 'ont',
                    "otros" => ""
                );
            return view('mensajes.error', $respuesta);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ont  $ont
     * @return \Illuminate\Http\Response
     */
    public function show(ont $ont)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ont  $ont
     * @return \Illuminate\Http\Response
     */
    public function edit($idont)
    {
        //
        $ont = ont::findOrFail($idont);
        $ont_tipo_actu = ont_tipo::findOrFail($ont->tipo);
        $ont_tipo = ont_tipo::all()->except($ont->tipo);
        $estatusactu = DB::select('SELECT id, "Estatus", descripcion FROM statuses where "Estatus" = ?', [$ont->ID_estatus]);
        $estatusall = DB::select('SELECT id, "Estatus", descripcion FROM statuses where "Estatus" != ?', [$ont->ID_estatus]);
        return view('ont.edit', ['ont' => $ont, 'estatusactu' => $estatusactu, 'estatusall' =>$estatusall, 'ont_tipo_actu' => $ont_tipo_actu, 'ont_tipo' => $ont_tipo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ont  $ont
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idont)
    {
        //
        $online_Profile = $request->except(['_token', '_method']); //toma todos los valores excepto el token
        $validate = request()->validate(
            [
                'tipo' => 'required',
                'serial' => 'required|alpha_num|between:3,12',
                'ID_estatus' => 'required',
            ]
        );
        try {
            //code...
            if ($validate) {
            //code...
            ont::where('id', '=', $idont)->update([
                'tipo' => $request->tipo,
                'serial' => $request->serial,
                'ID_estatus' => $request->ID_estatus,
                'updated_at' => now()->toDateTime(),
                'user_email_updated' => Auth::user()->email,
            ]);
            $online_Profile = ont::findOrFail($idont);
            // return response()->json($online_Profile);
            $respuesta['respuesta'] = array(
                "title" => "modificacion de ont",
                "msg" => "Estimado usuario, el ont se han modificado exitosamente",
                "ruta" => 'ont',
                "otros" => ""
            );
            return view('mensajes.satisfactorio', $respuesta);
        }
        } catch (\Throwable $th) {
            //throw $th;
            $respuesta['respuesta'] = array(
                    "title" => "modificacion de ont",
                    "msg" => "Estimado usuario, no se ha podido realizar la modificación del ONT, intente más tarde.",
                    "ruta" => 'ont',
                    "otros" => ""
                );
            return view('mensajes.error', $respuesta);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ont  $ont
     * @return \Illuminate\Http\Response
     */
    public function destroy(ont $ont)
    {
        //
    }
    public function mostrar()
    {
        // //
        // $datos['ont'] = ont::paginate(5);
        $ont = ont::paginate(5);
        $datos['ont'] = DB::select(
            'select T1.*,T2."Clasificacion",T3.descripcion  from (select * from onts) AS T1
        INNER JOIN (SELECT id,"Clasificacion" FROM ont_tipos) AS T2 ON T1.tipo = T2.id
        INNER JOIN (SELECT id, "Estatus", descripcion FROM statuses) AS T3 ON T1.tipo = T3.id
        '
        );

        return view('ont.form', $datos);
    }
}
