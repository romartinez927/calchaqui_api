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
        Schema::create('trazabilidades', function (Blueprint $table) {
            $table->id();
            $table->string("model_type");
            $table->unsignedBigInteger("model_id");
            $table->foreignId("punto_de_control_id")->constrained('puntos_de_control'); // Ajusta el nombre de la tabla si es diferente
            $table->string("recibido_por");
            $table->string("entregado_por");
            $table->string("url_informe")->nullable();
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
        Schema::dropIfExists('trazabilidades');
    }
};
