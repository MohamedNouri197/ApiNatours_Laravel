<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Auth;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('titre');
            $table->string('prix');
            $table->string('localisation');
            $table->string('annee');
            $table->string('etat');
            $table->string('premiereMain');
            $table->string('marke');
            $table->string('modele');

            $table->string('cylindre');
            $table->string('typeCarburant');
            $table->string('couleur');

            $table->string('details');
            $table->timestamps();
         //   $table->string('user_id');
           /*  $table->string('cat_id');
             */

/*
dernier version
--------------------------------------------------------*/


 $table->integer('user_id')->unsigned();
          // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
 $table->integer('cat_id')->unsigned();
        //   $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');



 });

        }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annonces');
    }
};
