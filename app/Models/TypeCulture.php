<?php

namespace App\Models;

use App\Models\TypeSol;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeCulture extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function typesols(){
    return $this->belongsToMany(TypeSol::class);
}
}
