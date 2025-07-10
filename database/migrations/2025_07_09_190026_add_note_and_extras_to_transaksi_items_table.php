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
    Schema::table('transaksi_items', function (Blueprint $table) {
        if (!Schema::hasColumn('transaksi_items', 'extras')) {
            $table->text('extras')->nullable()->after('note'); // hanya tambah kolom `extras`
        }
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('transaksi_items', function (Blueprint $table) {
        $table->dropColumn(['note', 'extras']);
    });
}
};
