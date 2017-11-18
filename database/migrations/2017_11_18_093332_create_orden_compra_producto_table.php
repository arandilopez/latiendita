<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenCompraProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_compra_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden_compra_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->integer('unidades');
            $table->decimal('importe', 20, 2);
            $table->decimal('precio_unitario', 20, 2);
            $table->string('descripcion')->nullable();
            $table->timestamps();

            $table->foreign('orden_compra_id')->references('id')
                ->on('ordenes_compra');
            $table->foreign('producto_id')->references('id')
                ->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_compra_producto');
    }
}
