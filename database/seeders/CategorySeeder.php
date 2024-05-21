<?php

namespace Database\Seeders;

use App\Models\app\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'T-Shirt',
                'image' => 'img-1.png'
            ],
            [
                'title' => 'Trousers',
                'image' => 'img-2.png'
            ],
            [
                'title' => 'Shoe',
                'image' => 'img-6.png'
            ],
            [
                'title' => 'Jacket',
                'image' => 'img-4.png'
            ],
            [
                'title' => 'Hat',
                'image' => 'img-5.png'
            ],
            [
                'title' => 'Bag',
                'image' => 'img-3.png'
            ],
        ];

        foreach ($data as $item) {
            Category::create($item);
        }
    }
}
