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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('shipper_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('supplier_id');

            $table->string('order_number', 50);
            $table->string('order_date', 50)->nullable();
            $table->string('ship_date', 50)->nullable();
            $table->string('ship_method', 50)->nullable();
            $table->string('ship_address', 100)->nullable();
            $table->string('ship_city', 50)->nullable();
            $table->string('ship_state', 50)->nullable();
            $table->string('ship_zip', 10)->nullable();
            $table->string('ship_country', 50)->nullable();
            $table->string('ship_notes', 255)->nullable();
            $table->string('ship_tracking', 50)->nullable();
            $table->string('ship_tracking_url', 255)->nullable();

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
        Schema::dropIfExists('orders');
    }
};
