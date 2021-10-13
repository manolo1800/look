<?php

namespace App\Http\Controllers;

use App\plan;
use App\online_profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return plan::all();
        $datos['onlineProfile'] = online_profile::all();
        return view('planes.planes', $datos);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function todos()
    {
        //
        return plan::all();
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
                'Nombre_plan' => 'required|between:3,25',
                'Stream_up' => 'required|numeric',
                'Stream_down' => 'required|numeric',
                // 'perfil_id' => 'required|numeric',
                'status' => 'required',
            ]
        );
        try {
            //code...
            if ($validate) {
                # code...
                plan::insert([
                    'Nombre_plan' => $request->Nombre_plan,
                    'Stream_up' => $request->Stream_up,
                    'Stream_down' => $request->Stream_down,
                    // 'perfil_id' => $request->perfil_id,
                    'status' => $request->status,
                    'ID_inboundtraffic' => 23,
                    'ID_outboundtraffic' => 23,
                    // 'created_at' => now()->toDateTime(),
                    // 'user_email_created' => Auth::user()->email,
                ]);
                $respuesta['respuesta'] = array(
                    "title" => "Creación de plan",
                    "msg" => "Estimado usuario,el plan se ha creado exitosamente",
                    "ruta" => 'planes',
                    "otros" => ""
                );
                return view('mensajes.satisfactorio', $respuesta);
            }
        } catch (\Throwable $th) {
            //throw $th;
            $respuesta['respuesta'] = array(
                    "title" => "Creación de plan",
                    "msg" => "Estimado usuario, no se ha podido realizar la creación del plan, intente más tarde.",
                    "ruta" => 'planes',
                    "otros" => ""
                );
            return view('mensajes.error', $respuesta);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(plan $plan)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit($idplan)
    {
        // //
        $plan = plan::findOrFail($idplan);
        $onlineProfile = online_profile::findOrFail($plan->perfil_id);
        $datos =   online_profile::all()->except($plan->perfil_id);
        // return view('aprovicion.edit')->with('olt',$olt)->with('central',$central);
        return view('planes.edit', ['plan'=> $plan, 'onlineProfile' => $onlineProfile, 'onlineProfiles' =>$datos ]);
        // return response()->json($plan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idplan)
    {
        //
        $planes = $request->except(['_token', '_method']); //toma todos los valores excepto el token
        plan::where('id', '=', $idplan)->update([
            'name_plan' => $request->name_plan,
            'velocidad_up' => $request->velocidad_up,
            'velocidad_dow' => $request->velocidad_dow,
            // 'perfil_id' => $request->perfil_id,
            'status' => $request->status,
            'updated_at' => now()->toDateTime(),
            'user_email_updated' => Auth::user()->email,
        ]);
        $online_Profile = online_profile::findOrFail($idplan);
        // return response()->json($online_Profile);
        $respuesta['respuesta'] = array(
            "title" => "Datos de ventas",
            "msg" => "Estimado usuario, el plan se han modificado exitosamente",
            "ruta" => 'online',
            "otros" => ""
        );
        return view('mensajes.satisfactorio', $respuesta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(plan $plan)
    {
        //
    }
    public function mostrar()
    {
        // //
        $datos['plan'] = plan::paginate(5);
        // return view('service_Profile.index', $datos);
        return view('planes.form', $datos);
    }


}
