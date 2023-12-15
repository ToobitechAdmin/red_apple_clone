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
            $table->integer('user_id')->nullable();
            $table->string('order_number')->nullable();
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('area')->nullable();
            $table->string('order_type')->nullable();

            $table->string('transaction_id')->nullable();
            $table->decimal('subtotal', 11, 2)->nullable();
            $table->decimal('delivery_fee', 11, 2)->nullable();
            $table->decimal('total', 11, 2)->nullable();
            $table->string('cancel_by')->nullable();
            $table->integer('cancel_by_user_id')->nullable();
            $table->longText('cancel_reason')->nullable();
            $table->enum('status', ['pending','accept','ready', 'cancel','complete'])->nullable()->default('pending');
            $table->enum('payment_type', ['cod','stripe'])->nullable()->default('cod');

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
