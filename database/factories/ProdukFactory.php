<?php

namespace Database\Factories;

use App\Models\Jenis;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hargabeli = $this->faker->numberBetween(10_000, 500_000);

       
        $userId = User::where('role_id', 1)->inRandomOrder()->value('id') ?? 1;

        
        $jenisId = Jenis::inRandomOrder()->value('id') 
            ?? Jenis::firstOrCreate(
                ['nama_jenis' => 'Umum'],
                ['user_id' => $userId]
            )->id;

        return [
            'user_id'    => $userId,
            'jenis_id'   => $jenisId,
            'foto'       => 'Produk/' . $this->faker->uuid() . '.jpg',
            'nama'       => $this->faker->words(3, true),
            'harga_beli' => $hargabeli,
            'harga_jual' => $hargabeli + $this->faker->numberBetween(10_000, 500_000), 
            'stok'       => $this->faker->numberBetween(1, 500),
        ];
    }
}