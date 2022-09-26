<?php

namespace App\Http\Controllers;

use App\Models\TypeSol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TraitementController extends Controller
{
    public function traitement( Request $request){
       
        //  validation des donnees 
        $request->validate([
            'typesol'=>'required',
            'ph'=>'required',
            'n'=>'required',
            'p'=>'required',
            'k'=>'required'
        ]);

        // Recuperation des donnees dans des variables 
        $typesol = $request ->typesol;
        $ph = $request->ph;
        $n = $request->n;
        $p = $request->p;
        $k = $request->k;

        // conditions 

            // recuperation des types de culture selon le type de sol
        
            $typeculturests=''; // sts selon type de sol
            $typeculturesph=''; // selon ph
            $diff =''; // difference collections
            $doublon = ''; // doublon des deux collections

        if ( $typesol == "sableux"){
           
            $check = TypeSol::where('libelle', 'sableux')->first();
            $typeculturests = $check ->typecultures()->pluck('libelle')->all();

        }else if ( $typesol == "limoneux"){
           
            $check = TypeSol::where('libelle', 'limoneux')->first();
             $typeculturests  = $check ->typecultures()->pluck('libelle')->all();

        }else if ( $typesol == "argileux"){
           
            $check  = TypeSol::where('libelle', 'argileux')->first();
             $typeculturests  = $check ->typecultures()->pluck('libelle')->all();

        } else if ( $typesol == "humifere"){
           
            $check  = TypeSol::where('libelle', 'humifere')->first();
            $typeculturests = $check ->typecultures()->pluck('libelle')->all();
        }

         // recuperation des types de culture selon le ph
         
         if ($ph>=5 and $ph<=5.5){

            $typeculturesph = ['mais','sorgho','arachide'];

         } else if ($ph>=5.5 and $ph<=6.5){

            $typeculturesph = ['mais','sorgho','arachide','coton','mil'];
         } else if ($ph>=6.5 and $ph<=7){

            $typeculturesph = ['tomate','mil'];
         }

         // diff et doublons
       
         $diff = collect($typeculturests)->concat(collect($typeculturesph));  // fusionner les deux collections
         $diff ->all();

         $doublon = $diff->duplicates(); // recuperer les doublons

         // Elimination

            if (($n>11.5) and ($p>6.6) and ($k>4.6) ) {

                $data1=['mais'];

            }

            if (($n>83.3) and ($p>27.8) and ($k>27.8) ) {

                $data2=['haricot'];

            }

            if (($n>3) and ($p>0.6) and ($k>2.5) ) {

                $data3=['oignon'];

            }

             if (($n>43) and ($p>5.5) and ($k>20) ) {

                $data4=['petit pods'];

            }if (($n>5.3) and ($p>1.7) and ($k>7.3) ) {

                $data5=['pomme de terre'];

            }
            if (($n>2.9) and ($p>1.1) and ($k>5.8) ) {

                $data6=['tomate'];

            }

            if (($n>14.5) and ($p>5.5) and ($k>3.8) ) {

                $data7=['sorgho'];

            }

             if (($n>19.2) and ($p>6) and ($k>5.4) ) {

                $data8=['mil'];

            }

            if (($n>30) and ($p>6.1) and ($k>6.8) ) {

                $data9=['sesame'];

            }

            if (($n>37.2) and ($p>6) and ($k>8.2) ) {

                $data10=['arachide'];
                
            }
            
            if (($n>20) and ($p>3.4) and ($k>11.1) ) {
                $data11=['niebe'];
            }
         

        return  response()->json([
            'Statut'=>True,
            'typesol'=>$typesol,
            'n'=>$n,
            'p'=>$p,
            'k'=>$k,
            'Doublon'=>$doublon
        ]);

    }
}
