<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->string('statut');
            $table->integer('numBureau');
            $table->string('password');
          //  $table->rememberToken();
            $table->timestamps();
            $table->primary('matricule','pkPerson');
            $table->foreign('numBureau','fkPerson')->references('numBureau')->on('bureaus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
