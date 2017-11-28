<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            //$table->integer('id')->primary();
            $table->increments('id');
            $table->string('name', 200);
            $table->string('pass', 200);
            $table->string('email', 200);
            
        });

        DB::table('users')->insert(
            ['name' =>'osman', 'pass' => 'Aa*111', 'email' => 'hassanmdosman@gmail.com']
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
