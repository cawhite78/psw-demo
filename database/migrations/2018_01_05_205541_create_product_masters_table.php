<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_master', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->primary('id');
            $table->string('name',128);
            $table->boolean('above_ground')->nullable();
            $table->text('attributes')->nullable();
            $table->text('description')->nullable();
            $table->string('type_category');
            $table->string('brand');
            $table->text('media')->nullable();
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
        Schema::dropIfExists('product_masters');
    }
}
