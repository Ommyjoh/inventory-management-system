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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('iNo');
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('supplier_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('qty');
            $table->integer('discount')->nullable();
            $table->integer('totalPrice');
            $table->string('status');
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
        Schema::dropIfExists('invoices');
    }
};
