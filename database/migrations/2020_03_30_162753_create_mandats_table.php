<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMandatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mandats', function (Blueprint $table) {
            $table->integer('matOrph');
            $table->string('nomTuteur');
            $table->string('prenomTuteur');
            $table->string('beneficiaire');
            $table->integer('montant');
            $table->string('etat');    //->check('etat','checkEtat')->in('EMIS','PAYE','EXPIRE'); 
            $table->string('matAgt')->nullable();
            $table->date('dateEmission');                       
            $table->date('datePayement')->nullable();        
            $table->timestamps();
            $table->primary(['matOrph','dateEmission'],'pkMandat');
            $table->foreign('matAgt','fkMandat')->references('matricule')->on('users')->onDelete('cascade')->onUpdate('cascade');
          //  $table->check('etat','checkEtat')->in('EMIS','PAYE','EXPIRE');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mandats');
    }
}
