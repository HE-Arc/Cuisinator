<?php

namespace App\Http\Controllers;

use App\Aliment;
use Illuminate\Http\Request;

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
        $aliments = Aliment::all();
        return view("recettes.index", ['aliments' => $aliments]);
    }
}
