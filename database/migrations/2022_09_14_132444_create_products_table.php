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
            $table->string('measurment');
            $table->string('quantity');
            $table->float('price')->default($value);
            $table->string('batch_no');
            $table->string('expiry_date');
            $table->float('subtotal')->default($value);
            $table->integer('stock')->default($value);
            $table->foreignid('categoryid')->default($value);
            $table->foreignid('supplierid')->default($value);
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
