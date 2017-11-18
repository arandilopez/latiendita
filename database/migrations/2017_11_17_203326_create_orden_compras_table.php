<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_compra', function (Blueprint $table) {
            $table->increments('id');
            $table->string('folio', 60)->nullable();
            $table->decimal('subtotal', 20, 2);
            $table->decimal('iva', 20, 2);
            $table->decimal('descuento', 20, 2);
            $table->decimal('total', 20, 2);
            $table->integer('cliente_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps(); // created_at y updated_at

            $table->foreign('cliente_id')->references('id')
                ->on('clientes');
            $table->foreign('user_id')->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes_compra');
    }
}
