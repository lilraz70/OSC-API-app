<?php

namespace App\Http\Controllers;

use App\Models\TypeSolTypeCulture;
use Illuminate\Http\Request;

class TypeSolTypeCultureController extends Controller
{
    public function index()
    {
        $data = TypeSolTypeCulture::all();
        return response()->json([
            'Statut'=>TRUE,
            'type' =>$data,
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

        $TypeSolTypeCulture= new TypeSolTypeCulture();

        $TypeSolTypeCulture->libelle = $request->libelle;
        $TypeSolTypeCulture->save();
    //     $id = Auth::user('id');
    //    Champ::create([
    //         "nom"=>$request->nom,
    //         "localisation"=>$request->localisation,
    //         "user_id"=>$request->$id
    //    ]);
        return response()->json([
            'Statut'=>TRUE,
            'Message'=>'TypeSolTypeCulture cree avec success',
            'Data'=>$TypeSolTypeCulture
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

        $data = TypeSolTypeCulture::Find($id);
        if ($data){
            return response()->json(
                [
                    'Statut'=>TRUE,
                    "Message"=>"Requete reussi",
                    "Data"=>$data
                ]);
        }else{
            return response()->json([
                "Statut"=>FALSE,
                "Message"=>"TypeSolTypeCulture introuvable"
            ],404);
        }
}
public function update(Request $request,  $id)
    {
        $data = TypeSolTypeCulture::find($id);

        if ($data){
            $data -> update($request->all());
            return response()->json([
                'Statut'=>TRUE,
                "Message"=>"Mise a jour reussi",
                "Data"=>$data
            ],200);
        }else{
            return response()->json([
                "Statut"=>FALSE,
                "Message"=>"TypeSolTypeCultureintrouvable"
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
        $data = TypeSolTypeCulture::find($id);

        if ($data){
            TypeSolTypeCulture::destroy($id);
            return response()->json([
                'Statut'=>TRUE,
                "Message"=>"TypeSolTypeCulture supprimer avec success",
            ],200);
        }else{
            return response()->json([
                "Statut"=>FALSE,
                "Message"=>"TypeSolTypeCultureintrouvable"
            ],404);
        }
    }
}
