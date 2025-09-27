<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code')->unique();
            $table->string('name');
            $table->text('description');
            $table->text('caption');
            $table->bigInteger('price');
            $table->string('status')->default(0);
            $table->foreignId('Id_category')->constrained('categories')->onDelete('cascade');;
            $table->text('image');
            $table->boolean('is_special_offer')->default(false);
            $table->boolean('is_suggested')->default(false);
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
}
