<?php

namespace App\Http\Controllers;

use App\Aliment;
use App\Recette;
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
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $aliments = Aliment::all();
        return view("home", ['aliments' => $aliments]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRecetteFromAliments(Request $request)
    {
        $path = explode("/", $request->path());
        $ids = explode(",", end($path));

        $recipes = Recette::getRecetteContainingAliments($ids);

        return response()->json($recipes);
    }
}
