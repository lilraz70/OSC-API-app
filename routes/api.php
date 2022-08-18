<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChampController;
use App\Http\Controllers\TypeSolController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ResultatController;
use App\Http\Controllers\TypeCultureController;
use App\Http\Controllers\DonneeCapteurController;


Route::get('/', [WelcomeController::class,'welcome']); // welcome



//-------------------------------------------------------------------------------------
          // Inscription et connexion utilisateur
       //   les routes  qui n'ont pas besoin d'authentification

          Route::post("user_register",[UserController::class,'register']);
           Route::post("admin_register",[UserController::class,'adminregister']);
          Route::post("user_login",[UserController::class,'login']);
// -----------------------------------------------------------------------------------

// les Routes accessible uniquement a l'administrateur connecte
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {

     // User setting and user logout
   
     Route::get("user_logout",[UserController::class,'logout']);


     //Manipulation de l'utilisateur
Route::get("user_profile",[UserController::class,'profile']);
Route::get("list_utilisateur",[UserController::class,'index']); // voir tous les  utilisateur
Route::get("detail_utilisateur/{id}", [UserController::class, 'show']);//voir  1 seul utilisateur
Route::put("maj_utilisateur/{id}",[UserController::class,'update']); // MAJ un utilisateur
Route::delete("supprimer_utilisateur/{id}",[UserController::class,'destroy']); // supprimer un utilisateur

     // Manipulation du Champ

Route::post('cree_champ',[ChampController::class,'store']); // cree un champ
Route::get('list_champ',[ChampController::class,'index']); // voir tous les champs
Route::get('detail_champ/{id}',[ChampController::class,'show']); // voir 1 un champ
Route::put('maj_champ/{id}',[ChampController::class,'update']); // MAJ un champ
Route::delete('supprimer_champ/{id}',[ChampController::class,'destroy']); // supprimer un champ

  // Manipulation TypeSol

Route::post('cree_typesol',[TypeSolController::class,'store']); // cree un typesol
Route::get('list_typesol',[TypeSolController::class,'index']); // voir tous les  typesol
Route::get('detail_typesol/{id}',[TypeSolController::class,'show']);  //voir  1 seul typesol
Route::put('maj_typesol/{id}',[TypeSolController::class,'update']); // MAJ un typesol
Route::delete('supprimer_typesol/{id}',[TypeSolController::class,'destroy']); // supprimer un typesol

  // Manipulation TypeCulture

Route::post('cree_typeculture',[TypeCultureController::class,'store']); // cree un typeculture
Route::get('list_typeculture',[TypeCultureController::class,'index']); // voir tous les  typeculture
Route::get('detail_typeculture/{id}',[TypeCultureController::class,'show']);  //voir  1 seul typeculture
Route::put('maj_typeculture/{id}',[TypeCultureController::class,'update']); // MAJ un typeculture
Route::delete('supprimer_typeculture/{id}',[TypeCultureController::class,'destroy']); // supprimer un typeculture

  // Manipulation donneecapteur
Route::post('cree_donneecapteur',[DonneeCapteurController::class,'store']); // cree un donneecapteur
Route::get('list_donneecapteur',[DonneeCapteurController::class,'index']); // voir tous les  donneecapteur
Route::get('detail_donneecapteur/{id}',[DonneeCapteurController::class,'show']);  //voir  1 seul donneecapteur
Route::put('maj_donneecapteur/{id}',[DonneeCapteurController::class,'update']); // MAJ un donneecapteur
Route::delete('supprimer_donneecapteur/{id}',[DonneeCapteurController::class,'destroy']); // supprimer un donneecapteur

   // Manipulation donneecapteur
Route::post('cree_resultat',[ResultatController::class,'store']); // cree un Resultat
Route::get('list_resultat',[ResultatController::class,'index']); // voir tous les  Resultat
Route::get('detail_resultat/{id}',[ResultatController::class,'show']);  //voir  1 seul Resultat
Route::put('maj_resultat/{id}',[ResultatController::class,'update']); // MAJ un Resultat
Route::delete('supprimer_resultat/{id}',[ResultatController::class,'destroy']); // supprimer un Resultat

});
//----------------------------------------------------------------------------------------------
   


// les Routes accessible uniquement a l'utilisateur connecte

    Route::group(['middleware'=>('auth:sanctum')],function(){


        // User setting and user logout
   
    Route::get("user_logout",[UserController::class,'logout']);


            //Manipulation de l'utilisateur
    Route::get("user_profile",[UserController::class,'profile']);
    Route::get("detail_utilisateur/{id}", [UserController::class, 'show']);//voir  1 seul utilisateur
    Route::put("maj_utilisateur/{id}",[UserController::class,'update']); // MAJ un utilisateur
    Route::delete("supprimer_utilisateur/{id}",[UserController::class,'destroy']); // supprimer un utilisateur

                                // Manipulation du Champ

    Route::post('cree_champ',[ChampController::class,'store']); // cree un champ
    Route::get('detail_champ/{id}',[ChampController::class,'show']); // voir 1 un champ
    Route::put('maj_champ/{id}',[ChampController::class,'update']); // MAJ un champ
    Route::delete('supprimer_champ/{id}',[ChampController::class,'destroy']); // supprimer un champ

                             // Manipulation donneecapteur
    Route::post('cree_donneecapteur',[DonneeCapteurController::class,'store']); // cree un donneecapteur
    Route::get('detail_donneecapteur/{id}',[DonneeCapteurController::class,'show']);  //voir  1 seul donneecapteur
    Route::put('maj_donneecapteur/{id}',[DonneeCapteurController::class,'update']); // MAJ un donneecapteur
    Route::delete('supprimer_donneecapteur/{id}',[DonneeCapteurController::class,'destroy']); // supprimer un donneecapteur

                              // Manipulation donneecapteur
    Route::post('cree_resultat',[ResultatController::class,'store']); // cree un Resultat
    Route::get('detail_resultat/{id}',[ResultatController::class,'show']);  //voir  1 seul Resultat
    Route::put('maj_resultat/{id}',[ResultatController::class,'update']); // MAJ un Resultat
    Route::delete('supprimer_resultat/{id}',[ResultatController::class,'destroy']); // supprimer un Resultat
});
// ---------------------------------------------------------------------------------------------
