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
        Schema::create('chart_of_accounts_subtypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default();
            $table->unsignedBigInteger('chart_of_accounts_types_id');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('chart_of_accounts_types_id')->references('id')->on('chart_of_accounts_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chart_of_accounts_subtypes');
    }
};
