<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('attribute_group_id')->nullable();
            $table->integer('attribute_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->string('qty')->nullable();
            $table->double('price_increment')->default(0);
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
        Schema::dropIfExists('product_attributes');
    }
}
