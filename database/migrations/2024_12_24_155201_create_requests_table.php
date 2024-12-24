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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
            $table->string('order')->unique(); // Unique column for the random number

            $table->enum('type_of_cleaning', ['standard', 'deep', 'end_of_work', 'other']);
            $table->string('other_type')->nullable();
            $table->enum('place', ['apartment', 'house', 'commercial_or_office', 'other']);
            $table->string('other_place')->nullable();
            $table->enum('number_of_rooms', ['one_room', 'two_rooms', 'three_rooms', 'four_or_more_rooms', 'other']);
            $table->string('other_number_of_rooms')->nullable();

            $table->enum('number_of_bathrooms', ['one', 'two', 'three_or_more', 'none']);
            $table->string('adicional_services');



            $table->boolean('has_pets')->default(1);
            $table->date('date_service');
            $table->text('description')->nullable();
            $table->text('address');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending', 'accepted', 'rejected', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
