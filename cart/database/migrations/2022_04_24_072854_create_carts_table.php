<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->unsignedBigInteger('supplier_id')->unsigned();
            $table->float('total')->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('packing')->default(0);
            $table->unsignedBigInteger('seller_id')->unsigned();
        
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
        Schema::dropIfExists('carts');
    }
}
