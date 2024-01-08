<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title');
            $table->string('genre');
            $table->foreign('genre')->references('code')->on('genres')->onUpdate('cascade')->onDelete('cascade');
            $table->string('artis');
            $table->foreign('artis')->references('code')->on('artis')->onUpdate('cascade')->onDelete('cascade');
            $table->string('produser');
            $table->foreign('produser')->references('code')->on('produsers')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('income');
            $table->integer('nomination');
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
        Schema::dropIfExists('films');
    }
}
