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
        Schema::create('quotation_number', function (Blueprint $table) {
            $table->id();
            $table->string('prefix');
            $table->unsignedInteger('lastNumber')->default(0);
            $table->timestamps();
        });

        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('quotation_number');
            $table->unsignedBigInteger('customer_id');
            $table->date('issue_date');
            $table->date('expiry_date')->nullable();
            $table->enum('status', ['declined', 'accepted', 'waiting', 'sent', 'draft', 'canceled'])->default('waiting');
            $table->integer('discount_apply')->default('0');
            $table->unsignedInteger('currency_code');
            $table->string('purcahse_order')->nullable();
            $table->string('sub_headding')->nullable();
            $table->longText('memo')->nullable();
            $table->mediumText('footer')->nullable();
            $table->integer('created_by')->default('0');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });

        Schema::create('quotation_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quotation_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->decimal('unit_price', 8, 2);
            $table->decimal('total_price', 8, 2);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('quotation_id')->references('id')->on('quotations')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product__services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
};
