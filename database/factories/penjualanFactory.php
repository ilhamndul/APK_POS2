<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Penjualan;
use App\Models\User;

/**
 * @extends Factory<penjualan>
 */
class penjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Penjualan::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->value('id'),
            'total_pembayaran' => 0,// akan di update seeder
            'metode_pembayaran' =>$this->faker->randomElement([
                'CASH', 'TRANSFER', 'QRIS'
            ]),
             'status' => $this->faker->randomElement(['OPEN']),
        ];
    }
}
