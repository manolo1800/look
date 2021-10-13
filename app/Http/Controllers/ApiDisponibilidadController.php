<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiDisponibilidadController extends Controller
{
    
    
    public function store(Request $request)
    {
        
        
        //funciones
        function noDisponible()
        {
            return "no hay diponibilidad";
        }


        //datos de direccion
        $estado_id = $request->estado_id;
        $ciudad_id = $request->ciudad_id;
        $municipio_id= $request->municipio_id;
        $parroquia_id= $request->parroquia_id;
        
        //obtener central
        $central=DB::table('centrals')
            ->select('id')
            ->where
                ([
                    ['estado_id','=',"$estado_id"],
                    ['ciudad_id','=',"$ciudad_id"],
                    ['municipio_id','=',"$municipio_id"],
                    ['parroquia_id','=',"$parroquia_id"],
                ])
            ->limit(1)
            ->get()
        ;
        
        $id_array= json_decode($central,true);
        
        $id=$id_array[0]['id'];
        
        //comprobacion de existencia de la central

        if(isset($id))
        { 
        
            //buscar instalacion
            $install=DB::table('installs')
            ->select('installs.id','frame_p_olt','slot_olt','puerto_olt','central_id')
            ->join('centrals','central_id','=','centrals.id')
            ->where('installs.central_id',$id)
            ->limit(1)
            ->get();

            $id_insta= json_decode($install,true);

            //comprobacion puerto instalado
            if(isset($id_insta[0]['puerto_olt']))
            {
                
                $puerto_olt=$id_insta[0]['puerto_olt'];

                //obtener olt
                $olt=DB::table('olts')
                ->select('id','ip_olt','Frame_bandeja')
                ->where('central_id',$id_insta[0]['central_id'])
                ->limit(1)
                ->get();
                
                $olt_array=json_decode($olt,true);

                //obtener tarjeta
                $target_ports=DB::table('target_ports')
                ->where('olt_id','=',$olt_array[0]['id'])
                ->get();
                
                $tp=json_decode($target_ports,true);

                //obtener puertos de servicio

                $puertos= DB::table('puertos')
                ->where('id_targetPort',$tp[0]['id'])
                ->get();

                //comprobacion de puerto disponible
                
                
                $return=array(
                    'central'=>$central,
                    'install'=>$install,
                    'olt'=>$olt,
                    'target_ports'=>$target_ports,
                    'puertos'=>$puertos
                );

                return $return;
            }
            else
            {
                echo noDisponible();
            }

        }
        else
        {
            echo noDisponible();
        }
        
        
        

        

        

    }

}
