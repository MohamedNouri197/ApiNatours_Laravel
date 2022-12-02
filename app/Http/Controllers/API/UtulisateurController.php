<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Utulisateur;
use Illuminate\Http\Request;

class UtulisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $utulisateurs=Utulisateur::all();
        return response()->json($utulisateurs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $utulisateur=Utulisateur::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'num_tel'=>$request->num_tel,
            'email'=>$request->email,
            'password'=>$request->password,
            'role'=>$request->role
          ]);
          return response(["message"=>" utulisateur ajoute avec success"],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utulisateur  $utulisateur
     * @return \Illuminate\Http\Response
     */
    public function show(Utulisateur $utulisateur)
    {
         return response()->json($utulisateur);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utulisateur  $utulisateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utulisateur $utulisateur)
    {
         /*  $utulisateur=Utulisateur::update($request->all()); */
             
           $utulisateur->update($request->all());
         return response(["message"=>"mise a jour fait avec succees"],201);

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utulisateur  $utulisateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utulisateur $utulisateur)
    {
          $utulisateur->delete();
    }
}
