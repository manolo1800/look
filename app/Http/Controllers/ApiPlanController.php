<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\plan;
use Illuminate\Http\Request;

class ApiPlanController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //para buscar un plan en especifico
        
        /*$name_plan = $request->name_plan;
        $velocidad_up = $request->velocidad_up;
        $velocidad_dow = $request->velocidad_dow;
        $perfil_id = $request->perfil_id;
        $status = $request->status;

        $plan = DB::table('plans')
            ->where([
                        ['name_plan','=',"$name_plan"],
                        ['velocidad_up','=',"$velocidad_up"],
                        ['velocidad_dow','=',"$velocidad_dow"],
                        ['perfil_id','=',"$perfil_id"],
                        ['status','=',"$status"]
                    ])
            ->limit(1)
            ->get();     
        
        return $plan;*/
        $plan = DB::table('plans')->get();     
        
        return $plan;
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(plan $plan)
    {
        //
    }
}
