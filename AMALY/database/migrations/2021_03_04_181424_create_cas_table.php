<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        
        Schema::create('cas', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->longText('description');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('image4');
            $table->string('numero');
            $table->softDeletes();
            $table->double('montant');
            $table->string('ville');
            $table->string('quartier');
            $table->boolean('statut')->default(false);
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('cas');
    }
}
