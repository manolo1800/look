<?php

namespace App\Http\Controllers;

use App\zona_sale;
use Illuminate\Http\Request;

class ZonaSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //
        $this->store($request);
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
        $validate = request()->validate([
            'estado_id' => 'required|numeric',
            'ciudad_id' => 'required|numeric',
            'municipio_id' => 'required|numeric',
            'parroquia_id' => 'required|numeric',
            'urbanizacion_id' => 'required|numeric'
        ]);
       return $validate;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\zona_sale  $zona_sale
     * @return \Illuminate\Http\Response
     */
    public function show(zona_sale $zona_sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\zona_sale  $zona_sale
     * @return \Illuminate\Http\Response
     */
    public function edit(zona_sale $zona_sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\zona_sale  $zona_sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, zona_sale $zona_sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\zona_sale  $zona_sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(zona_sale $zona_sale)
    {
        //
    }
}
