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
        Schema::create('adjustments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('adjustmentId');
            $table->unsignedBigInteger('bank_id');
            $table->float('amount', 15, 4);
            $table->enum('type', ['Debit', 'Credit']);
            $table->date('date');
            $table->text('reason');
            $table->timestamps();

            $table->foreign('bank_id')
                ->references('id')
                ->on('banks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adjustments');
    }
};
