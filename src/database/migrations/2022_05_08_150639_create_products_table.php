<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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

            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('category_id');

            $table->string('name', 50);
            $table->string('description', 255)->nullable();
            $table->string('photo', 255)->nullable();
            $table->string('photo_thumb', 255)->nullable();
            $table->float('price');
            $table->decimal('unit_price', 10, 2)->nullable();
            $table->string('currency', 3)->nullable();
            $table->string('quantity_per_unit', 50)->nullable();
            $table->decimal('unit_weight', 10, 2)->nullable();

            $table->index(['id', 'name']);

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
};
