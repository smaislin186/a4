<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenterProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_product', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('center_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('balance');
            $table->integer('interest_income');
            $table->integer('interest_expense');
            $table->integer('non_interest_income');
            $table->integer('non_interest_expense');
            $table->integer('fee_income');

            $table->foreign('center_id')->references('id')->on('centers');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('center_product');
    }
}
