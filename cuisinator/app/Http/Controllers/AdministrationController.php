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
        $aliments = Aliment::join('users', 'users.id', '=', 'aliments.id_createur')
        ->select('users.name AS username','aliments.id','aliments.nom','aliments.nom_photo')
        ->get();

        return view("administration.index", ['aliments' => $aliments]);
    }
}
