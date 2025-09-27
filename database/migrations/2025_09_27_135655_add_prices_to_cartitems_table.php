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
        Schema::table('cartitems', function (Blueprint $table) {
            $table->unsignedBigInteger('original_price')->nullable(); // قیمت قبل از تخفیف
            $table->unsignedBigInteger('final_price')->nullable();    // قیمت بعد از تخفیف
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cartitems', function (Blueprint $table) {
            $table->dropColumn('original_price');
            $table->dropColumn('final_price');
        });
    }
};
