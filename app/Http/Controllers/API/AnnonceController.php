<?php

namespace App\Http\Controllers\API;
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use Illuminate\Http\Request;

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
        $cat=Annonce::create([
            'titre'=>$request->titre,
            'localisation'=>$request->localisation,
            'prix'=>$request->prix,
            'details'=>$request->details,
            'cat_id'=>$request->cat_id
        ]);

        return response(["message"=>"annonce ajoute avec succees"],201);
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

        $annonce->update([
          "titre"=>$request->titre,
          "prix"=>$request->prix,
          "localisation"=> $request->localisation,
          "details"=>$request->details
        ]);
        return response()->json();
           /*  $anc= Annonce::findOrFail($id);

       $anc->update($request->all());

        return response(["message"=>"mise a jour d'annonce fait avec success","annonce"=>$anc]);
   */
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
