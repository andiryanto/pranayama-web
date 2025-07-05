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
        // Ubah nama tabel dari 'transactions' menjadi 'transaksis'
        Schema::rename('transactions', 'transaksis');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Jika di-rollback, kembalikan nama tabel dari 'transaksis' menjadi 'transactions'
        Schema::rename('transaksis', 'transactions');
    }
};