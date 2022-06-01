<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBestsellerProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bestseller_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();

            $table->unsignedBigInteger('seller_id')->nullable();
            
            $table->unsignedBigInteger('category_id')->nullable();
            
            $table->unsignedBigInteger('number_of_sales')->nullable();
            
            $table->float('profit')->length(13,2)->nullable();
            

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
        Schema::dropIfExists('bestseller_products');
    }
}
