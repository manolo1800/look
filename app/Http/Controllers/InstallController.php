<?php

namespace App\Http\Controllers;

use App\install;
use App\central;
use App\aptonombre;
use Illuminate\Http\Request;

class InstallController extends Controller
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
        $datos['central'] = central::paginate(5);
        return view('install.install',$datos);
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
        $validate= request()->validate([
            'central_id' => 'required',
            'urbanizacion' => 'required',
            'destino' => 'required',
            'grados_la' => 'required|numeric',
            'dirección_la' => 'required',
            'grados_lo' => 'required|numeric',
            'dirección_lo' => 'required',
            'rack_olt' => 'required|alpha_num',
            'olt' => 'required|alpha_num|between:3,25',
            'frame_p_olt' => 'required',
            'slot_olt' => 'required',
            'puerto_olt' => 'required',
            'fibra' => 'required',
            'hilo' => 'required',
            'buffer' => 'required',
            'manga' => 'required',
            'fxb_term' => 'required',
            'Cantidad_FXB' => 'required',
            'cant_mbx_terminal' => 'required',

            // 'rack_odfpe' => 'required',
            // 'odfpe' => 'required',
            // 'bandeja_odfpe' => 'required',
            // 'pos_odfpe' => 'required',
        ]);
        if ($validate) {
                # code...
            $install = $request->except('_token'); //toma todos los valores excepto el token
            // estamos haciendo que se almacene todo lo que se envia al metodo store
            install::insert([
                'central_id' =>  $request->central_id,
                'urbanizacion' => $request->urbanizacion,
                'destino' => $request->destino,
                'grados_la' => $request->grados_la,
                'dirección_la' => $request->dirección_la,
                'grados_lo' => $request->grados_lo,
                'dirección_lo' => $request->dirección_lo,
                'rack_olt' => $request->rack_olt,
                'olt' => $request->olt,
                'frame_p_olt' => $request->frame_p_olt,
                'slot_olt' => $request->slot_olt,
                'puerto_olt' => $request->puerto_olt,
                'fibra' => $request->fibra,
                'hilo' => $request->hilo,
                'buffer' => $request->buffer,
                'manga' => $request->manga,
                'fxb_term' => $request->fxb_term,
                'Cantidad_FXB' => $request->Cantidad_FXB,
                'cant_mbx_terminal' => $request->cant_mbx_terminal,
                'rack_odfpe' => $request->rack_odfpe,
                'odfpe' =>  $request->odfpe,
                'bandeja_odfpe' => $request->bandeja_odfpe,
                'pos_odfpe' => $request->pos_odfpe,
                'gdp' => $request->gdp,
                'mfs' => $request->mfs,
                'gds' => $request->gds,
                'rack_odfin' => $request->rack_odfin,
                'odfin' => $request->odfin,
                'bandeja_odfin' => $request->bandeja_odfin,
                'pos_odfin' =>  $request->pos_odfin,
                'rack_odfout' => $request->rack_odfout,
                'odfout' => $request->odfout,
                'bandeja_odfout' => $request->bandeja_odfout,
                'pos_odfout' => $request->pos_odfout,
                'feeder' => $request->feeder,

            ]);
            $ultimoId = install::latest('id')->first()->id;
            // return response()->json($serviceProfile);
            for ($i = 0; $i < $request->cant_mbx_terminal; $i++) {
                # code...
                $casa = 'casa_' . $i;
                $nombre = 'Nombre_' . $i;
                aptonombre::insert([
                    'aptoCas' =>  $request->$casa,
                    'nombre' =>$request->$nombre,
                    'id_install' => $ultimoId,
                ]);
            }
            $respuesta['respuesta'] = array(
                "title" => "Datos de instalación",
                "msg" => "Estimado usuario, los datos de instalación se han creado exitosamente",
                "ruta" => 'install',
                "otros" => ""
            );
            return view('mensajes.satisfactorio', $respuesta);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\install  $install
     * @return \Illuminate\Http\Response
     */
    public function show(install $install)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\install  $install
     * @return \Illuminate\Http\Response
     */
    public function edit( $idinstall)
    {
        //
        $install = install::findOrFail($idinstall);
        $central = central::findOrFail($install->central_id);
        $datos =   central::all()->except($install->central_id);
        // return view('aprovicion.edit')->with('olt',$olt)->with('central',$central);
        return view('install.edit', ['install' => $install, 'central' => $central, 'centrales' => $datos]);
        // return response()->json($datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\install  $install
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idinstall)
    {
        //
        //
        $install = $request->except(['_token', '_method']); //toma todos los valores excepto el token
        install::where('id', '=', $idinstall)->update($install);
        $install = install::findOrFail($idinstall);
        // return response()->json($install);
        $respuesta['respuesta'] = array(
            "title" => "Datos de instalación",
            "msg" => "Estimado usuario, los datos de instalación se han modificado exitosamente",
            "ruta" => 'install',
            "otros" => ""
        );
        return view('mensajes.satisfactorio', $respuesta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\install  $install
     * @return \Illuminate\Http\Response
     */
    public function destroy(install $install)
    {
        //
    }
    public function mostrar()
    {
        // //
        $datos['install'] = install::paginate(5);
        // return view('service_Profile.index', $datos);
        return view('install.form', $datos);
    }
}
