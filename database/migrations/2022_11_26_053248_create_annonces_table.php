<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('titre');
            $table->string('prix');
            $table->string('localisation');
            $table->string('details');
            // merci de verifier cette instruction
           // $table->foreign('cat_id')->references('id')->on('categories');//->onCascade('delete');
            $table->timestamps();
            $table->foreignId('cat_id')->constrained('categories');

            // affecter la cle etrangere
           // $table->unsignedBigInteger('catg_id');
           // $table->foreign('catg_id')->references('id')->on ('categories');

            // ==> la ligne suivante permet de nos definir les deux lignes precedentes
           // $table->foreignId('cat_id')->constrained();

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
