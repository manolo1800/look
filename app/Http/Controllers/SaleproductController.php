<?php

namespace App\Http\Controllers;

use App\saleproduct;
use Illuminate\Http\Request;

class SaleproductController extends Controller
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
         if ($request->producto_1=='on') {
                # code...
                $request->producto_1 = true;
            }else {
                # code...
                $request->producto_1 = false;
                // return redirect('sales');
            }

        if ($request->producto_2 == 'on') {
            # code...
            $request->producto_2 = true;
        } else {
            # code...
            $request->producto_2 = false;
            // return redirect('sales');

        }
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\saleproduct  $saleproduct
     * @return \Illuminate\Http\Response
     */
    public function show(saleproduct $saleproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\saleproduct  $saleproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(saleproduct $saleproduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\saleproduct  $saleproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, saleproduct $saleproduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\saleproduct  $saleproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(saleproduct $saleproduct)
    {
        //
    }
}
