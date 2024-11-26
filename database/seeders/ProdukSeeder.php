<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {
            DB::table('produk')->insert([
                'kategori_produk' => $faker->randomElement(['Handphone Android', 'Handphone iOS']),
                'merk' => $faker->randomElement(['Samsung', 'iPhone', 'Xiaomi', 'Oppo', 'Vivo', 'Huawei']),
                'stok' => $faker->numberBetween(1, 100),
                'harga' => $faker->numberBetween(2000000, 15000000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
