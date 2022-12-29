<?php

namespace App\Http\Controllers\API;
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonces=Annonce::all();
        return response()->json($annonces);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 $this->validate($request,[
            'user_id'=>'required',
            'cat_id'=>'required'

        ]);
// le user qui est connecter
        $user=Auth::user();
        $id=Auth::id();

   //  il faut concatener le nom de photo avec le temps => on cas de stocker avec le meme photo on
   // trouve comment en peut le differe nos photo name
   // $file_name=time().$file_extension

  $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $image_path = $request->file('image')->store('image', 'public');


        $cat=Annonce::create([
          'image' => $image_path,

            'titre'=>$request->titre,
             'prix'=>$request->prix,
            'localisation'=>$request->localisation,
            'annee'=>$request->annee,
            'etat'=>$request->etat,
            'premiereMain'=>$request->premiereMain,
            'marke'=>$request->marke,
            'modele'=>$request->modele,
            'cylindre'=>$request->cylindre,
            'typeCarburant'=>$request->typeCarburant,
            'couleur'=>$request->couleur,
         'details'=>$request->details,
            'cat_id'=>$request->cat_id,
            'user_id'=>$request->user_id,

        ]);

        return response(["message"=>"annonce ajoute avec succees",$id],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function show(Annonce $annonce)
    {
        return response()->json($annonce);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $annonce)
    {

      /*   $annonce->update([
          "titre"=>$request->titre,
          "prix"=>$request->prix,
          "localisation"=> $request->localisation,
          "details"=>$request->details
        ]); */
        $annonce=Annonce::Update(
            $request->all());

        return response()->json(["message"=>"mise a jour fait avec succes"],201);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonce $annonce)
    {
        $annonce->delete();
        return response(["message"=>"annonce supprimer avec success"],201);
    }
   /*   public function addAnnonceToCategorie(Request $request)
    {
        $annonce=Annonce::create([
            'titre'=>$request->titre,
            'localisation'=>$request->localisation,
            'prix'=>$request->prix,
            'details'=>$request->details,
            'id_cat'=>$request->id_cat

        ]);
         return response(["message"=>"annonce effectuer a une categorie avec succees"],201);

    } */

}
