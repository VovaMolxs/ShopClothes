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
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('cname')->nullable();
            $table->string('billing_address');
            $table->string('billing_address2')->nullable();
            $table->string('city');
            $table->string('status')->default('payment');
            $table->string('state');
            $table->integer('zipcode');
            $table->string('email');
            $table->string('phone');
            $table->string('comment')->nullable();
            $table->decimal('amount', 10, 2)->unsigned();
            $table->timestamps();

            // внешний ключ, ссылается на поле id таблицы users
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->nullOnDelete();
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
