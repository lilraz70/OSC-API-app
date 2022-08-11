<?php

namespace App\Models;

use App\Models\Resultat;
use App\Models\TypeCulture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeSol extends Model
{
    use HasFactory;
    protected $guarded=[];

    // un type de sol renvoi plusieurs resultats
    public function resultats(){
        return $this->hasMany(Resultat::class);
    }

    /*
    relation many to many
    un type de sol renvoi plusieurs type de culture
    */

    public function typecultures(){
        return $this->belongsToMany(TypeCulture::class);
    }
}
