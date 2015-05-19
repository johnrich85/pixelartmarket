<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTypeToProductOption extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('product_type_id');
            $table->integer('product_type_option_id');
            $table->timestamps();

            $table->foreign('product_type_id')->references('id')->on('product_type');
            $table->foreign('product_type_option_id')->references('id')->on('product_type_option');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('');
    }

}
