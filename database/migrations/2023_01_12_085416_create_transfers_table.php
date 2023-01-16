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
            $table->integer('fromAccount')->default('0');
            $table->integer('toAccount')->default('0');
            $table->float('amount', 15, 2)->default('0');
            $table->date('date');
            $table->integer('paymentMethod')->default('0');
            $table->string('reference')->nullable();
            $table->text('description');
            $table->integer('created_by')->default('0');
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
        Schema::dropIfExists('transfers');
    }
};
