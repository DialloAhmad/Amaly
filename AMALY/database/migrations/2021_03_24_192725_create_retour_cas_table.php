<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetourCasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retour_cas', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('image4');
            $table->string('ville');
            $table->string('quartier');
            $table->string('statut')->default(false);
             //clé etrangère de users
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            //clé etrangère de cas
            $table->unsignedBigInteger('cas_id');
            $table->foreign('cas_id')
            ->references('id')
            ->on('cas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('retour_cas');
    }
}
