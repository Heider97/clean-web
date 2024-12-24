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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained('requests')->onDelete('cascade'); // Associated request
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade'); // Client paying
            $table->foreignId('professional_id')->constrained('users')->onDelete('cascade'); // Professional receiving
            $table->decimal('amount', 10, 2); // Payment amount
            $table->enum('payment_method', ['cash', 'credit_card', 'paypal'])->default('cash'); // Payment method
            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending'); // Transaction status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
