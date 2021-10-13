<?php

namespace App\Http\Controllers;

use App\saleplan;
use Illuminate\Http\Request;

class SaleplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        if ($request->plan_1 == 'on') {
            # code...
            $request->plan_1 = true;
        } else {
            # code...
            $request->plan_1 = false;
            // return redirect('sales');
        }

        if ($request->plan_2 == 'on') {
            # code...
            $request->plan_2 = true;
        } else {
            # code...
            $request->plan_2 = false;
            // return redirect('sales');

        }

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\saleplan  $saleplan
     * @return \Illuminate\Http\Response
     */
    public function show(saleplan $saleplan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\saleplan  $saleplan
     * @return \Illuminate\Http\Response
     */
    public function edit(saleplan $saleplan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\saleplan  $saleplan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, saleplan $saleplan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\saleplan  $saleplan
     * @return \Illuminate\Http\Response
     */
    public function destroy(saleplan $saleplan)
    {
        //
    }
}
