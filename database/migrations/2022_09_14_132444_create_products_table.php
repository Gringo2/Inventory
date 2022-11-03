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
        Schema::create('products', function (Blueprint $table) {
            $value = 0;
            $table->id();
            $table->string('product_name');
            $table->text('description');
            $table->string('measurement');
            $table->float('purchase_price')->default($value);
            $table->float('wholesale')->default($value);
            $table->float('retail_price')->default($value);
            $table->integer('stock')->default($value);
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
        Schema::dropIfExists('products');
    }
};
