<?php

namespace App\Http\Controllers;

use App\Models\TypeSol;
use Illuminate\Http\Request;

class TypeSolController extends Controller
{
    public function index()
    {
        $data = TypeSol::all();
        return response()->json([
            'statut' => TRUE,
            'type' =>   $data,
        ],200);
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
            'libelle'=>'required |unique:Type_Sols',
        ]);

        $TypeSol= new TypeSol();

        $TypeSol->libelle = $request->libelle;
        $TypeSol->save();
    //     $id = Auth::user('id');
    //    Champ::create([
    //         "nom"=>$request->nom,
    //         "localisation"=>$request->localisation,
    //         "user_id"=>$request->$id
    //    ]);
        return response()->json([
            'statut' => TRUE,
            'Message'=>'TypeSol cree avec success',
            'Data'=>$TypeSol
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

        $data = TypeSol::Find($id);
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
                "Message"=>"TypeSol introuvable"
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
        $data = TypeSol::find($id);
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
                "Message"=>"TypeSol introuvable"
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
        $data= TypeSol::Find($id);
        if ($data){
            TypeSol::destroy($id);
            return response()->json([
                'statut' => TRUE,
                "Message"=>"TypeSol supprimer avec success"
            ]);
        }else{
            return response()->json([
                "Statut"=>FALSE,
                "Message"=>"TypeSol introuvable"
            ],404);
        }
    }
}
