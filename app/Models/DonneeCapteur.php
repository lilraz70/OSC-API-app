<?php

namespace App\Models;

use App\Models\Champ;
use App\Models\Resultat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DonneeCapteur extends Model
{
    use HasFactory;
    protected $guarded=[];

     /*
    relation one to many

     une donneecapetur retourne un seul champ
    */
    public function champ(){
        return $this->belongsTo(Champ::class);
    }

   /* relation one to one
   une donneecapeteur renvoi un seul  resultat
   */
    public function resultat(){
         return $this->hasOne(Resultat::class);
    }
}
