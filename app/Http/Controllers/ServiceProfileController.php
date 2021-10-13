<?php

namespace App\Http\Controllers;

use App\service_profile;
use App\ont;
use App\status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ServiceProfileController extends Controller
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
        $datos['ont'] = ont::all();
        $datos['status'] = status::all()->except([3,4]);
        return view('service.service_profile',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('service.service_profile');
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
                'name_servicio' => 'required|string',
                'ont_id' => 'required',
                'modelo_ont' => 'required|string',
                'ID_estatus' => 'required',
                ]
            );
            try {
            //code...
            if ($validate) {
                //la solicitus que se hace se hace mediante request
                // $service_Profile= request()->all();
                $service_Profile = $request->except(['_token', 'status']); //toma todos los valores excepto el token


                // if ($request->hasFile('foto')) {
                //     # code... si tuviera una foto o un documento
                //     $service_Profile['foto']= $request->file('foto')->store('uploads','public');
                // }
                // estamos haciendo que se almacene todo lo que se envia al metodo store
                service_profile::insert([
                    'id' => $request->id,
                    'name_servicio' => $request->name_servicio,
                    'ont_id' => $request->ont_id,
                    'modelo_ont' => $request->modelo_ont,
                    'ID_estatus' => $request->ID_estatus,
                    'created_at' => now()->toDateTime(),
                    'user_email_created' => Auth::user()->email,
                ]);
                // return response()->json($service_Profile);
                $respuesta['respuesta'] = array(
                    "title" => "Creación de perfil de servicio",
                    "msg" => "Estimado usuario, el perfil de servicio se ha creado exitosamente",
                    "ruta" => 'service',
                    "otros" => ""
                );
                return view('mensajes.satisfactorio', $respuesta);
            }
            } catch (\Throwable $th) {
            //throw $th;
            $respuesta['respuesta'] = array(
                "title" =>
                "Creación de perfil de servicio",
                "msg" => "Estimado usuario, no se ha podido realizar la creación del perfil de servicio, intente más tarde.",
                "ruta" => 'service',
                "otros" => ""
            );
            return view('mensajes.error', $respuesta);
            }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\service_Profile  $service_Profile
     * @return \Illuminate\Http\Response
     */
    public function show(service_Profile $service_Profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\service_Profile  $service_Profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id_servicio)
    {
        //
        $service_Profile = service_profile::findOrFail($id_servicio);
        $ont = ont::findOrFail($service_Profile->ont_id);
        $datos =   ont::all()->except($service_Profile->ont_id);
        $estatusactu = DB::select('SELECT id, "Estatus", descripcion FROM statuses where "Estatus" = ?', [$service_Profile->ID_estatus]);
        $estatusall = DB::select('SELECT id, "Estatus", descripcion FROM statuses where "Estatus" != ?', [$service_Profile->ID_estatus]);
        return view('service.edita',['service_Profile'=>$service_Profile, 'ontactu' => $ont, 'ont' => $datos, 'estatusactu' => $estatusactu, 'estatusall' => $estatusall]);
        // return response()->json($service_Profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\service_Profile  $service_Profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_servicio)
    {
        //
        $service_Profile = $request->except(['_token', '_method']); //toma todos los valores excepto el token
        service_profile::where('id', '=', $id_servicio)->update([
            'id' => $request->id,
            'name_servicio' => $request->name_servicio,
            'ont_id' => $request->ont_id,
            'modelo_ont' => $request->modelo_ont,
            'ID_estatus' => $request->ID_estatus,
            'updated_at' => now()->toDateTime(),
            'user_email_updated' => Auth::user()->email,
        ]);
        $service_Profile = service_profile::findOrFail($id_servicio);
        // return response()->json($service_Profile);
        $respuesta['respuesta'] = array(
            "title" => "Creación de perfil de servicio",
            "msg" => "Estimado usuario, el perfil de servicio se ha modificado exitosamente",
            "ruta" => 'service',
            "otros" => ""
        );
        return view('mensajes.satisfactorio', $respuesta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\service_Profile  $service_Profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_servicio)
    {
        //
        service_profile::destroy($id_servicio);
        return redirect('service');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrar()
    {
        // //
        $datos['service_Profile'] = service_profile::paginate(5);
        // return view('service_Profile.index', $datos);
        return view('service.form', $datos);
    }
}
