<?php

namespace App\Http\Controllers;

use App\traffic_config;
use Illuminate\Http\Request;

class TrafficConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('traffic_config.traffic_config');
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
        
        $validate = $this->validate(request(),
            [
                'nombre' => 'required|string|between:3,25',
                'cir' => 'required|numeric',
                'pir'=> 'required|numeric',
                
            ]
        );
       
        try
        {

        
            if($validate)
            {
                $traffic_config=$request->except('_token'); //toma todos los valores excepto el token
                if ($request->prioridad == null) {
                    $request->prioridad = false;
                }
                else
                {
                    $request->prioridad=true;
                }
                

                traffic_config::insert([
                    'nombre' => $request->nombre,
                    'cir' => $request->cir,
                    'cvs' => $request->cir*32+2000,
                    'pir' => $request->pir,
                    'pvs' => $request->pir*32+2000,
                    'prioridad' => $request->prioridad,
                    //'created_at' => now()->timestamp(),
                ]); 

                
                $respuesta['respuesta'] = array(
                    "title" => "configuracion de Trafico",
                    "msg" => "Estimado usuario, el trafico se ha configurado exitosamente",
                    "ruta" => "traffic_config",
                    "otros" => ""
                );
                return view('mensajes.satisfactorio', $respuesta);
            }
        }
        catch(\Exception $e )
        {
            $respuesta['respuesta'] = array(
                "title" => "configuracion de Trafico",
                "msg" => "Estimado usuario,no se ha podido realizar la configuracion el trafico, intente más tarde.",
                "ruta" => "traffic_config",
                "otros" => ""
            );
            return view('mensajes.error', $respuesta);
        }    
    }   


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\traffic_config  $traffic_config
     * @return \Illuminate\Http\Response
     */
    public function edit($idtraffic_config)
    {
        //
        $traffic_config=traffic_config::findOrFail($idtraffic_config);
        return view('traffic_config.edit', ['traffic_config' => $traffic_config]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\traffic_config  $traffic_config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idtraffic_config)
    {
        //
        $validate = $this->validate(request(),
            [
                'nombre' => 'required|string|between:3,25',
                'cir' => 'required|numeric',
                'pir'=> 'required|numeric',
                
            ]
        );
       
        try
        {

        
            if($validate)
            {
                $traffic_config=$request->except('_token', '_method'); //toma todos los valores excepto el token
                if ($request->prioridad == null) {
                    $request->prioridad = false;
                }
                else
                {
                    $request->prioridad=true;
                }
                

                traffic_config::where('id', '=', $idtraffic_config)->update([
                    'nombre' => $request->nombre,
                    'cir' => $request->cir,
                    'cvs' => $request->cir*32+2000,
                    'pir' => $request->pir,
                    'pvs' => $request->pir*32+2000,
                    'prioridad' => $request->prioridad,
                    //'created_at' => now()->timestamp(),
                ]); 


                $respuesta['respuesta'] = array(
                    "title" => "modificacion de Trafico",
                    "msg" => "Estimado usuario, el trafico se ha modificado exitosamente",
                    "ruta" => "traffic_configs",
                    "otros" => ""
                );
                return view('mensajes.satisfactorio', $respuesta);
            }
        }
        catch(\Exception $e )
        {
            $respuesta['respuesta'] = array(
                "title" => "configuracion de Trafico",
                "msg" => "Estimado usuario,no se ha podido realizar la configuracion el trafico, intente más tarde.",
                "ruta" => "traffic_configs",
                "otros" => ""
            );
            return view('mensajes.error', $respuesta);
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\traffic_config  $traffic_config
     * @return \Illuminate\Http\Response
     */
    public function destroy(traffic_config $traffic_config)
    {
        //
    }

    public function mostrar()
    {
        $datos['traffic_config']=traffic_config::paginate(5);
        return view('traffic_config.form',$datos);
    }
}
