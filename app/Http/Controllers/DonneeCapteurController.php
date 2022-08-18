<?php

namespace App\Http\Controllers;

use App\Models\DonneeCapteur;
use Illuminate\Http\Request;

class DonneeCapteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DonneeCapteur::all();
        return response()->json([
            'statut' => TRUE,
            'Message' => 'Requete reussi',
            'Data' => $data
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
        $request -> validate([
            'n' => 'required',
            'p' => 'required',
            'k' => 'required',
            'ph' => 'required',
            'ec' => 'required',
            'temperature' => 'required',
            'humidite' => 'required',
            'champ_id' => 'required',
        ]);
        $donneeCapteur = new DonneeCapteur();
        $donneeCapteur->n = $request->n;
        $donneeCapteur->p = $request->p;
        $donneeCapteur->k = $request->k;
        $donneeCapteur->ph = $request->ph;
        $donneeCapteur->ec = $request->ec;
        $donneeCapteur->temperature = $request->temperature;
        $donneeCapteur->humidite = $request->humidite;
        $donneeCapteur->Champ_id = $request->champ_id;
        $donneeCapteur->save();
        return response()->json([
            'statut' => TRUE,
            'Message' => 'Requete reussi',
            'Data' => $donneeCapteur
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DonneeCapteur  $donneeCapteur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DonneeCapteur::Find($id);

        if ($data){
            return response()->json([
                'statut' => TRUE,
                'Message' => 'Requete reussi',
                'Data' => $data
            ],200);
        }else{
            return response()->json([
                'Statut' => FALSE,
                'Message' => 'Requete non reussi',
            ],404);

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DonneeCapteur  $donneeCapteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //     $request -> validate([
    //         'n' => 'required',
    //         'p' => 'required',
    //         'k' => 'required',
    //         'ph' => 'required',
    //         'ec' => 'required',
    //         'temperature' => 'required',
    //         'humidite' => 'required',
    //         'champ_id' => 'required',
    //     ]);
        $data = DonneeCapteur::find($id);
        if ($data){
            $data -> update($request->all());
            return response()->json([
                'statut' => TRUE,
                'Message' => 'Requete reussi',
                'Data' => $data
            ],200);
        }else{
            return response()->json([
                'Statut' => FALSE,
                'Message' => 'Requete non reussi',
            ],404);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DonneeCapteur  $donneeCapteur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data =  Donneecapteur::find($id);

        if ($data){
            DonneeCapteur::destroy($id);
            return response()->json([
                'statut' => TRUE,
                "Message"=>"Donnee Capteur supprimer"
            ],200);
        }else{
            return response()->json([
                "Statut"=>False,
                "Message"=>"Donneecapteur introuvable"
            ],404);
        }
    }
}
