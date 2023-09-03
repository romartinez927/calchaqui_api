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
        Schema::create('subtipo_muestras', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->boolean("disponible");

            $table->unsignedBigInteger('tipo_muestra_id')->nullable();
            $table->foreign('tipo_muestra_id')
            ->references('id')
            ->on('tipo_muestras')
            ->onDelete('set null'); 
            
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
        Schema::dropIfExists('subtipo_muestras');
    }
};
