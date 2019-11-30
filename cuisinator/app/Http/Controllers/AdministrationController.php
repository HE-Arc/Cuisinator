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
        $aliments = Aliment::allWithCreatorName();
        $recettes = Recette::allWithCreatorName();

        return view("administration.index", ['aliments' => $aliments, 'recettes' => $recettes]);
    }

    public function indexAliments()
    {
        $aliments = Aliment::allWithCreatorName();

        return view("administration.aliments.index", ['aliments' => $aliments]);
    }

    public function indexRecettes()
    {
        $recettes = Recette::allWithCreatorName();
        $aliments = Aliment::all();
        $unites = Unite::all();

        return view("administration.recettes.index", ['recettes' => $recettes, 'aliments' => $aliments, 'unites' => $unites]);
    }
}
