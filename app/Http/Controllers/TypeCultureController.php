<?php

namespace App\Http\Controllers;

use App\Models\TypeCulture;
use Illuminate\Http\Request;

class TypeCultureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TypeCulture::all();
        return response()->json([
            'statut' => 'SUCCES',
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
            'libelle'=>'required |unique:type_cultures',
        ]);

        $TypeCulture= new TypeCulture();

        $TypeCulture->libelle = $request->libelle;
        $TypeCulture->save();
    //     $id = Auth::user('id');
    //    Champ::create([
    //         "nom"=>$request->nom,
    //         "localisation"=>$request->localisation,
    //         "user_id"=>$request->$id
    //    ]);
        return response()->json([
            'Statut'=>'Success',
            'Message'=>'TypeCulture cree avec success',
            'Data'=>$TypeCulture
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

        $data = TypeCulture::Find($id);
        if ($data){
            return response()->json(
                [
                    "Statut"=>"Success",
                    "Message"=>"Requete reussi",
                    "Data"=>$data
                ],200);
        }else{
            return response()->json([
                "Statut"=>"False",
                "Message"=>"TypeCulture introuvable"
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
        $data = TypeCulture::find($id);
        if ($data){
            $data->update($request->all());
            return response()->json([
                    "Statut"=>"Success",
                    "Message"=>"Requete reussi",
                    "Data"=>$data
                ],200);
        }else {
            return response()->json([
                "Statut"=>"False",
                "Message"=>"TypeCulture introuvable"
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
        $data= TypeCulture::Find($id);
        if ($data){
            TypeCulture::destroy($id);
            return response()->json([
                "Statut"=>"Success",
                "Message"=>"TypeSol supprimer avec success"
            ],200);
        }else{
            return response()->json([
                "Statut"=>"False",
                "Message"=>"TypeCulture introuvable"
            ],404);
        }
    }
}
