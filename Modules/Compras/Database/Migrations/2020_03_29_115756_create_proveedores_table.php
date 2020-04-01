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
            $table->string('ubicacion')->nullable($value=true);
            $table->string('tipo_documento')->nullable($value=true);
            $table->string('numero_documento')->nullable($value=true);
            $table->string('telefono')->nullable($value=true);
            $table->string('email')->nullable($value=true);
            $table->string()
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
