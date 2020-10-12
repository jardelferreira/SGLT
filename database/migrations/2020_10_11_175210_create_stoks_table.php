<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stoks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('item');
            $table->string('cod');
            $table->string('und')->nullable();
            $table->string('description')->nullable();
            $table->float('qtd',8,2,true);
            $table->foreignId('courtyard_id')->references('id')->on('courtyards')->onDelete('cascade');
            $table->foreignId('trecho_id')->references('id')->on('trechos')->onDelete('cascade');
            $table->foreignId('lote_id')->references('id')->on('lotes')->onDelete('cascade');
            $table->foreignId('project_id')->references('id')->on('projects')->onDelete('cascade');
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
        Schema::dropIfExists('stoks');
    }
}
