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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
             $table->string('no_transaction')->unique();

            // Kolom relasi (belum ada constraint)
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('staff_id');

            $table->decimal('total_price', 15, 2)->default(0);
            $table->string('category')->nullable();     // contoh: dine‑in / takeaway
            $table->unsignedInteger('no_antrian');       // urutan transaksi
            $table->string('type_transaction');
            /* ---------- Foreign keys di bagian bawah ---------- */
            $table->foreign('customer_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('staff_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
