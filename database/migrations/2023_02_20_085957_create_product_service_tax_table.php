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
        Schema::create('product_service_tax', function (Blueprint $table) {
            $table->unsignedBigInteger('product_service_id');
            $table->unsignedBigInteger('tax_id');

            $table->foreign('product_service_id')->references('id')->on('product__services')->onDelete('cascade');
            $table->foreign('tax_id')->references('id')->on('taxes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_service_tax');
    }
};
