<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VENTAS', function (Blueprint $table) {
            $table->increments('VENTA_ID');
            $table->integer('PRODUCTO_ID');
            $table->integer('CANTIDAD');
            $table->integer('TIENDA_ID');
            $table->integer('EMPLEADO_ID');
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
        Schema::dropIfExists('VENTAS');
    }
}
