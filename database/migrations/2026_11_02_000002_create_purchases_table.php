<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            // Relasi 1: Pembelian milik satu Supplier (CRUD baru <-> CRUD baru)
            $table->foreignId('supplier_id')->constrained('suppliers')->restrictOnDelete();
            // Relasi 2: Pembelian untuk satu Product (CRUD baru <-> data yang sudah ada).
            // Tabel products memakai PK 'product_id' (increments), jadi kolom FK dibuat unsignedInteger.
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('products')->restrictOnDelete();
            $table->unsignedInteger('quantity');
            $table->decimal('unit_cost', 12, 2);
            $table->date('purchase_date');
            $table->enum('status', ['Pending', 'Received'])->default('Pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
