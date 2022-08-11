<?php

namespace App\Models;

use App\Models\User;
use App\Models\DonneeCapteur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Champ extends Model
{
    use HasFactory;
    protected $guarded=[];

    /* relation one to many
    un champ retourne un utilisateur
    */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /*  relation one to many
    un champ retourne plusieurs donneecapteur
    */
    public function donneecapteurs(){
        return $this->hasMany(DonneeCapteur::class);
    }
}
