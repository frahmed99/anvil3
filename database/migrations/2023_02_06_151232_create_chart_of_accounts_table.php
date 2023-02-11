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
        Schema::create('chart_of_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('code')->nullable();
            $table->unsignedBigInteger('chart_of_accounts_subtypes_id')->default(0);
            $table->text('description')->nullable();
            $table->integer('created_by')->default(0);
            $table->timestamps();

            $table->foreign('chart_of_accounts_subtypes_id')->references('id')->on('chart_of_accounts_subtypes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chart_of_accounts');
    }
};
