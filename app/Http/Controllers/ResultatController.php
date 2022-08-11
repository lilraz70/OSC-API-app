<?php

namespace App\Http\Controllers;

use App\Models\Resultat;
use Illuminate\Http\Request;

class ResultatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Resultat::all();
        if ($data){
            return response()->json([
                "Statut"=>"Success",
                "Message"=>"Requete reussi",
                "Data"=>$data
            ],200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "donnee_capteur_id" =>"required",
            "type_sol_id"=> "required"
        ]);
        $resultat = new Resultat();
        $resultat->donnee_capteur_id = $request->donnee_capteur_id;
        $resultat->type_sol_id = $request->type_sol_id;
        $resultat->save();
        return response()->json([
            "Statut"=>"Success",
            "Message"=>"Resultat ajoute avec success",
            "Data"=>$resultat
        ],404);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resultat  $resultat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Resultat::find($id);

        if($data){
            return response()->json([
                "Statut"=>"Success",
                "Message"=>"requette reussi",
                "Data"=>$data
            ],200);
        }else{
            return response()->json([
                "Statut"=>"False",
                "Message"=>"Resultat introuvable"
            ],404);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resultat  $resultat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data = Resultat::find($id);

        if ($data){
            $data -> update($request->all());
            return response()->json([
                "Statut"=>"True",
                "Message"=>"Mise a jour reussi",
                "Data"=>$data
            ],200);
        }else{
            return response()->json([
                "Statut"=>"False",
                "Message"=>"Resultat introuvable"
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resultat  $resultat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Resultat::find($id);

        if ($data){
            Resultat::destroy($id);
            return response()->json([
                "Statut"=>"True",
                "Message"=>"Resultat supprimer avec success",
            ],200);
        }else{
            return response()->json([
                "Statut"=>"False",
                "Message"=>"Resultat introuvable"
            ],404);
        }
    }
}
