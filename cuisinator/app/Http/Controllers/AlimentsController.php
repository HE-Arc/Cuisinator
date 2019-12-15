<?php

namespace App\Http\Controllers;

use App\Aliment;
use App\Quantite;
use App\Recette;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AlimentsController extends Controller
{
       
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alim = Aliment::all();
        return view("aliments.index", ['aliments' => $alim]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'id_createur' => 'required|max:50',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validation->errors(),
            ], 422);
        }

        if ($files = $request->file('photo')) {
            $image = $request->photo->store('photos-aliments');
            $request['nom_photo'] = explode('/',$image)[1];
        }
        
        Aliment::firstOrCreate(['nom' => $request['nom']],$request->input());

        return response()->json([
            'error' => false,
            'aliment'  => "kingfood"
        ], 200);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aliment  $aliment
     * @return \Illuminate\Http\Response
     */
    public function show(Aliment $aliment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aliment  $aliment
     * @return \Illuminate\Http\Response
     */
    public function edit(Aliment $aliment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aliment  $aliment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aliment $aliment)
    {
        $validator = Validator::make($request->input(), array(
            'nom' => 'required|max:50',
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }
        $aliment->nom =  $request->input('nom');

        $aliment->save();

        return response()->json([
            'error' => false,
            'aliment'  => $aliment,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aliment  $aliment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aliment $aliment)
    {
        if($aliment->recettes()->count() > 0){
            return response()->json([
                'error' => true,
                'message' => "Aliment is still part of a recette",
            ], 422);
        }
        
        $aliment->delete();
        return response()->json([
            'error' => false,
            'message' => $aliment,
        ], 200);   
    }

    /**
     * Get all the aliments with their creator's name
     *
     * @param  \App\Aliment  $aliment
     * @return \Illuminate\Http\Response
     */
    public function alimentsJSON(){
        $alim = Aliment::with('creator')->get();

        return $alim->toJson();
    }

    /**
     *  Return all the aliments from a recette
     *
     * @param  \App\Aliment  $aliment
     * @return \Illuminate\Http\Response
     */
    public function test(){
        $recettes = Recette::with('aliments')->get();
        return $recettes->toJson();
    }
}
