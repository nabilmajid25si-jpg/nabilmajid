<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('analysts', function (Blueprint $table) {
            $table->increments('analyst_id');
            $table->string('name', 150);
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->string('specialization', 100);
            $table->date('hire_date');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('analysts');
    }
};
