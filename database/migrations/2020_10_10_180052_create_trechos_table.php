<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrechosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trechos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lote_id')->references('id')->on('lotes')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('lotes_trecho', function(Blueprint $table){
            $table->id();
            $table->foreignId('lote_id')->references('id')->on('lotes')->onDeelte('cascade');
            $table->foreignId('trecho_id')->references('id')->on('trechos')->onDeelte('cascade');
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
        Schema::dropIfExists('trechos');
    }
}
