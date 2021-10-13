<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\plan;
use App\Models\online_Profile;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
class apiPlan extends Controller
{
    //
    public function index()
    {
        //
        return plan::all();

    }

    public function store(Request $request)
    {
        //
        $product = DB::select('SELECT * FROM plans where id = ? ', [$request->id]);
        return $product;
    }
}
