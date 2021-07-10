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
            $table->unsignedBigInteger('category')->nullable();
            $table->unsignedBigInteger('sub_category')->nullable();
            $table->unsignedBigInteger('brand')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('p_code');
            $table->string('discount')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('buying_price')->nullable();
            $table->longText('description')->nullable();
            $table->string('images')->nullable();
            $table->string('status')->default(0)->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();


            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('sub_category')->references('id')->on('subcategories');
            $table->foreign('brand')->references('id')->on('brands');
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
