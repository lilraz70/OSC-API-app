<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        /*

        la partie de l'authentification
       */

       public function register(request $request){

        $request->validate([
            'numero'=>'required |string|unique:users'
        ]);
        $user = new User();
        $user->numero = $request->numero;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user ->profession = $request->profession;
        $user->save();
        $token = $user->createToken('register_token')->plainTextToken;
        return response()->json([
            'Statut'=>'Success',
            'Message'=>'Utilisateur cree avec success',
            'Access_token'=>$token
        ]);


       }
       public function login(request $request){
        $request->validate([
            'numero'=>'required'
        ]);

        // verifier si l'etudiant exist
        $user = User::where('numero','=',$request->numero)->first();

        if ($user){

            // generation du token
           $token= $user -> createToken('login_token')->plainTextToken;
            return response()->json(
                [ 'Statut'=>'Sucess',
                'Message'=>'Connexion reussi',
                'Access_token'=>$token
                ],404);
        }else{
            return response()->json(
                [ 'Statut'=>'False',
                'Message'=>'Utilisateur introuvable'
                ],404);
        }

    }
    public function profile(request $request){
        return response()->json(
            [ 'Statut'=>'Success',
            'Message'=>'Informations de profile',
            'Data'=>Auth::User()
            ]);
    }
    public function logout(request $request){
        Auth::User()->Tokens()->delete();
        return response()->json(
            [ 'Statut'=>'Success',
            'Message'=>'Deconnexion reussi'
            ]);
    }

     /*

     LA PARTIE DU GRUD
     */

    public function index()
    {
        $data = User::all();
        return response()->json([
            'statut' => 'SUCCES',
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::FindOrFail($id);
        if ($data){
            return response()->json(
                [
                    "Statut"=>"Success",
                    "Message"=>"Requete reussi",
                    "Data"=>$data
                ]);
        }else{
            return response()->json([
                "Statut"=>"False",
                "Message"=>"Utilisateur introuvable"
            ]);

        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::find($id);
        if ($data){
            $data->update($request->all());
            return response()->json([
                    "Statut"=>"Success",
                    "Message"=>"Requete reussi",
                    "Data"=>$data
                ]);
        }else {
            return response()->json([
                "Statut"=>"False",
                "Message"=>"Utilisateur introuvable"
            ]);
        }
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= User::FindOrFail($id);
        if ($data){
            User::destroy($id);
            return response()->json([
                "Statut"=>"Success",
                "Message"=>"Utilisateur supprimer avec success"
            ]);
        }else{
            return response()->json([
                "Statut"=>"False",
                "Message"=>"Utilisateur introuvable"
            ]);
        }
    }
}
