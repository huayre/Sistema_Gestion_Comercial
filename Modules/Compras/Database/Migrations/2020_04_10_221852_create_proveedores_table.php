<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_empresa');
            $table->string('direccion')->nullable($value=true);
            $table->string('ubicacion_departamento');
            $table->string('ubicacion_provincia');
            $table->string('ubicacion_distrito');
            $table->string('tipo_documento');
            $table->string('numero_documento');
            $table->string('telefono')->nullable($value=true);
            $table->string('email')->nullable($value=true);
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
        Schema::dropIfExists('proveedores');
    }
}
