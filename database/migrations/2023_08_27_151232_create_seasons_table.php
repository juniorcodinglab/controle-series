<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('number'); // Inteiro Pequeno e +
            $table->foreignId('series_id')->constrained()->onDelete('cascade'); // Reconhece a 'referencia' id e o on 'series'

            // Mesma coisa que:
            // $table->unsignedBigInteger('series_id'); //Inteiro Grande e +
            // $table->foreign('series_id')->references('id')->on('series');
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
        Schema::dropIfExists('seasons');
    }
};
