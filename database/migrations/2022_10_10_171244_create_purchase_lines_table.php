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
        Schema::create('purchase_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable($value = true);
            $table->foreignId('purchase_id')->nullable($value = true);
            $table->string('product_name');
            $table->float('unit_price')->nullable($value = true);
            $table->string('unit');
            $table->string('batch_no');
            $table->integer('amount')->nullable($value = true);
            $table->float('total')->nullable($value = true);
            $table->date('expire_date');
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
        Schema::dropIfExists('purchase_lines');
    }
};
