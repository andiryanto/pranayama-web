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
        $table->decimal('subtotal', 15, 2)->default(0)->after('harga');
        $table->string('note')->nullable()->after('subtotal');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('transaksi_items', function (Blueprint $table) {
        $table->dropColumn(['subtotal', 'note']);
    });
}

};
