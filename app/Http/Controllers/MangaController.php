<?php

namespace App\Http\Controllers;
use App\Manga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('manga.manga');
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
    {$request->validate([
        'previo'=>'required',
        'previo2'=>'required',
        'nombre'=>'required',
        'perdida'=>'required',
        'cable'=>'required',
        'cantidad'=>'required',

    ]);

    Manga::insert([

        // 'previo2' => $request->previo2,
        'mangas' => $request->nombre,
        'perdida' => $request->perdida,
        'cable' => $request->cable,
        'cantidad' => $request->cantidad,        
        'created_at' => now()->toDateTime(),
        'user_email_created' => Auth::user()->email,
    ]);

    $respuesta['respuesta'] = array(
        "title" => "Creación de manga",
        "msg" => "Estimado usuario, La manga " .$request->nombre. " se ha creado exitosamente",
        "ruta" => "manga",
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
    public function edit($id)
    {
        //
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
        $mangas = Manga::paginate(5);
        return $mangas;
        //
    }
}
