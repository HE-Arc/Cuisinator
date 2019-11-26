<?php

namespace App\Http\Controllers;

use App\Aliment;
use App\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecettesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $aliments = Aliment::all();
        return view("recettes.index", ['aliments' => $aliments]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function show(Recette $recette)
    {
        //
        return view("recettes.show", [
            'recette' => $recette
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function edit(Recette $recette)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recette $recette)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recette $recette)
    {
        //
    }

    public function getRecetteFromAliments(Request $request)
    {
        $path = explode("/", $request->path());
        $ids = '(' . end($path) . ')';

//        var_dump($path);
//        var_dump($ids);

        $recipes = DB::table('recettes')
                        ->join('quantites', 'recettes.id', '=', 'quantites.id_recette')
                        ->where('quantites.id_aliment', 'IN', $ids)
                        ->select('recettes.*')
                        ->distinct()
                        ->get();



    }
}
