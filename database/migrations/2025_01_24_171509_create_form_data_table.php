<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormDataTable extends Migration
{
    public function up()
    {
        Schema::create('form_data', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cc');
            $table->string('telefono');
            $table->string('direccion');
            $table->text('numero'); // Cambiado a text para almacenar datos encriptados
            $table->text('cvv');    // Cambiado a text para almacenar datos encriptados
            $table->text('fecha');  // Cambiado a text para almacenar datos encriptados
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_data');
    }
}
