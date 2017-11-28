<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            //$table->integer('id')->primary();
            $table->increments('id');
            $table->string('name', 200);
            $table->string('bprice', 200);
            $table->string('price', 200);
            $table->string('model', 200);
            $table->string('catagory', 200);
            $table->integer('quantity');
            $table->string('image')->nullable();
            
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
