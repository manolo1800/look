<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Splitter;

class SplitterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('splitter.splitter');
        //
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
        $request->validate([
            //'previo'=>'required',
            'splitter'=>'required',
            'buffer'=>'required',
            'nivelDivision'=>'required',
            'capacidad'=>'required',
            'perdida'=>'required',
            'longitud1'=>'required',
            'latitud1'=>'required',
    
        ]);
        
    
        Splitter::insert([
    
            
            'splitter' => $request->nombre,
            'buffer' => $request->buffer,
            'nivelDivision'=>'required',
            'capacidad' => $request->capacidad,
            'perdida' => $request->perdida,
            'capacidad' => $request->capacidad,     
            'longitud' => $request->longitud1,        
            'latitud' => $request->latitud1,      
            'created_at' => now()->toDateTime(),
            'user_email_created' => Auth::user()->email,
        ]);
    
        $respuesta['respuesta'] = array(
            "title" => "Creación de splitter",
            "msg" => "Estimado usuario, el splitter " .$request->nombre. " se ha creado exitosamente",
            "ruta" => "splitter",
            "otros" => ""
        );
    
        return view('mensajes.satisfactorio', $respuesta);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_splitter)
    {
        //
        
        $splitter=Splitter::findOrFail($id_splitter);
        return view('splitter.edit',['splitter'=>$splitter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function mostrar()
    {
        $splitters = Splitter::paginate(5);
        return view('splitter.form',['splitters'=>$splitters]);
        //
    }

    public function mostrar2(Request $request)
    {
        $splitter2 = Splitter::where("id","=",$request->id)
        ->get();
        return json_encode($splitter2);
        //
    // return $request->id;
    }
}
