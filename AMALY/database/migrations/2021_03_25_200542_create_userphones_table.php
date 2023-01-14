<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserphonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userphones', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->enum('genre',array('Feminin','Masculin','Autre'));
            $table->string('photo')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userphones');
    }
}
