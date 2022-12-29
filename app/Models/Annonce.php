<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;
     protected $fillable = [
        'image',
        'titre',
        'prix',
        'localisation',
          'annee',
          'etat',
          'premiereMain',
          'marke',
          'modele',
          'cylindre',
          'typeCarburant',
          'couleur',
          'details'
          ,'user_id',
          'cat_id',


 ] ;

 public function Categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

public function User()
{
    return $this->belongsTo(User::class);
}

}
