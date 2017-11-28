<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            //$table->integer('id')->primary();
            $table->increments('id');
            $table->text('customer');
            $table->text('orders');
            $table->string('revenue', 200);
            $table->string('status', 15)->default('Not Delivered');
            $table->string('delivered_by', 200)->nullable();
            $table->date('date');
            $table->date('delivery_date')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
