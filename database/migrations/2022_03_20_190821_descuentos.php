<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Descuentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('venta_id');
            $table->integer('tienda_id');
            $table->integer('empleado_id');
            $table->integer('Horas_Entrada');
            $table->integer('Horas_Salida');
            $table->integer('Horas_Totales');
            $table->double('Sueldo',10,5);
            $table->double('Descuento',10,5);
            $table->double('Total',10,5);
            $table->timestamp('CREATED_AT')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
