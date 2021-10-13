<?php

namespace App\Http\Controllers;

use App\target_port;
use App\olt;
use App\status;
use App\puertos;
use App\config_card;
use Illuminate\Http\Request;
// use Illuminate\Http\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class TargetPortController extends Controller
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
        $datos['olt'] = olt::paginate(5);
        $datos['status'] = status::all();
        $datos['config_card'] = config_card::get(); 
        return view('ports.cards_ports', $datos);
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
     *
     */
    public function store(Request $request)
    {
        //
        $validate = $this->validate(request(),
            //    ['Ipolt'=>'required|ip',
            [
                // 'ip_agregador' => 'required|ip',
                'olt_id' => 'required',
                'ranura_tarjeta'=>'required',
                // 'nombre_tarjeta'=>'required|string|between:3,25',
                'tipo_target' => 'required|string|between:3,25',
                'VPI'=>'required',
                'S_VLAN'=>'required',
                'puerto_inicial'=>'required',
                'cant_puertos'=> 'required|numeric',
                // 'cant_ont'=>'required',
                'ID_estatus' => 'required',
                // 'C_lan_ini'=>'required'
                ]
        );

        // try {
            // if ($validate) {
                # code...
                $target_port = $request->except('_token'); //toma todos los valores excepto el token
                // estamos haciendo que se almacene todo lo que se envia al metodo store
                // return response()->json($target_port);s
                target_port::insert([
                    'olt_id' => $request->olt_id,
                    'ranura_tarjeta' => $request->ranura_tarjeta,
                    'nombre_tarjeta' => $request->nombre_tarjeta,
                    'tipo_target' => $request->tipo_target,
                    'VPI' => $request->VPI,
                    'S_VLAN' => $request->S_VLAN,
                    'puerto_inicial' => $request->puerto_inicial,
                    'cant_puertos' => $request->cant_puertos,
                    'puertos' => $request->puerto_inicial * $request->cant_puertos,
                    'cant_ont' => $request->cant_ont,
                    'C_lan_ini' => $request->C_lan_ini,
                    // 'C_lan' => $request->cant_ont * $request->C_lan_ini,
                    'ID_estatus' => $request->ID_estatus,
                    'created_at' => now()->toDateTime(),
                    'user_email_created' => Auth::user()->email,
                ]);
                $ultimoId = target_port::latest('id')->first()->id;
        // if ($request->cant_puertos ==8) {
        //     # code...
        for ($i = 0; $i < $request->cant_puertos; $i++) {
            # code...
            $puertocar = 'puerto_' . $i;
            $estado = 'estado_' . $i;
            $sfpt = 'sfpt_' . $i;
            puertos::insert([
                'puerto' => $request->$puertocar,
                'estado' => $request->$estado,
                'id_sfp' => $request->$sfpt,
                'id_targetPort' => $ultimoId,
            ]);
        }
                //    puertos::insert([
                //     'puerto' => $request->puerto_0,
                //     'estado' => $request->Estado_0,
                //     'id_sfp' => $request->sfpt_0,
                //     'id_targetPort' => $ultimoId,]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_1,
                //         'estado' => $request->Estado_1,
                //         'id_sfp' => $request->sfpt_1,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_2,
                //         'estado' => $request->Estado_2,
                //         'id_sfp' => $request->sfpt_2,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_3,
                //         'estado' => $request->Estado_3,
                //         'id_sfp' => $request->sfpt_3,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_4,
                //         'estado' => $request->Estado_4,
                //         'id_sfp' => $request->sfpt_4,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_5,
                //         'estado' => $request->Estado_5,
                //         'id_sfp' => $request->sfpt_5,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_6,
                //         'estado' => $request->Estado_6,
                //         'id_sfp' => $request->sfpt_6,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_7,
                //         'estado' => $request->Estado_7,
                //         'id_sfp' => $request->sfpt_7,
                //         'id_targetPort' => $ultimoId,
                //     ]);

                // }elseif ($request->cant_puertos == 16) {
                //     # code...
                //     puertos::insert([
                //         'puerto' => $request->puerto_0,
                //         'estado' => $request->Estado_0,
                //         'id_sfp' => $request->sfpt_0,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_1,
                //         'estado' => $request->Estado_1,
                //         'id_sfp' => $request->sfpt_1,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_2,
                //         'estado' => $request->Estado_2,
                //         'id_sfp' => $request->sfpt_2,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_3,
                //         'estado' => $request->Estado_3,
                //         'id_sfp' => $request->sfpt_3,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_4,
                //         'estado' => $request->Estado_4,
                //         'id_sfp' => $request->sfpt_4,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_5,
                //         'estado' => $request->Estado_5,
                //         'id_sfp' => $request->sfpt_5,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_6,
                //         'estado' => $request->Estado_6,
                //         'id_sfp' => $request->sfpt_6,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_7,
                //         'estado' => $request->Estado_7,
                //         'id_sfp' => $request->sfpt_7,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_8,
                //         'estado' => $request->Estado_8,
                //         'id_sfp' => $request->sfpt_8,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_9,
                //         'estado' => $request->Estado_9,
                //         'id_sfp' => $request->sfpt_9,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_10,
                //         'estado' => $request->Estado_10,
                //         'id_sfp' => $request->sfpt_10,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_11,
                //         'estado' => $request->Estado_11,
                //         'id_sfp' => $request->sfpt_11,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_12,
                //         'estado' => $request->Estado_12,
                //         'id_sfp' => $request->sfpt_12,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_13,
                //         'estado' => $request->Estado_13,
                //         'id_sfp' => $request->sfpt_13,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_14,
                //         'estado' => $request->Estado_14,
                //         'id_sfp' => $request->sfpt_14,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                //     puertos::insert([
                //         'puerto' => $request->puerto_15,
                //         'estado' => $request->Estado_15,
                //         'id_sfp' => $request->sfpt_15,
                //         'id_targetPort' => $ultimoId,
                //     ]);
                // }
                // $respuesta['respuesta'] = array(
                //     "title" => "Creación de Tarjeta y Puertos",
                //     "msg" => "Estimado usuario, la Tarjeta y Puertos se ha creado exitosamente",
                //     "ruta" => "TargetPort",
                //     "otros" => ""
                // );
                // return view('mensajes.satisfactorio', $respuesta);
            // }
        // }catch(\Exception $e ){
        //     $respuesta['respuesta'] = array(
        //         "title" => "Creación de Tarjeta y Puertos",
        //         "msg" => "Estimado usuario, no se ha podido realizar la creación de Tarjeta y Puerto, intente más tarde.",
        //         "ruta" => "TargetPort",
        //         "otros" => ""
        //     );
        //     return view('mensajes.satisfactorio', $respuesta);
        // }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\target_port  $target_port
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        
        $consulta = DB::table('config_cards')->where('id','=',$id)->get(); 
        return $consulta;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\target_port  $target_port
     * @return \Illuminate\Http\Response
     */
    public function edit( $idtarget_port)
    {
        //
        $target_port = target_port::findOrFail($idtarget_port);
        $olt = olt::findOrFail($target_port->olt_id);
        $datos =   olt::all()->except($target_port->olt_id);
        $estatusactu = DB::select('SELECT id, "Estatus", descripcion FROM statuses where "Estatus" = ?', [$target_port->ID_estatus]);
        $estatusall = DB::select('SELECT id, "Estatus", descripcion FROM statuses where "Estatus" != ?', [$target_port->ID_estatus]);
        return view('ports.edit', ['target_port' => $target_port, 'olt' => $olt, 'olts' =>$datos, 'estatusactu' => $estatusactu, 'estatusall' => $estatusall]);
        // return response()->json($target_port);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\target_port  $target_port
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $idtarget_port)
    {
        //
        $validate = request()->validate(
            [
                'olt_id' => 'required',
                'ranura_tarjeta' => 'required',
                'nombre_tarjeta' => 'required|string|between:3,25',
                'tipo_target' => 'required|string|between:3,25',
                'VPI' => 'required',
                'S_VLAN' => 'required',
                'puerto_inicial' => 'required',
                'cant_puertos' => 'required',
                'cant_ont' => 'required',
                'ID_estatus' => 'required',
                'C_lan_ini' => 'required'
            ]
        );
        try {
            //code...
            if ($validate) {
                # code...
                $target_port = $request->except(['_token', '_method']); //toma todos los valores excepto el token
                target_port::where('id', '=', $idtarget_port)->update([
                    'olt_id' => $request->olt_id,
                    'ranura_tarjeta' => $request->ranura_tarjeta,
                    'nombre_tarjeta' => $request->nombre_tarjeta,
                    'tipo_target' => $request->tipo_target,
                    'VPI' => $request->VPI,
                    'S_VLAN' => $request->S_VLAN,
                    'puerto_inicial' => $request->puerto_inicial,
                    'cant_puertos' => $request->cant_puertos,
                    'puertos' => $request->puerto_inicial * $request->cant_puertos,
                    'cant_ont' => $request->cant_ont,
                    'C_lan_ini' => $request->C_lan_ini,
                    'C_lan' => $request->cant_ont * $request->C_lan_ini,
                    'ID_estatus' => $request->ID_estatus,
                    'updated_at' => now()->toDateTime(),
                    'user_email_updated' => Auth::user()->email,
                ]);
                $target_port = target_port::findOrFail($idtarget_port);
                // return response()->json($target_port);
                $respuesta['respuesta'] = array(
                    "title" => "Creación de Tarjeta y Puertos",
                    "msg" => "Estimado usuario, la Tarjeta y Puertos se ha modificado exitosamente",
                    "ruta" => "TargetPort",
                    "otros" => ""
                );
                return view('mensajes.satisfactorio', $respuesta);
            }

        } catch (\Throwable $th) {
            //throw $th;
            $respuesta['respuesta'] = array(
                "title" => "Creación de olt",
                "msg" => "Estimado usuario, no se ha podido realizar la modificación de Tarjeta y Puerto, intente más tarde.",
                "ruta" => 'aprovicion',
                "otros" => ""
            );
            return view('mensajes.error', $respuesta);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\target_port  $target_port
     * @return \Illuminate\Http\Response
     */
    public function destroy(target_port $target_port)
    {
        //

    }
    public function mostrar()
    {
        // //
        $datos['target_port'] = config_card::paginate(10);
        // return view('service_Profile.index', $datos);
        return view('ports.form', $datos);
    }

}
