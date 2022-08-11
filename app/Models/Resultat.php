<?php

namespace App\Models;

use App\Models\TypeSol;
use App\Models\DonneeCapteur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resultat extends Model
{
    use HasFactory;

    protected $guarded=[];

    // une resultat renvoi un seul type de sol

    public function typesol(){
        return $this->belongsTo(TypeSol::class);
    }

    /* relation one to one
    un renvoi un seul  donneecapteur
    */

    public function donneecapteur(){
        return $this->belongsTo(DonneeCapteur::class);
    }
}
