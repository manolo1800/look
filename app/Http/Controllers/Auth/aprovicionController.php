<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rule;

class aprovicionController extends Controller
{

    public function index(){

        return view('aprovicion');
    }


        public function store(){

            request()->validate(
               ['Central'=>'required|alpha_num|between:3,5',
                'Ipolt'=>'required|ip',
                'Nombreolt'=>'required|alpha|between:3,25',
                'Proveedorolt'=>'required|alpha_num|between:3,25',
                'Puerto_inicial'=>'required|digits:5',
                'Puerto_servicio'=>'required|digits:5',
                ]);
        }


     public function index1()
    {
        return view('central');
    }

    public function store1(){

        request()->validate(
           ['ip_agrega'=>'required|ip',
            'Cod_central'=>'required',
            'name_central'=>'required|alpha_num|between:3,25'
            ]);

    }

    public function index2()
    {
        return view('cards_ports');
    }
    public function store2(){

        request()->validate(
           ['Ipolt'=>'required|ip',
            'Ranura'=>'required|digits:2',
            'name_tarjeta'=>'required|alpha_num|between:3,25',
            'vpi'=>'required|digits:4',
            'vlan'=>'required|digits:3',
            'port_ini'=>'required|digits:3',
            'can_ports'=>'required|digits:3',
            'onts'=>'required|digits:3',
            'lan_ini'=>'required|digits:5',
            ]);

    }


    public function index3()
    {
        return view('online_profile');
    }

    public function store3(){
        request()->validate([
            'id_linea'=>'required|numeric',
            'name_linea'=>'required|alpha_num'
        ]);
    }



    public function index4()
    {
        return view('install');
    }



    public function store4(){
        $opcion = (empty($_POST['opcion'])) ? null : $_POST['opcion'];
        if ($opcion == "buscar2") { //busca la pregunta numero 2
            return response()->json('este');
        }
    }




    public function index5()
    {
        return view('sales');
    }

    public function store5(){

        request()->validate(
           ['Estado'=>'required',
            'Ciudad'=>'required',
            'Municipio'=>'required',
            'Parroquia'=>'required',
            'Urbanizacion'=>'required',
            ]);

    }
    public function index6()
    {
        return view('service_profile');
    }

    public function store6(){
        request()->validate([
            'id'=>'required|numeric',
            'name_servicio'=>'required',
        ]);
    }



  /*   public function index7()
    {
        return view('datos');
    }

    public function store7(){
        request()->validate([
            'serial'=>'required|numeric',
            'modelo'=>'required',
        ]);
    } */
}
