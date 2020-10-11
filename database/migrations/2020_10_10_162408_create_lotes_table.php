<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('projects_lote', function(Blueprint $table){
            $table->id();
            $table->foreignId('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreignId('lote_id')->references('id')->on('lotes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lotes');
    }
}
