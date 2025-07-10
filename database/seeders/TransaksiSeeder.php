<?php

namespace Database\Seeders; 
use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use App\Models\TransaksiItem;
use App\Models\User;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate([
        'id' => 1
    ], [
        'name' => 'Dummy User',
        'email' => 'dummy@example.com',
        'password' => bcrypt('password')
    ]);
        $transaksi = Transaksi::create([
            'no_transaction' => 'TRX-001',
            'type_transaction' => 'dine-in',
            'total_price' => 45000,
            'customer_id' => 1,
            'staff_id' => 1,
            'category' => 'Coffee',
            'no_antrian' => '1',
            'status' => 'success'
        ]);

        TransaksiItem::create([
            'transaksi_id' => $transaksi->id,
            'nama_produk' => 'Americano',
            'qty' => 1,
            'harga' => 15000
        ]);

        TransaksiItem::create([
            'transaksi_id' => $transaksi->id,
            'nama_produk' => 'Latte',
            'qty' => 2,
            'harga' => 15000
        ]);
    }
}
