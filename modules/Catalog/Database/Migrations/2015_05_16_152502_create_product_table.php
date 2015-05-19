<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('name');
            $table->longText('description');
            $table->integer('product_type_id');
            $table->timestamps();

            $table->foreign('product_type_id')->references('id')->on('product_type');
            $table->foreign('id')->references('product_id')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product');
    }

}