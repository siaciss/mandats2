<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalannulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journalannulations', function (Blueprint $table) {
            $table->integer('matOrph');
            $table->string('nomTuteur');
            $table->string('prenomTuteur');
            $table->string('beneficiaire');
            $table->integer('montant');
            $table->string('matAgtPayeur');
            $table->string('matAgtAnnulateur');
            $table->date('dateEmission')->useCurrent();                       
            $table->date('datePayement'); 
            $table->date('dateAnnulation'); 
            $table->date('heureAnnulation');
            $table->timestamps();
            $table->primary(['matOrph','dateEmission','dateAnnulation','heureAnnulation'],'pkMandat');
            $table->foreign('matOrph','fkMandat1')->references('matOrph')->on('mandats')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('matAgtPayeur','fkMandat2')->references('matricule')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('matAgtAnnulateur','fkMandat3')->references('matricule')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journalannulations');
    }
}
