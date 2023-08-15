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

        Schema::create('tipo_muestras', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->boolean("disponible");

            $table->unsignedBigInteger('subtipo_muestra_id')->nullable();
            $table->foreign('subtipo_muestra_id')
            ->references('id')
            ->on('subtipo_muestras')
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
        Schema::dropIfExists('tipo_muestras');
    }
};
