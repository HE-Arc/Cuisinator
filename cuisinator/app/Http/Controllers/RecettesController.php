<?php

namespace App\Http\Controllers;

use App\Aliment;
use App\Quantite;
use App\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $recettes = Recette::all();
        return view("recettes.index", ['recettes' => $recettes]);
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
        $validation = Validator::make($request->all(), [
            'nom' => 'required|max:50',
            'id_createur' => 'required|max:50|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|max:400',
            'steps' => 'required|max:400',
            "recette.*.aliment"=> 'required|max:50',
            "recette.*.quantite"=> 'required|max:1000|numeric',
            "recette.*.unite"=> 'required|max:1000|numeric',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validation->errors(),
            ], 422);
        }

        if ($files = $request->file('photo')) {
            $image = $request->photo->store('photos-recettes');
            $request['nom_photo'] = explode('/',$image)[1];
        }


        return Recette::insertRecette($request);

        return response()->json([
            'error' => false,
            'aliment'  => "kf"
        ], 200);
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
        $validation = Validator::make($request->all(), [
            'nom' => 'required|max:50',
            'id_createur' => 'required|max:50|numeric',
            'description' => 'required|max:2000',
            'steps' => 'required|max:2000',
            "recette.*.aliment"=> 'required|max:50',
            "recette.*.quantite"=> 'required|max:1000|numeric',
            "recette.*.unite"=> 'required|max:1000|numeric',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validation->errors(),
            ], 422);
        }

        $recette->updateRecette($request);
        $recette->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recette $recette)
    {
        Quantite::where('id_recette', $recette->id)->delete();

        $recette->delete();

        return response()->json([
            'error' => false,
            'message' => $recette,
        ], 200);
    }

    /**
     *
     *
     * @param  \App\Aliment  $aliment
     * @return String
     */
    public function recetteJSON(){
        $recettes = Recette::with('aliments')->get();

        return $recettes->toJson();
    }
}
