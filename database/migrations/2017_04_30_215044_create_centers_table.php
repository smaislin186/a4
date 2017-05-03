<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centers', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->string('code')->unique();
            $table->string('name');
            $table->integer('parent_id');
            $table->integer('center_type_id')->unsigned();

            $table->foreign('center_type_id')->references('id')->on('center_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('centers');
    }
}
