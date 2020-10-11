<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masts', function(Blueprint $table){
            $table->id();
            $table->float('height',8,2,true);
            $table->float('weight',8,2,true)->nullable();
            $table->timestamps();
        });
        Schema::create('type_masts', function(Blueprint $table){
            $table->id();
            $table->foreignId('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreignId('mast_id')->references('id')->on('masts')->onDelete('cascade');
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
        Schema::dropIfExists('type_masts');
        Schema::dropIfExists('masts');
    }
}
