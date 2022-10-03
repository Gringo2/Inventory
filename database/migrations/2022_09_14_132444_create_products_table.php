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
            $value = 1;
            $table->id();
            $table->string('product_name');
            $table->text('description');
            $table->string('brand');
            $table->string('quantity');
            $table->float('price')->default($value);
            $table->float('subtotal')->nullable($value = true);
            $table->integer('stock')->nullable($value = true);
            $table->foreignid('categoryid')->nullable($value = true);
            $table->foreignid('supplierid')->nullable($value = true);
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
