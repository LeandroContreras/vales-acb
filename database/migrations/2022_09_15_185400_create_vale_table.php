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
        Schema::create('vales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->references('id')->on('empresas')->comment('La empresa que se relaciona con los vales');
            $table->foreignId('item_id')->references('id')->on('items')->comment('El item que se relaciona con los vales');
            $table->integer('novales');
            $table->integer('desde');
            $table->integer('hasta');
            $table->decimal('importeuni',8, 2);
            $table->decimal('importetot',8, 2)->nullable();
            $table->decimal('prelitro', 8, 2);
            $table->decimal('litros', 8, 2);
            $table->integer('contador');
            $table->string('obs');
            $table->date('fecha')->comment('La fecha en la que se emite el vale');
            $table->date('fechacc')->comment('La fecha en la que caduca el vale');
            $table->integer('estado')->default(1)->comment('El estado del vale');
            $table->foreignId('user_id')->references('id')->on('users')->comment('El usuario que se relaciona con la creacion de la receta');
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
        Schema::dropIfExists('vales');
    }
};
