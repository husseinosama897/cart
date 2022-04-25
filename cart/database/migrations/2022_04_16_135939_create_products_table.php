<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->float('price')->nullable();
            $table->integer('qty_type')->length(1)->nullable();
            $table->float('qty')->nullable();
            $table->float('discount')->length(3.2)->nullable();
            $table->float('offer')->nullable();
            $table->string('img')->nullable();
$table->unsignedBigInteger('category_id')->unsigned();
$table->unsignedBigInteger('supplier_id')->unsigned();

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
        Schema::dropIfExists('products');
    }
}
