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

            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->string('fullname'); 
            $table->string('province'); 
            $table->string('city'); 
            $table->string('address');
            $table->string('plaque');
            $table->string('unit')->nullable();

            $table->string('phone'); 
            $table->string('postal_code');

            $table->text('description')->nullable(); 

            $table->enum('payment_method', ['online', 'cash_on_delivery'])->default('online'); 

            $table->decimal('total_price', 12, 2)->default(0); 
            $table->string('status')->default('pending'); 

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
