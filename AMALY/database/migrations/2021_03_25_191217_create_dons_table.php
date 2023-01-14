<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dons', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('cas_id');
            $table->foreign('cas_id')
            ->references('id')
            ->on('cas')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->enum('type',array('Argent','Bien(s)'));
            $table->string('don');
            $table->string('quartier')->nullable();
            $table->string('ville')->nullable();
            $table->longtext('description')->nullable();
            $table->string('telephone');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->longText('commentaire')->nullable();
            $table->unsignedBigInteger('userphones_id');
            $table->foreign('userphones_id')
            ->references('id')
            ->on('userphones')
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
        Schema::dropIfExists('dons');
    }
}
