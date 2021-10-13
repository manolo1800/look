<?php

namespace App\Http\Controllers;

use App\online_profile;
use App\ont_tipo_srv;
use App\product;
use App\status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OnlineProfileController extends Controller
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
        $datos['ont_tipo_srv'] = ont_tipo_srv::all();
        $datos['product'] = product::all();
        $datos['status'] = status::all()->except([3,4]);
        return view('online.online_profile', $datos);
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
        $validate = $this->validate(
                request(),
                [
                    'id' => 'required|numeric',
                    'name_online' => 'required|alpha_num',
                'Stream_down' => 'required|numeric',
                'Stream_up' => 'required|numeric',
                'tipo_producto' => 'required|',
                'ont_usuarios_id' => 'required|',
                'ID_estatus' => 'required|',
                'name_online' => 'required|alpha_num'
                ]
            );
            try {
            //code...
            if ($validate) {
                # code...
                //la solicitus que se hace se hace mediante request
                // $online_Profile= request()->all();
                $online_Profile = $request->except('_token'); //toma todos los valores excepto el token


                // if ($request->hasFile('foto')) {
                //     # code... si tuviera una foto o un documento
                //     $online_Profile['foto']= $request->file('foto')->store('uploads','public');
                // }
                // estamos haciendo que se almacene todo lo que se envia al metodo store
                online_profile::insert([
                    'id' => $request->id,
                    'name_online' => $request->name_online,
                    'Stream_down' => $request->Stream_down,
                    'Stream_up' => $request->Stream_up,
                    'tipo_producto' => $request->tipo_producto,
                    'ont_usuarios_id' => $request->ont_usuarios_id,
                    'ID_estatus' => $request->ID_estatus,
                    'created_at' => now()->toDateTime(),
                    'user_email_created' => Auth::user()->email,
                ]);
                // return response()->json($online_Profile);
                $respuesta['respuesta'] = array(
                    "title" => "Datos de ventas",
                    "msg" => "Estimado usuario, los datos de ventas se han creado exitosamente",
                    "ruta" => 'online',
                    "otros" => ""
                );
                return view('mensajes.satisfactorio', $respuesta);
            }
            } catch (\Throwable $th) {
                //throw $th;
            }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\online_Profile  $online_Profile
     * @return \Illuminate\Http\Response
     */
    public function show(online_Profile $online_Profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\online_Profile  $online_Profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $online_Profile = online_profile::findOrFail($id);
        $productactu = product::findOrFail($online_Profile->tipo_producto);
        $product =   product::all()->except($online_Profile->tipo_producto);
        $ont_tipo_srvactu = ont_tipo_srv::findOrFail($online_Profile->ont_usuarios_id);
        $ont_tipo_srv =   ont_tipo_srv::all()->except($online_Profile->ont_usuarios_id);
        $estatusactu = DB::select('SELECT id, "Estatus", descripcion FROM statuses where "Estatus" = ?', [$online_Profile->ID_estatus]);
        $estatusall = DB::select('SELECT id, "Estatus", descripcion FROM statuses where "Estatus" != ?', [$online_Profile->ID_estatus]);
        return view('online.edit', ['online_Profile' => $online_Profile, 'estatusactu' => $estatusactu, 'estatusall' =>$estatusall, 'productactu' => $productactu, 'product' =>$product, 'ont_tipo_srvactu' => $ont_tipo_srvactu, 'ont_tipo_srv' => $ont_tipo_srv]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\online_Profile  $online_Profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_online)
    {
        //
        $validate = $this->validate(
            request(),
            [
                'id' => 'required|numeric',
                'name_online' => 'required|alpha_num',
                'Stream_down' => 'required|numeric',
                'Stream_up' => 'required|numeric',
                'tipo_producto' => 'required|',
                'ont_usuarios_id' => 'required|',
                'ID_estatus' => 'required|',
                'name_online' => 'required|alpha_num'
            ]
        );
        try {
            //code...
            if ($validate) {
            $online_Profile = $request->except(['_token', '_method']); //toma todos los valores excepto el token
            online_profile::where('id', '=', $id_online)->update([
                'id' => $request->id,
                'name_online' => $request->name_online,
                'Stream_down' => $request->Stream_down,
                'Stream_up' => $request->Stream_up,
                'tipo_producto' => $request->tipo_producto,
                'ont_usuarios_id' => $request->ont_usuarios_id,
                'ID_estatus' => $request->ID_estatus,
                'updated_at' => now()->toDateTime(),
                    'user_email_updated' => Auth::user()->email,
            ]);
            $online_Profile = online_profile::findOrFail($id_online);
            // return response()->json($online_Profile);
            $respuesta['respuesta'] = array(
                "title" => "Datos de perfil de linea",
                "msg" => "Estimado usuario, los datos de perfil de linea se han modificado exitosamente",
                "ruta" => 'online',
                "otros" => ""
            );
            return view('mensajes.satisfactorio', $respuesta);
        }
        // return redirect();
        } catch (\Throwable $th) {
            //throw $th;
            $respuesta['respuesta'] = array(
                    "title" => "Creación de olt",
                    "msg" => "Estimado usuario, no se ha podido realizar la creación del perfil de linea, intente más tarde.",
                    "ruta" => 'online',
                    "otros" => ""
                );
            return view('mensajes.error', $respuesta);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\online_Profile  $online_Profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(online_Profile $online_Profile)
    {
        //
    }
    public function mostrar()
    {
        // //
        $datos['online_Profile'] = online_profile::paginate(5);
        // return view('serviceProfile.index', $datos);
        return view('online.form', $datos);
    }
}
