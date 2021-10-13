<?php

namespace App\Http\Controllers;

use App\config_card;
use App\puertos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class config_cardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $puertos = puertos::get();
        return view('config_card.config_card',compact('puertos'));
    }

    public function store(Request $request)
    {   
        
        //validacion de los datos mandados desde la vista config_target.blade.php
        $validate = $request->validate([            
                'nombre_tarjeta' => 'required|string|between:3,25',// ['required', new ContrasenaFuerte]
                'tipo_target' => 'required|string|between:3,25',
                'cant_puertos'=> 'required'
            ]);
        //  return $validate;
       
        try
        {
            if ($validate) 
            {
                //si la validacion es correcta se insertan los datos en la tabla config_card
                $target_port = $request->except('_token'); //toma todos los valores excepto el token
                config_card::insert([
                        'nombre_tarjeta' => $request->nombre_tarjeta,
                        'tipo_target' => $request->tipo_target,
                        'cant_puertos' => $request->cant_puertos,
                ]);
                
                $respuesta['respuesta'] = array(
                    "title" => "configuracion de Tarjeta",
                    "msg" => "Estimado usuario, la Tarjeta ". $request->nombre_tarjeta . " se ha configurado exitosamente",
                    "ruta" => "config_card",
                    "otros" => ""
                );
                return view('mensajes.satisfactorio', $respuesta);
            }
        }
        catch(\Exception $e )
        {   
            $respuesta['respuesta'] = array(
                "title" => "configuracion de Tarjeta",
                "msg" => "Estimado usuario, no se ha podido realizar la configuracion de Tarjeta, intente más tarde.",
                "ruta" => "config_card",
                "otros" => ""
            );
            return view('mensajes.error', $respuesta);
        }
    }

    public function edit($id_configCard)
    {
        $config_card=config_card::findOrFail($id_configCard);
        return view('config_card.edit',[ 'config_card' => $config_card]);
    }

    public function update(Request $request, $id_configcard)
    {
        

        $validate = $this->validate(request(),
            [
                'nombre_tarjeta' => 'required|string|between:3,25',
                'tipo_target' => 'required|string|between:3,25',
                'cant_puertos'=> 'required',
            ]
        );
        try
        {
            if ($validate) 
            {
               


                $config_card= $request->except(['_token', '_method']); //toma todos los valores excepto el token
                config_card::where('id', '=', $id_configcard)->update([
                    'nombre_tarjeta' => $request->nombre_tarjeta,
                    'tipo_target' => $request->tipo_target,
                    'cant_puertos' => $request->cant_puertos,
                ]);
                $config_card= config_card::findOrFail($id_configcard);
            }
            $respuesta['respuesta'] = array(
                "title" => " modificacion de Tarjeta",
                "msg" => "Estimado usuario, la Tarjeta se ha modificado exitosamente",
                "ruta" => "config_cards",
                "otros" => ""
            );
            return view('mensajes.satisfactorio', $respuesta);
        }    
        catch(\Exception $e)
        {
            $respuesta['respuesta'] = array(
                "title" => "modificacion de Tarjeta",
                "msg" => "Estimado usuario, no se ha podido realizar la modificacion de Tarjeta, intente más tarde.",
                "ruta" => "config_cards",
                "otros" => ""
            );
            return view('mensajes.error', $respuesta);
        }    
    }

    public function mostrar()
    {
        $datos['config_card'] = config_card::paginate(10);
        // return view('service_Profile.index', $datos);
        return view('config_card.form', $datos);
    }
}
