<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
          */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('categorys_id');
            $table->integer('product_types_id');
            $table->integer('brands_id');
            $table->integer('companies_id');
            $table->string('model');
            $table->string('mrp');
            $table->double('price');
            $table->string('image');
            $table->json('attributes')->nullable();
            $table->string('short_descripation')->nullable();
            $table->text('long_descripation')->nullable();
            $table->integer('countrys_id');
            $table->string('meta_tag');
            $table->integer('status')->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('products_attribute', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('created_by')->nullable();
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
