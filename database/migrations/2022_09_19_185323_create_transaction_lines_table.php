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
        Schema::create('transaction_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('transaction_id');
            $table->string('product_name');
            $table->float('unit_price');
            $table->string('unit');
            $table->string('batch_no');
            $table->integer('amount');
            $table->float('total');
            $table->string('expire_date');
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
        Schema::dropIfExists('transaction_lines');
    }
};
