<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('trecho_id')->references('id')->on('trechos')->onDelete('cascade');
            $table->foreignId('lote_id')->references('id')->on('lotes')->onDelete('cascade');
            $table->foreignId('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('mast_towers', function(Blueprint $table){
            $table->id();
            $table->foreignId('mast_id')->references('id')->on('masts')->onDelete('cascade');
            $table->foreignId('tower_id')->references('id')->on('towers')->onDelete('cascade');
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
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('mast_towers');
        Schema::dropIfExists('towers');
    }
}
