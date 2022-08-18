<?php

namespace App\Http\Controllers;

use App\Models\Champ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Champ::all();
        return response()->json([
            'statut' => TRUE,
            'type' =>   $data,
        ]);
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
            'nom'=>'required |unique:Champs',
        ]);

        $champ = new Champ();

        $champ->nom = $request->nom;
        $champ->localisation = $request->localisation;
        $champ->user_id = $request->user_id;
        $champ->save();
    //     $id = Auth::user('id');
    //    Champ::create([
    //         "nom"=>$request->nom,
    //         "localisation"=>$request->localisation,
    //         "user_id"=>$request->$id
    //    ]);
        return response()->json([
            'statut' => TRUE,
            'Message'=>'Champ cree avec success',
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Champ  $champ
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Champ::Find($id);
        if ($data){
            return response()->json(
                [
                    'statut' => TRUE,
                    "Message"=>"Requete reussi",
                    "Data"=>$data
                ]);
        }else{
            return response()->json([
                "Statut"=>FALSE,
                "Message"=>"Champ introuvable"
            ],404);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Champ  $champ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Champ::find($id);
        if ($data){
            $data->update($request->all());
            return response()->json([
                'statut' => TRUE,
                    "Message"=>"Requete reussi",
                    "Data"=>$data
                ]);
        }else {
            return response()->json([
                "Statut"=>FALSE,
                "Message"=>"Champ introuvable"
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Champ  $champ
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Champ::Find($id);
        if ($data){
            Champ::destroy($id);
            return response()->json([
                'statut' => TRUE,
                "Message"=>"Champ supprimer avec success"
            ]);
        }else{
            return response()->json([
                "Statut"=>FALSE,
                "Message"=>"Champ introuvable"
            ],404);
        }
    }
}
