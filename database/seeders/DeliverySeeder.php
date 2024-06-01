<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Faster',
                'estimation' => '3 - 4',
                'cost' => 35000
            ],
            [
                'name' => 'Reguler',
                'estimation' => '5 - 8',
                'cost' => 27000
            ],
            [
                'name' => 'Economic',
                'estimation' => '8 - 13',
                'cost' => 18000
            ]
        ];
        Delivery::insert($data);
    }
}
