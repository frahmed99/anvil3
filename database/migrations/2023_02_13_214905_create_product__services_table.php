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
        Schema::create('product__services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('sku')->nullable();
            $table->float('salePrice', 20)->default(0.0)->nullable();
            $table->float('purchasePrice', 20)->default(0.0)->nullable();
            $table->integer('quantity')->default(0)->nullable();
            $table->unsignedBigInteger('tax_id')->nullable()->index('products_tax_id_foreign');
            $table->unsignedBigInteger('category_id')->nullable()->index('products_category_id_foreign');
            $table->unsignedBigInteger('sub_category_id')->nullable()->index('products_sub_category_id_foreign');
            $table->unsignedBigInteger('unit_id')->nullable()->index('products_unit_id_foreign');
            $table->unsignedBigInteger('income_account_id')->nullable()->index('products_income_account_id_foreign');
            $table->unsignedBigInteger('expense_account_id')->nullable()->index('products_expense_account_id_foreign');
            $table->enum('type', ['Product', 'Service']);
            $table->text('description')->nullable();
            $table->integer('created_by')->default(0);
            $table->timestamps();
            $table->foreign('tax_id')->references('id')->on('taxes')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->foreign(['category_id'])->references(['id'])->on('categories')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['sub_category_id'])->references(['id'])->on('sub_categories')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('income_account_id')->references('id')->on('chart_of_accounts')->onDelete('cascade');
            $table->foreign('expense_account_id')->references('id')->on('chart_of_accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product__services');
    }
};
