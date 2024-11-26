<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // memaanggil seeder ProdukSeeder
        $this->call(ProdukSeeder::class);
    }
}
