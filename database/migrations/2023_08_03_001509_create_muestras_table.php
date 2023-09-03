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
            
            $table->unsignedBigInteger('subtipo_muestra_id')->nullable();
            $table->foreign('subtipo_muestra_id')
            ->references('id')
            ->on('subtipo_muestras')
            ->onDelete('set null'); 

            $table->unsignedBigInteger('punto_generacion_id')->nullable();
            $table->foreign('punto_generacion_id')
            ->references('id')
            ->on('servicios')
            ->onDelete('set null'); 

            $table->string('material')->default('');
            $table->string('localizacion')->default('');
            $table->string('diagnostico')->default('');
            $table->string('atb')->nullable();
            $table->string('observaciones')->default('');
            $table->string('medico')->default('');
            $table->string('preparador')->default('');
            $table->integer('frascos')->default(0);
            
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
