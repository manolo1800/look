<?php

namespace App\Http\Controllers;

use App\Models\central;
use Illuminate\Http\Request;
use yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\estado;
use App\Models\municipio;
use App\Models\parroquia;
use App\Models\urbanizacion;
use App\Models\ciudad;
use Illuminate\Support\Facades\DB;

class CentralController extends Controller
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
        $estado = estado::all();
        $municipio = municipio::all();
        $parroquia = parroquia::all();
        $urbanizacion = urbanizacion::all();
        $ciudad = ciudad::all();
        return view('central.central', ['estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia, 'urbanizacion' => $urbanizacion, 'ciudad' => $ciudad,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('central.central');
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
        $validate = $this->validate(request(),[
                // 'ip_agregador' => 'required|ip',
                'codigo_central' => 'required',
                'name_central' => 'required|alpha_num|between:3,25',
                'zona_p_central' => 'required|numeric',
                'direcc' => 'required',
                'estado_id' => 'required',
                'ciudad_id' => 'required',
                'municipio_id' => 'required',
                'parroquia_id' => 'required',
                'urbanizacion' => 'required',
            ]
        );
        try {
            //code...
            if ($validate) {
                # code...
                $central = $request->except('_token'); //toma todos los valores excepto el token
                // estamos haciendo que se almacene todo lo que se envia al metodo store
                if ($request->status == null) {
                    $request->status = false;
                }
                central::insert([

                    'codigo_central' => $request->codigo_central,
                    'name_central' => $request->name_central,
                    'status' => $request->status,
                    'estado_id' => $request->estado_id,
                    'ciudad_id' => $request->ciudad_id,
                    'municipio_id' => $request->municipio_id,
                    'parroquia_id' => $request->parroquia_id,
                    'urbanizacion' => $request->urbanizacion,
                    'zona_p_central' => $request->zona_p_central,
                    'direcc' => $request->direcc,
                    'created_at' => now()->toDateTime(),
                    'user_email_created' => Auth::user()->email,
                ]);

                // return response()->json($serviceProfile);
                $respuesta['respuesta'] = array(
                    "title" => "Creación de central",
                    "msg" => "Estimado usuario, la central se ha creado exitosamente",
                    "ruta" => "central",
                    "otros" => ""
                );
                return view('mensajes.satisfactorio', $respuesta);
            }

        } catch (\Throwable $th) {
            //throw $th;
            $respuesta['respuesta'] = array(
                "title" => "Creación de central",
                "msg" => "Estimado usuario, no se ha podido realizar la creación de la central, intente más tarde.",
                "ruta" => 'central',
                "otros" => ""
            );
            return view('mensajes.error', $respuesta);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\central  $central
     * @return \Illuminate\Http\Response
     */
    public function show(central $central)
    {
        //
        $estado = estado::all();
        $municipio = municipio::all();
        $parroquia = parroquia::all();
        $urbanizacion = urbanizacion::all();
        $ciudad = ciudad::all();
        return view('central.central', ['estado' => $estado, 'municipio' => $municipio, 'parroquia' => $parroquia, 'urbanizacion' => $urbanizacion, 'ciudad' => $ciudad, ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\central  $central
     * @return \Illuminate\Http\Response
     */
    public function edit($idcentral)
    {
        //
        $central = central::findOrFail($idcentral);
        $estado = estado::findOrFail($central->estado_id);
        $ciudad = ciudad::findOrFail($central->ciudad_id);
        $municipio = municipio::findOrFail($central->municipio_id);
        $parroquia = parroquia::findOrFail($central->parroquia_id);
        // $urbanizacion = urbanizacion::findOrFail($central->urbanizacion_id);




        // return view('central.edit',[ 'central'=>$central, 'estado'=>$estado,'ciudad'=> $ciudad,'municipio'=> $municipio,'parroquia'=> $parroquia, 'urbanizacion'=>$urbanizacion]);
        return view('central.edit', ['central' => $central, 'estado' => $estado, 'ciudad' => $ciudad, 'municipio' => $municipio, 'parroquia' => $parroquia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\central  $central
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idcentral)
    {
        //
        $central = $request->except(['_token', '_method']); //toma todos los valores excepto el token
        if ($request->status == null) {
            $request->status = false;
        }

        try {
            //code...
            central::where('id', '=', $idcentral)->update([
                'codigo_central' => $request->codigo_central,
                'name_central' => $request->name_central,
                'status' => $request->status,
                'estado_id' => $request->estado_id,
                'ciudad_id' => $request->ciudad_id,
                'municipio_id' => $request->municipio_id,
                'parroquia_id' => $request->parroquia_id,
                'urbanizacion' => $request->urbanizacion,
                'zona_p_central' => $request->zona_p_central,
                'direcc' => $request->direcc,
                'updated_at' => now()->toDateTime(),
                'user_email_updated' => Auth::user()->email,
            ]);
            $central = central::findOrFail($idcentral);
            // return response()->json($central);
            $respuesta['respuesta'] = array(
                "title" => "Modificación de central",
                "msg" => "Estimado usuario, la central se ha modificado exitosamente",
                "ruta" => "central",
                "otros" => ""
            );
            return view('mensajes.satisfactorio', $respuesta);
        } catch (\Throwable $th) {
            //throw $th;
            $respuesta['respuesta'] = array(
                "title" => "Creación de central",
                "msg" => "Estimado usuario, no se ha podido realizar la modificación de la central, intente más tarde.",
                "ruta" => 'central',
                "otros" => ""
            );
            return view('mensajes.error', $respuesta);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\central  $central
     * @return \Illuminate\Http\Response
     */
    public function destroy(central $central)
    {
        //

    }
    public function mostrar()
    {
        $datos['central'] = central::all();
        return view('central.form', $datos);
        //
        $datos['central'] = central::all();
        // return view('service_Profile.index', $datos);
        // return view('central.form', $datos);

        // $datos['central'] = central::all();
        // //Vamos a declarar un array
        // $data = array();

        // // while ($reg= $datos['central']->fetch_object())
        foreach($datos['central'] as $centrals){
 			$data[]=array(
                // "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-pencil"></i></button>'.
                // 	' <button class="btn btn-danger" onclick="desactivar('.$reg->idcategoria.')"><i class="fa fa-close"></i></button>':
                // 	'<button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-pencil"></i></button>'.
                // 	' <button class="btn btn-primary" onclick="activar('.$reg->idcategoria.')"><i class="fa fa-check"></i></button>',
                // "1"=>$reg->nombre,
                // "2"=>$reg->descripcion,
                // "3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
                // '<span class="label bg-red">Desactivado</span>'
                // "0" => ($reg->condicion) ? '<button class="btn btn-warning" onclick="mostrar(' . $reg->idcategoria . ')"><i class="fa fa-pencil"></i></button>' .
                // ' <button class="btn btn-danger" onclick="desactivar(' . $reg->idcategoria . ')"><i class="fa fa-close"></i></button>' :
                // '<button class="btn btn-warning" onclick="mostrar(' . $reg->idcategoria . ')"><i class="fa fa-pencil"></i></button>' .
                // ' <button class="btn btn-primary" onclick="activar(' . $reg->idcategoria . ')"><i class="fa fa-check"></i></button>',
                "0" => $centrals->codigo_central,
                "1" => $centrals->name_central
                // "3" => ($reg->condicion) ? '<span class="label bg-green">Activado</span>' :
                // '<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
        return view('central.form', $results);
         echo json_encode($results);
        return response()->json($results);
        //return datatables::of($results)->make(true);
    }
}
