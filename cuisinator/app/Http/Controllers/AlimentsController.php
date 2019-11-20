<?php

namespace App\Http\Controllers;

use App\Aliment;
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
            'photo' => 'required|max:50',
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }
        $aliment->nom =  $request->input('nom');
        $aliment->nom_photo = $request->input('photo');

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
}
