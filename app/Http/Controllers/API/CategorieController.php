<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Categorie::all();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // la validation des donnees
        $this->validate($request,[
            'titre'=>'required|max:100'

        ]);

        // creation d'un nouvel categorie
        $cat=Categorie::create([
            'titre'=> $request->titre
        ]);

        return response()->json($cat,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $c=Categorie::find($id);
        // return les infos de categorie
      
        return response()->json($c);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $cat= Categorie::findOrFail($id);
     
       $cat->update($request->all());
            
        return response(["message"=>"mise a jour de l'categorie fait avec success","categorie"=>$cat]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie=Categorie::find($id);
        $categorie->delete();
        return response()->json($categorie);
    }
}
