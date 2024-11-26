<?php

namespace Database\Factories;

use App\Models\Produk;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    protected $model = Produk::class;

    public function definition()
    {
        return [
            'kategori_produk' => $this->faker->randomElement(['Handphone Android', 'Handphone iOS']),
            'merk' => $this->faker->randomElement(['Samsung', 'iPhone', 'Xiaomi', 'Oppo', 'Vivo', 'Huawei']),
            'stok' => $this->faker->numberBetween(1, 100),
            'harga' => $this->faker->numberBetween(2000000, 15000000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

