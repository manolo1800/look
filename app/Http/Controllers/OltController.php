<?php

namespace App\Http\Controllers;

use App\Models\olt;
use App\Models\status;
use App\Models\tipo;
use App\Models\puertouplink;
use App\Models\central;
use App\Models\proveedor ;
use App\Models\puertos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\http\Exceptions\HttpResponseException;
use App\Rules\ContrasenaFuerte;


class OltController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        //

	    $datos['central'] = central::all();
        $datos['status'] = status::all()->except([3, 4]);
        $datos['proveedor'] = proveedor::all();
        $datos['puertos'] = puertos::all();

        return view('aprovicion.aprovicion', $datos);
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
        $validate= request()->validate(
            [
                'central_id' => 'required|numeric',
                'fila' => ['required', new ContrasenaFuerte()],//|digits_between:1,4',
                'piso' =>  ['required', new ContrasenaFuerte()],//'required|digits_between:1,4',
                'sala' =>  ['required', new ContrasenaFuerte()],//'required|digits_between:1,4',
                'bastidor' =>  ['required', new ContrasenaFuerte()],//'required|digits_between:1,4',
                'subbastidor' =>  ['required', new ContrasenaFuerte()],//'required|digits_between:1,4',
                // 'id_olt' => 'required|alpha_num|between:1,10',
                'ip_olt' => 'required|ip',
                'Nombre_elemento' => 'required|string',
                'Tipo' => 'required|string',
                'proveedor' => 'required|string',
                'puerto_serv_inicial' => 'required|integer|digits_between:1,5',
                'numero_puertos' => 'required|integer|digits_between:1,5',
                // 'ID_estatus' => 'required',
            ]
        );
        try {
            //code...
            if ($validate) {
                # code...
                $olt = $request->except('_token'); //toma todos los valores excepto el _token
                // estamos haciendo que se almacene todo lo que se envia al metodo store
                olt::insert([
                    'central_id' => $request->central_id,
                    'fila' => $request->fila,
                    'piso' => $request->piso,
                    'sala' => $request->sala,
                    'bastidor' => $request->bastidor,
                    'subbastidor' => $request->subbastidor,
                    'puerto_uplin' => $request->puerto_uplin,
                    'ip_olt' => $request->ip_olt,
                    'Nombre_elemento' => $request->Nombre_elemento,
                    'Tipo' => $request->Tipo,
                    'id_proveedor' => $request->proveedor,
                    'puerto_serv_inicial' => $request->puerto_serv_inicial,
                    'numero_puertos' => $request->numero_puertos,
                    'puerto_serv_Xnumero_puertos' => $request->puerto_serv_inicial * $request->numero_puertos,
                    'created_at' => now()->toDateTime(),
                    'user_email_created' => Auth::user()->email,
                ]);
                // $ultimoId = olt::latest('id')->first()->id;
                // // return response()->json($serviceProfile);
                // for ($i = 0; $i < $request->puerto_uplin; $i++) {
                //     # code...
                //     $puerto = 'puerto_' . $i;
                //     $estado = 'estado_' . $i;
                //     $sfpt = 'sfpt_' . $i;
                //     puertouplink::insert([
                //         'cant_uplink' => $request->$puerto,
                //         'estado' => $request->$estado,
                //         'id_uplink' => $request->$sfpt,
                //         'id_olt' => $ultimoId,
                //     ]);
                // }
                $respuesta['respuesta'] = array(
                    "title" => "Creación de olt",
                    "msg" => "Estimado usuario,olt se ha creado exitosamente",
                    "ruta" => 'aprovision',
                    "otros" => ""
                );
                return view('mensajes.satisfactorio', $respuesta);
            }
        } catch (\Throwable $th) {
            // throw $th;
            $respuesta['respuesta'] = array(
                    "title" => "Creación de olt",
                    "msg" => "Estimado usuario, no se ha podido realizar la creación del OLT, intente más tarde.",
                    "ruta" => 'aprovision',
                    "otros" => ""
                );
                return view('mensajes.error', $respuesta);

        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\olt  $olt
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $id1 = $request->id;
        $id = DB:: table('olts')->where('id','=',$id1)->get();
        return $id;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\olt  $olt
     * @return \Illuminate\Http\Response
     */
    public function edit($idolt)
    {
        //
        $olt = olt::findOrFail($idolt);
        $central = central::findOrFail($olt->central_id);
        $datos =   central::all()->except($olt->central_id);
        $estatusactu = DB::select('SELECT id, "Estatus", descripcion FROM statuses where "Estatus" = ?', [$olt->ID_estatus] );
        $estatusall =DB::select('SELECT id, "Estatus", descripcion FROM statuses where "Estatus" != ?', [$olt->ID_estatus]);
        $proveedoractu = DB::select('SELECT id, "Proveedor" FROM proveedors where "Proveedor" = ?', [$olt->proveedor]);
        $proveedorall = DB::select('SELECT id, "Proveedor" FROM proveedors where "Proveedor" != ?', [$olt->proveedor]);
        $puertouplinks = DB::select('SELECT *  FROM ((SELECT id, id_olt,id_uplink,estado FROM puertouplinks where id_olt = ? ) AS T1
        INNER JOIN (SELECT id,"nameSfp",id_tipo FROM sfps) AS T2 ON T1.id_uplink = T2.id
        INNER JOIN (SELECT id,"Tipo" FROM tipos) AS T3 ON T2.id_tipo = T3.id) ', [$idolt]);
        // return response()->json($puertouplinks);
        // return view('aprovicion.edit')->with('olt',$olt)->with('central',$central);
        return view('aprovicion.edit', ['olt' => $olt, 'central' =>$central, 'centrales' => $datos, 'estatusactu' =>$estatusactu, 'estatusall' =>$estatusall ,'proveedoractu' => $proveedoractu, 'proveedorall' =>$proveedorall, 'puertouplinks' => $puertouplinks]);
        // return response()->json($puertouplinks);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\olt  $olt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idolt)
    {
        //
        $olt = $request->except(['_token', '_method']); //toma todos los valores excepto el token
        $validate = request()->validate(
                [
                'central_id' => 'required|numeric',
                'fila' => ['required', new ContrasenaFuerte()], //|digits_between:1,4',
                'piso' =>  ['required', new ContrasenaFuerte()], //'required|digits_between:1,4',
                'sala' =>  ['required', new ContrasenaFuerte()], //'required|digits_between:1,4',
                'bastidor' =>  ['required', new ContrasenaFuerte()], //'required|digits_between:1,4',
                'subbastidor' =>  ['required', new ContrasenaFuerte()], //'required|digits_between:1,4',
                // 'id_olt' => 'required|alpha_num|between:1,10',
                'ip_olt' => 'required|ip',
                'Nombre_elemento' => 'required|string',
                'Tipo' => 'required|string',
                'proveedor' => 'required|string',
                'puerto_serv_inicial' => 'required|integer|digits_between:1,5',
                'numero_puertos' => 'required|integer|digits_between:1,5',
                ]
            );
        try {
                    //code...
            olt::where('id', '=', $idolt)->update([
                'central_id' => $request->central_id,
                'fila' => $request->fila,
                'piso' => $request->piso,
                'sala' => $request->sala,
                'bastidor' => $request->bastidor,
                'subbastidor' => $request->subbastidor,
                // 'id_olt' => $request->id_olt,
                'ip_olt' => $request->ip_olt,
                'Nombre_elemento' => $request->Nombre_elemento,
                'Tipo' => $request->Tipo,
                'proveedor' => $request->proveedor,
                'puerto_serv_inicial' => $request->puerto_serv_inicial,
                'numero_puertos' => $request->numero_puertos,
                'puerto_uplin' => $request->puerto_uplin,
                'puerto_serv_Xnumero_puertos' => $request->puerto_serv_inicial * $request->numero_puertos,
                'updated_at' => now()->toDateTime(),
                'user_email_updated' => Auth::user()->email,
            ]);
            // $olt = olt::findOrFail($idolt);
            // return response()->json($olt);
            $ultimoId = olt::latest('id')->first()->id;
        // return response()->json($serviceProfile);
        // for ($i = 0; $i < $request->puerto_uplin; $i++) {
        //     # code...
        //     $puerto = 'puerto_' . $i;
        //     $estado = 'estado_' . $i;
        //     $sfpt = 'sfpt_' . $i;
        //     puertouplink::where('id_olt', '=', $ultimoId)->update([
        //         'cant_uplink' => $request->$puerto,
        //         'estado' => $request->$estado,
        //         'id_uplink' => $request->$sfpt,
        //         'id_olt' => $ultimoId,
        //     ]);
        // }
            $respuesta['respuesta'] = array(
                "title" => "Creación de olt",
                "msg" => "Estimado usuario,olt se ha modificado exitosamente",
                "ruta" => 'aprovision',
                "otros" => ""
            );
            return view('mensajes.satisfactorio', $respuesta);
        } catch (\Throwable $th) {
            //throw $th;
            $respuesta['respuesta'] = array(
                "title" => "Creación de olt",
                "msg" => "Estimado usuario, no se ha podido realizar la modificación del OLT, intente más tarde.",
                "ruta" => 'aprovision',
                "otros" => ""
            );
            return view('mensajes.error', $respuesta);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\olt  $olt
     * @return \Illuminate\Http\Response
     */
    public function destroy(olt $olt)
    {
        //
    }
    public function mostrar()
    {
        // //
        $datos['olt'] = olt::all();
        // return view('service_Profile.index', $datos);
        return view('aprovicion.form', $datos);
    }

    // public function mostrar2(Request $request)
    // {
    //  return   json_encode($request->id);// //
    //     // $datos['olt'] = olt::paginate(5);
    //     // // return view('service_Profile.index', $datos);
    //     // return view('aprovicion.form', $datos);
    // }

     public function optionTipo()
     {
        echo "hola";
        die();
        //$id=$request->id;
        $sfp=DB::table('sfps')
            ->select('id','nameSfp')
            ->where('id_tipo',1)
        ->get();
        return $sfp;
     }
}
