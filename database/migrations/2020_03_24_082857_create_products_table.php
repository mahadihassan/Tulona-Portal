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
            $table->string('name', 200)->nullable();
            $table->tinyinteger('featured')->nullable();
            $table->integer('categorys_id')->nullable();
            $table->integer('product_types_id')->nullable();
            $table->integer('brands_id')->nullable();
            $table->integer('companies_id')->nullable();
            $table->integer('countrys_id')->nullable();
            $table->string('meta_tag')->nullable();
            $table->string('model')->nullable();
            $table->double('mrp')->default(0);
            $table->string('short_descripation', 200)->nullable();
            $table->text('long_descripation')->nullable();
            $table->tinyinteger('status')->default(1);
            $table->tinyinteger('created_by')->nullable();
            $table->tinyinteger('updated_by')->nullable();
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
        Schema::dropIfExists('products');
    }
}
