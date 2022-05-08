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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('added_by');

            $table->string('name', 50);
            $table->string('surname', 50);
            $table->string('title', 50);
            $table->dateTime('hire_date');
            $table->dateTime('termination_date')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('home_phone', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('zip', 10)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('notes', 255)->nullable();
            $table->string('photo', 255)->nullable();
            $table->string('photo_thumb', 255)->nullable();
            $table->float('salary')->nullable();
            $table->string('currency', 3)->nullable();
            $table->string('pay_frequency', 10)->nullable();
            $table->string('pay_type', 10)->nullable();
            $table->string('pay_method', 10)->nullable();
            $table->string('pay_bank', 50)->nullable();
            $table->string('pay_iban', 50)->nullable();

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
        Schema::dropIfExists('employees');
    }
};
