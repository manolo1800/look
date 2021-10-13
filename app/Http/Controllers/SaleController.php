<?php

namespace App\Http\Controllers;

use App\sale;
use App\zona_sale;
use App\saleEquipo;
use App\saleproduct;
use App\saleplan;
use App\municipio;
use App\parroquia;
use App\urbanizacion;
use App\ciudad;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SaleController extends Controller
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

        return view('sales.sales');
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
        $productSales = new SaleproductController;
        $planSales = new SaleplanController;

        $productSales = $productSales->store($request);

        $planSales = $planSales->store($request);


            # code...
            $validate = request()->validate([
                'estado_id' => 'required|numeric',
                'ciudad_id' => 'required|numeric',
                'municipio_id' => 'required|numeric',
                'parroquia_id' => 'required|numeric',
                'urbanizacion_id' => 'required|numeric',
                // 'prefijo_ced' => 'required',
                // 'cedula' => 'required|numeric',
                // 'nombres' => 'required|alpha_num|between:1,25',
                // 'apellidos' => 'required|alpha_num|between:1,25',
                // 'prefijo_tlf_contacto' => 'required|numeric',
                // 'tlf_contacto' => 'required|numeric',
                // 'prefijo_tlf_movil' => 'required|numeric',
                // 'tlf_movil' => 'required|numeric',
                // 'correo_electronico' => 'required|email',
                // 'usuario' => 'required|alpha_num|between:1,25',
                // 'contrasena' => 'required|alpha_num|between:1,25',
                'num_Serial' => 'required|alpha_num|between:1,25',
                'model_Product' => 'required|alpha_num|between:1,25',




            'numero_client' => 'required|numeric',
            'zona_p_client' => 'required|numeric',
            'estado_client' => 'required|alpha_num|between:1,25',
            'municipo_client' => 'required|alpha_num|between:1,25',
            // 'Urbanizacion_client' => 'required|alpha_num|between:1,25',
            'inmueble_client' => 'required|alpha_num|between:1,25',
            // 'ubicacion_client' => 'required|alpha_num|between:1,25',
            // 'nombre_vivi_client' => 'required|alpha_num|between:1,25',
            // 'ciudad_client' => 'required|alpha_num|between:1,25',
            // 'parroquia_client' => 'required|alpha_num|between:1,25',
            // 'name_inmueble_client' => 'required|alpha_num|between:1,25',
            // 'Apto_client' => 'required|alpha_num|between:1,25',
            // 'calle_client' => 'required|alpha_num|between:1,25',
            // 'tipo_vivi_client' => 'required|alpha_num|between:1,25',
            ]);

            // if ($validate) {
            // # code...
            // $sale = $request->except('_token', 'confirm_contrasena'); //toma todos los valores excepto el token
            // return response()->json($sale);
            // }


        // $client = new Client([
        //     //url de base con la que se hace la peticion
        //             'base_uri' => 'https://10.2.36.179/api/',
        //             //tiempo de espera para conectar a la api
        //             'timeout'  => 5.0,
        //             ]
        // );
        // $response = $client->request('POST', "clientes?national_id=V011111111", ['verify' => false]);
        // $respon = explode('":', $response->getBody()->getContents());
        // for ($i = 0; $i = 35; $i++) {
        //     # code...
        //     echo ($respon[$i]);
        // }
        // dd(json_decode($response->getBody()->getContents()));
// $respon=json_decode($response->getBody()->getContents('clie_id'));
// $respon = compact($response);
// dd( $respon);

// $respon->getBody()->getContents();

// $otro = explode(',', $respon->count());
// dd($respon);
// dd($response->getBody()->getContents());




// dd($response->getBody()->getContents());



        // if ($validate) {
            # code...
            if ($validate) {
            # code...

            // $sale = $request->except('_token', 'confirm_contrasena'); //toma todos los valores excepto el token
            // //         // estamos haciendo que se almacene todo lo que se envia al metodo store
            // // // sale::insert($sale); RETURNING id_aplicacion;


        // bueno funciona
                    sale::insert([
                        'prefijo_ced' => $request->prefijo_ced,
                        'cedula' => $request->cedula,
                        'nombres' => $request->nombres,
                        'apellidos' => $request->apellidos,
                        'prefijo_tlf_contacto' => $request->prefijo_tlf_contacto,
                        'prefijo_tlf_movil' => $request->prefijo_tlf_movil,
                        'tlf_contacto' => $request->tlf_contacto,
                        'tlf_movil' => $request->tlf_movil,
                        'correo_electronico' => $request->correo_electronico,
                        'usuario' => $request->usuario,
                        'contrasena' => $request->contrasena,
                        'numero_client' =>$request->numero_client,
                        'zona_p_client'=> $request->zona_p_client,
                        'estado_client' =>$request->estado_client,
                        'municipo_client' =>$request->municipo_client,
                        'Urbanizacion_client'=>$request->Urbanizacion_client,
                        'inmueble_client'=> $request->inmueble_client,
                        'ubicacion_client' =>$request->ubicacion_client,
                        'nombre_vivi_client' =>$request->nombre_vivi_client,
                        'ciudad_client'=> $request->ciudad_client,
                        'parroquia_client'=>$request->parroquia_client,
                        'name_inmueble_client'=>$request->name_inmueble_client,
                        'Apto_client'=> $request->Apto_client,
                        'calle_client' =>$request->calle_client,
                        'tipo_vivi_client'=>$request->tipo_vivi_client,

                    ]);
                    $ultimoId = sale::latest('id')->first()->id;

                    zona_sale::insert( [
                        'sales_id'=> $ultimoId,
                        'estado_id' => $request->estado_id,
                        'ciudad_id' => $request->ciudad_id,
                        'municipio_id' => $request->municipio_id,
                        'parroquia_id' => $request->parroquia_id,
                        'urbanizacion_id' => $request->urbanizacion_id,
                    ]);

                    saleplan::insert([
                        'sales_id' => $ultimoId,
                        'plan_1' => $planSales->plan_1,
                        'plan_2' => $planSales->plan_2,

                    ]);

                    saleproduct::insert([
                        'sales_id' => $ultimoId,
                        'producto_1' => $productSales->producto_1,
                        'producto_2' => $productSales->producto_2,
                    ]);

                    saleEquipo::insert([
                        'sales_id' => $ultimoId,
                        'num_Serial' => $request->num_Serial,
                        'model_Product' => $request->model_Product
                    ]);





                    // return response()->json($serviceProfile);
                    $respuesta['respuesta'] = array(
                        "title" => "Datos de ventas",
                        "msg" => "Estimado usuario, los datos de ventas se han creado exitosamente",
                        "ruta" => 'sales',
                        "otros" => ""
                    );
                    return view('mensajes.satisfactorio', $respuesta);
        // hasta aqui


            // }
        }
        // return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(sale $sale)
    {
        //
    }

     public function getCiudad(Request $request)
    {
        //
        if ($request->ajax()) {
            # code...
            $ciudades =  ciudad::where('estado_id', $request->estado_id)->get();

            foreach ($ciudades as $ciudad) {
                # code...
                $ciudadArray[$ciudad->id] = $ciudad->ciudad;
            }
            return response()->json($ciudadArray);
        }
    }

    public function getMunicipio(Request $request)
    {
        //
        if ($request->ajax()) {
            # code...
            $municipios =  municipio::where('ciudad_id', $request->ciudad_id)->get();

            foreach ($municipios as $municipio) {
                # code...
                $municipioArray[$municipio->id] = $municipio->municipio;
            }
            return response()->json($municipioArray);
        }
    }
    public function getParroquia(Request $request)
    {
        //
        if ($request->ajax()) {
            # code...
            $parroquias =  parroquia::where('municipio_id', $request->municipio_id)->get();

            foreach ($parroquias as $parroquia) {
                # code...
                $parroquiaArray[$parroquia->id] = $parroquia->parroquia;
            }
            return response()->json($parroquiaArray);
        }
    }
    public function getUrbanizacion(Request $request)
    {
        //
        if ($request->ajax()) {
            # code...
            $urbanizacions =  urbanizacion::where('parroquia_id', $request->parroquia_id)->get();

            foreach ($urbanizacions as $urbanizacion) {
                # code...
                $urbanizacionArray[$urbanizacion->id] = $urbanizacion->urbanizacion;
            }
            return response()->json($urbanizacionArray);
        }
    }

}
