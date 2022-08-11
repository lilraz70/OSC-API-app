<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(){
        return response()->json([
            'Welcome'=>'Bienvenue sur l\'api OSC-API-APP',
            'Data'=>['Version '=>'1.0',
            'Description'=>'Cette api etudie la fertilie des sols agricole',
            'Contact'=>'oscapi@app.com']
        ]);
    }
}
