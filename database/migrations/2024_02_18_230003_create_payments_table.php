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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->constrained('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('offer_id')->nullable()->constrained('offers')->onDelete('cascade')->onUpdate('cascade');
            $table->float('amount');
            $table->string('transaction_time');
            $table->string('transaction');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
