<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utulisateur extends Model
{
    use HasFactory;
    protected $fillable=['nom','prenom','num_tel','email','password','role'];
}
