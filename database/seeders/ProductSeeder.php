<?php

namespace Database\Seeders;

use App\Models\app\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataProduct = [
            [
                'title' => 'CELANA PRIA CHINO Slim fit Panjang Kerja kantor Santai Liburan Cowok Gentleman Boy Skinnyhtytth',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
                'category_id' => 2,
                'sizes' => json_encode(['XS', 'S', 'M', 'L', 'XL']),
                'prices' => json_encode([
                    'XS' => '200000',
                    'S' => '300000',
                    'M' => '400000'
                ]),
                'colors' => json_encode(['maroon', 'green', 'yellow', 'navy']),
                'images' => json_encode([
                    'product-dummy/cc-1.jpg',
                    'product-dummy/cc-2.jpg',
                    'product-dummy/cc-3.jpg',
                    'product-dummy/cc-4.jpg',
                    'product-dummy/cc-5.jpg',
                    'product-dummy/cc-6.jpg',
                    'product-dummy/cc-7.jpg'
                ]),
                'stock' => 2500
            ],
            [
                'title' => 'NEW ARRIVAL - Tas Ransel Pria Xavier - Tas Kantor - Tas Sekolah - Daily Backpack',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud',
                'category_id' => 6,
                'sizes' => json_encode(['38', '39', '40', '41', '42', '43']),
                'prices' => json_encode([
                    '38' => '250000',
                    '39' => '300000',
                    '40' => '320000',
                    '41' => '350000',
                    '42' => '450000',
                    '43' => '600000',
                ]),
                'colors' => json_encode(['maroon', 'green', 'yellow', 'navy']),
                'images' => json_encode([
                    'product-dummy/tas-1.jpg',
                    'product-dummy/tas-2.jpg',
                    'product-dummy/tas-3.jpg',
                    'product-dummy/tas-4.jpg',
                    'product-dummy/tas-5.jpg',
                    'product-dummy/tas-6.jpg',
                    'product-dummy/tas-7.jpg',
                    'product-dummy/tas-8.jpg',
                    'product-dummy/tas-9.jpg',
                    'product-dummy/tas-10.jpg'
                ]),
                'stock' => 3000
            ],
            [
                'title' => 'Topi Gunung Rimba Tali Hiking Hutan Camping Hat Tali Hitam Cream Hijau Army Coklat Biru Navy Merah Kuning Abu Grey LorengOutbound',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud',
                'category_id' => 5,
                'sizes' => json_encode(['5', '6', '7', '8', '9', '10']),
                'prices' => json_encode([
                    '5' => '56000',
                    '6' => '60000',
                    '7' => '65000',
                    '8' => '68000',
                    '9' => '70000',
                    '10' => '75000',
                ]),
                'colors' => json_encode(['navy', 'white', 'dark green', 'gray', 'black', 'cream']),
                'images' => json_encode([
                    'product-dummy/tc-1.jpg',
                    'product-dummy/tc-2.jpg',
                    'product-dummy/tc-3.png',
                    'product-dummy/tc-4.jpg',
                    'product-dummy/tc-5.jpeg',
                    'product-dummy/tc-6.jpg',
                    'product-dummy/tc-7.jpg',
                ]),
                'stock' => 1400
            ],
            [
                'title' => '[Bahan Premium] Topi Baseball Polos Cakop Ring Besi Termurah Cewek Cowok Topi Bisbol POLOSANT.ID',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud',
                'category_id' => 5,
                'sizes' => json_encode(['8', '9', '10', '11']),
                'prices' => json_encode([
                    '8' => '40000',
                    '9' => '45000',
                    '10' => '50000',
                    '11' => '55000',
                ]),
                'colors' => json_encode(['navy', 'white', 'dark green', 'gray', 'black', 'cream', 'brown']),
                'images' => json_encode([
                    'product-dummy/tpc-1.jpg',
                    'product-dummy/tpc-2.jpg',
                    'product-dummy/tpc-3.jpg',
                    'product-dummy/tpc-4.jpg',
                    'product-dummy/tpc-5.jpg',
                    'product-dummy/tpc-6.jpg',
                    'product-dummy/tpc-7.jpg',
                ]),
                'stock' => 2300
            ],
            [
                'title' => 'Keeping Sepatu Sneakers Pria Putih Sepatu Pria Kets Lari Sepatu Olahraga Cowok Kekinian Dewasa Casual Jogging Running Sport Shoes',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud',
                'category_id' => 3,
                'sizes' => json_encode(['37', '38', '39', '40', '41', '42']),
                'prices' => json_encode([
                    '37' => '175000',
                    '38' => '180000',
                    '39' => '200000',
                    '40' => '220000',
                    '41' => '260000',
                    '42' => '300000',
                ]),
                'colors' => json_encode(['navy', 'white', 'dark green', 'gray', 'black', 'cream', 'brown']),
                'images' => json_encode([
                    'product-dummy/so-1.jpg',
                    'product-dummy/so-2.jpg',
                    'product-dummy/so-3.jpg',
                    'product-dummy/so-4.jpg',
                    'product-dummy/so-5.jpg',
                    'product-dummy/so-6.jpg',
                    'product-dummy/so-7.jpg',
                    'product-dummy/so-8.png',
                    'product-dummy/so-9.jpg',
                    'product-dummy/so-10.jpg',
                ]),
                'stock' => 2300
            ],
            [
                'title' => 'Sepatu Pantofel pria / Sepatu sekolah / Sepatu Kantor pria / Sepatu kerja hitam / Sepatu formal/ sepatu pantofel',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud',
                'category_id' => 3,
                'sizes' => json_encode(['37', '38', '39', '40', '41', '42']),
                'prices' => json_encode([
                    '37' => '175000',
                    '38' => '180000',
                    '39' => '200000',
                    '40' => '220000',
                    '41' => '260000',
                    '42' => '300000',
                ]),
                'colors' => json_encode(['black', 'brown']),
                'images' => json_encode([
                    'product-dummy/sc-1.jpg',
                    'product-dummy/sc-2.jpg',
                    'product-dummy/sc-3.jpg',
                    'product-dummy/sc-4.jpg',
                    'product-dummy/sc-5.jpg',
                    'product-dummy/sc-6.jpg',
                    'product-dummy/sc-7.jpg',
                    'product-dummy/sc-8.jpg',
                ]),
                'stock' => 2300
            ],
            [
                'title' => 'MOVE - TSHIRT BAJU KAOS DISTRO PREMIUM COMBED PRIA WANITA CEWEK COWOK STREETWEAR KEKINIAN KEREN TERLARIS',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud',
                'category_id' => 1,
                'sizes' => json_encode(['37', '38', '39', '40', '41', '42']),
                'prices' => json_encode([
                    '37' => '175000',
                    '38' => '180000',
                    '39' => '200000',
                    '40' => '220000',
                    '41' => '260000',
                    '42' => '300000',
                ]),
                'colors' => json_encode(['black', 'brown', 'maroon', 'navy', 'green', 'gray']),
                'images' => json_encode([
                    'product-dummy/bc-1.jpg',
                    'product-dummy/bc-2.jpg',
                    'product-dummy/bc-3.jpg',
                    'product-dummy/bc-4.jpg',
                    'product-dummy/bc-5.jpg',
                    'product-dummy/bc-6.jpg',
                    'product-dummy/bc-7.jpg',
                    'product-dummy/bc-8.jpg',
                    'product-dummy/bc-9.jpg',
                    'product-dummy/bc-10.jpg',
                    'product-dummy/bc-11.jpg',
                ]),
                'stock' => 2300
            ],
            [
                'title' => 'jaket pria formal casual TERBARU jaket kantor TERLARIS',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud',
                'category_id' => 4,
                'sizes' => json_encode(['L', 'M', 'XL', 'XXL']),
                'prices' => json_encode([
                    'L' => '110000',
                    'M' => '150000',
                    'XL' => '170000',
                    'XXL' => '190000',
                ]),
                'colors' => json_encode(['black', 'brown', 'maroon', 'navy', 'green', 'gray']),
                'images' => json_encode([
                    'product-dummy/jc-1.jpg',
                    'product-dummy/jc-2.jpg',
                    'product-dummy/jc-3.jpg',
                    'product-dummy/jc-4.jpg',
                    'product-dummy/jc-5.jpg',
                    'product-dummy/jc-6.jpg',
                    'product-dummy/jc-7.jpg',
                    'product-dummy/jc-8.jpg',
                    'product-dummy/jc-9.jpg',
                    'product-dummy/jc-10.jpg',
                    'product-dummy/jc-11.jpg',
                ]),
                'stock' => 2300
            ],
        ];

        foreach ($dataProduct as $product) {
            Product::create($product);
        }
    }
}
