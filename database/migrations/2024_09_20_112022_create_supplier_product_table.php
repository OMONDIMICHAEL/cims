<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('supplierProduct', function (Blueprint $table) {
            // $table->id();
            $table->bigIncrements('productNum')->primary();
            $table->uuid('productId');//->primary(); // UUID primary key
            $table->string('productName');
            $table->integer('productQuantity');
            $table->text('productDescription');
            $table->decimal('productSellingPrice', 8, 2);
            $table->text('sellingPriceDescription');
            $table->text('productTerms');
            $table->string('supplierName');
            $table->string('supplierEmail');
            $table->string('productImage')->nullable();
            // $table->timestamps();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplierProduct');
    }
};
