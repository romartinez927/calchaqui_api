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
        Schema::disableForeignKeyConstraints();

        Schema::create('muestras', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('paciente_id')->nullable();
            $table->foreign('paciente_id')
            ->references('id')
            ->on('pacientes')
            ->onDelete('set null'); 

            $table->unsignedBigInteger('tipo_muestra_id')->nullable();
            $table->foreign('tipo_muestra_id')
            ->references('id')
            ->on('tipo_muestras')
            ->onDelete('set null'); 

            $table->string('subtipo_muestra');
            $table->string('punto_generacion');
            $table->string('material');
            $table->string('localizacion');
            $table->string('diagnostico');
            $table->string('observaciones');
            $table->integer('frascos');
            
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('muestras');
    }
};
