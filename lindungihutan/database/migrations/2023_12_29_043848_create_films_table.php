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
            $table->foreign('genre')->references('code')->on('genres');
            $table->string('artis');
            $table->foreign('artis')->references('code')->on('artis');
            $table->string('produser');
            $table->foreign('produser')->references('code')->on('produsers');
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
