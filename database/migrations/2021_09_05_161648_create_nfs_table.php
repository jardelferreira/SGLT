<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nfs', function (Blueprint $table) {
            $table->id();
            $table->string('cliente');
            $table->string('nf')->unique();
            $table->string('tipo',15);
            $table->string('cod');
            $table->string('arquive');
            $table->string('description');
            $table->integer('reference')->nullable();
            $table->float('val');
            $table->foreignId('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('item_nf', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->string('cod');
            $table->string('und');
            $table->float('qtd');
            $table->float('val_unt');
            $table->foreignId('nf_id')->references('id')->on('nfs')->onDelete("cascade");
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
        Schema::dropIfExists('item_nf');
        Schema::dropIfExists('nfs');
    }
}
