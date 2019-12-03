<?php

namespace App\Http\Controllers;

use App\Aliment;
use App\Recette;
use App\Unite;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $aliments = Aliment::with('creator')->get();
        $recettes = Recette::with('creator')->get();

        return view("administration.index", ['aliments' => $aliments, 'recettes' => $recettes]);
    }

    public function indexAliments()
    {
        $aliments = Aliment::with('creator')->get();

        return view("administration.aliments.index", ['aliments' => $aliments]);
    }

    public function indexRecettes()
    {
        $recettes = Recette::with('creator')->get();
        $aliments = Aliment::all();
        $unites = Unite::all();

        return view("administration.recettes.index", ['recettes' => $recettes, 'aliments' => $aliments, 'unites' => $unites]);
    }
}
