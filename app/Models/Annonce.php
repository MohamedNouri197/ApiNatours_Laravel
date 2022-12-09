<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;
     protected $fillable = [
        'titre',
        'prix',
        'localisation'
        ,'details',
        'cat_id'
 ];

 public function Categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
