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
        Schema::create('obra_socials', function (Blueprint $table) {
            $table->id();
            $table->string("nombre")->unique();
            $table->string("sigla")->nullable();
            $table->string("provincia")->nullable();
            $table->string("telefono")->nullable();
            $table->string("email")->nullable();
            $table->boolean("habilitado")->default(true);
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
        Schema::dropIfExists('obra_socials');
    }
};
