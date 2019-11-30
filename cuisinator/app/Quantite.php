<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Quantite extends Pivot
{

    protected $table = 'quantites';

    public function unite()
    {
        return $this->belongsTo('App\Unite', 'id_unite');
    }

    

    public static function recetteWithCreatorAndIngredients()
    {
        return Quantite::with('Recette')->get();
    }
}
