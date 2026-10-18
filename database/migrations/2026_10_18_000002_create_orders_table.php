<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('order_number', 50)->unique();
            $table->string('customer_name', 150);
            $table->date('order_date');
            $table->decimal('total_amount', 14, 2);
            $table->enum('status', ['Pending', 'Processing', 'Completed', 'Cancelled'])->default('Pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
