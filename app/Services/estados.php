<?php

namespace App\Services;

use App\Models\sale;
use App\Models\estado;
use App\Models\central;

use App\Models\municipio;
use App\Models\parroquia;
use App\Models\urbanizacion;
use App\Models\ciudad;
use Illuminate\Http\Request;

class estados
{
    public function getEstados(){
        $estados = estado::get();
        $estadosArray[''] = 'Seleccione un estado';
        foreach ($estados as $estado){
            # code...
            $estadosArray[$estado->id] = $estado->estado;
        }
        return $estadosArray;
    }
    // public function central(){
    //     $central = central::get();
    //     $centralArray[''] = 'Seleccione';
    //     foreach ($central as $central){
    //         # code...
    //         $centralArray[$central->id] = $central->name_central;
    //     }
    //     return $centralArray;
    // }


    public function getCentral(){
        $central = central::get();
        $centralArray[''] = 'Seleccione';
        foreach ($central as $central){
            # code...
            $centralArray[$central->id] = $central->name_central;
        }
        return $centralArray;
    }
}
