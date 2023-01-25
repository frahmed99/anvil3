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
        Schema::create('transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('from_account_id');
            $table->unsignedBigInteger('to_account_id');
            $table->float('fromAmount', 15, 4);
            $table->float('toAmount', 15, 4);
            $table->double('rate', 15, 8);
            $table->date('date');
            $table->boolean('reversed')->default(0);
            $table->string('reference');
            $table->text('description')->nullable();
            $table->integer('created_by')->default('0');
            $table->timestamps();
            $table->foreign('from_account_id')->references('id')->on('banks');
            $table->foreign('to_account_id')->references('id')->on('banks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
};
