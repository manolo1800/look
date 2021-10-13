<?php

namespace App\Http\Controllers;

use App\coti;
use App\aptonombre;
use App\central;
use Illuminate\Http\Request;

class CotiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['aptonombre'] = aptonombre::all();
        $datos['central'] = central::all();
        return view('install.inter',$datos);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\coti  $coti
     * @return \Illuminate\Http\Response
     */
    public function show(coti $coti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\coti  $coti
     * @return \Illuminate\Http\Response
     */
    public function edit(coti $coti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\coti  $coti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coti $coti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\coti  $coti
     * @return \Illuminate\Http\Response
     */
    public function destroy(coti $coti)
    {
        //
    }
}
