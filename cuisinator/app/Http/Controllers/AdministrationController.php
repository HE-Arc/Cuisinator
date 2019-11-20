<?php

namespace App\Http\Controllers;

use App\Aliment;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $aliments = Aliment::all();
        return view("administration.index", ['aliments' => $aliments]);
    }
}
