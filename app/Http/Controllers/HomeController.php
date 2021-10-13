<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Collective\Remote\RemoteFacade;
use Collective\Remote\SecLibGateway;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $contents = SSH2::into('production')->getString('/hi.txt');


        return view('home');
    }
}
