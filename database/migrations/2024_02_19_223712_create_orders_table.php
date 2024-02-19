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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('offer_id')->nullable()->constrained('offers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('email')->unique();
            $table->string("phone")->unique();
            $table->float('price')->unsigned()->default(0);
            $table->foreignId('payment_id')->constrained('payments')->onDelete('cascade')->onUpdate('cascade');
            $table->text('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
