<?php

namespace App\Services;

use App\Models\sale;
use App\Models\estado;
use App\Models\sfp;
use App\Models\parroquia;
use App\Models\urbanizacion;
use App\Models\ciudad;
use Illuminate\Http\Request;

class estados
{
    public function getEstados()
    {
        $sfps = sfp::get();
        // $estadosArray[''] = 'Seleccione un estado';
        // foreach ($estados as $estado) {
        //     # code...
        //     $estadosArray[$estado->id] = $estado->estado;
        // }
        return $sfps;
    }
}
