<?php

namespace App\Http\Controllers;

use App\Aliment;
use App\Recette;
use App\Unite;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{

    /**
     * Constructor. Specifiy the need to use the middleware auth for authentication.
     * Allow only authenticated user
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the page with 2 buttons
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("administration.index");
    }

    /**
     * Display the admin page of aliments
     * 
     * @return \Illuminate\Http\Response
     */
    public function indexAliments()
    {
        $aliments = Aliment::with('creator')->get();

        return view("administration.aliments.index", ['aliments' => $aliments]);
    }

    /**
     * Display the admin page of recettes
     * 
     * @return \Illuminate\Http\Response
     */
    public function indexRecettes()
    {
        $recettes = Recette::with('creator')->get();
        $aliments = Aliment::all();
        $unites = Unite::all();

        return view("administration.recettes.index", ['recettes' => $recettes, 'aliments' => $aliments, 'unites' => $unites]);
    }
}
