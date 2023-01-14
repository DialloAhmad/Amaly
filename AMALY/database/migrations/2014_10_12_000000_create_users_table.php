<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->boolean('statut')->default(false);
            $table->string('nom');
            $table->string('prenom');
            $table->string('compagnie')->nullable();;
            $table->string('poste')->nullable();;
            $table->string('telephone');
            $table->string('ville');
            $table->string('quartier');
            $table->enum('genre',array('Masculin','Feminin','Autre'));
            $table->string('photo')->nullable();
            $table->enum('profil',array('Administrateur','ONG','Demandeur'));
            $table->longText('description')->nullable();;
            $table->softDeletes();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
