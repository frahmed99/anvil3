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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customerId');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact')->nullable();
            $table->integer('createdBy')->default(0);
            $table->string('taxId');
            $table->string('billingName');
            $table->string('billingCountry');
            $table->string('billingState');
            $table->string('billingCity');
            $table->string('billingZip');
            $table->text('billingAddress');
            $table->string('shippingName');
            $table->string('shippingCountry');
            $table->string('shippingState');
            $table->string('shippingCity');
            $table->string('shippingZip');
            $table->text('shippingAddress');
            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
};
