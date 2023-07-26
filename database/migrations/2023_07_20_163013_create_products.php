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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->char('title');
            $table->text('description');
            $table->integer('regular_price');
            $table->integer('promotional_price');
            $table->char('currency');
            $table->integer('tax_rate');
            $table->char('status');
            $table->char('link_image');
            $table->char('tags');
            $table->integer('width');
            $table->integer('height');
            $table->integer('weight');
            $table->integer('rating');
            $table->integer('count_reviews');
            $table->integer('selling');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->integer('shipping_fees');
            $table->timestamps();

            $table->softDeletes();



            $table->index('category_id', 'products_category_idx');

            $table->foreign('category_id', 'products_category_fk')->on('categories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
