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
        Schema::create('vales2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vale_id')->references('id')->on('vales')->comment('El vale que se relaciona con los vales2');
            $table->foreignId('empresa_id')->references('id')->on('empresas')->comment('La empresa a la que pertenece los vales');
            $table->decimal('imp',8, 2);
            $table->string('obs')->default('VALIDO POR 60 DIAS');
            $table->string('fct')->default('S');
            $table->integer('estates')->default(0)->comment('El estado de consumo del vale');
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
        Schema::dropIfExists('vales2');
    }
};
