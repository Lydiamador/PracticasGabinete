<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('Pedidos', function (Blueprint $table) {
            $table->string('imagen')->nullable(); // Campo para almacenar la ruta de la imagen
            $table->string('nombre')->nullable(); // Campo para almacenar el nombre
        });
    }

    public function down()
    {
        Schema::table('Pedidos', function (Blueprint $table) {
            $table->dropColumn('imagen');
            $table->dropColumn('nombre');
        });
    }
};
