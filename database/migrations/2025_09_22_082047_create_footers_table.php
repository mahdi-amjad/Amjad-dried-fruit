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
        Schema::create('footers', function (Blueprint $table) {
           $table->id();
        $table->string('phone')->nullable();
        $table->string('email')->nullable();
        $table->text('address')->nullable();
        $table->string('instagram')->nullable();
        $table->string('telegram')->nullable();
        $table->string('whatsapp')->nullable();
        $table->text('copyright')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
