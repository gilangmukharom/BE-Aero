<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            'nama_maskapai' => 'Garuda Indonesia',
            'tujuan' => 'Yogyakarta',
            'tanggal_keberangkatan' => '2024-01-15',
            'jam_keberangkatan' => '08:00',
            'harga' => 750000.00,
        ]);
    }
}