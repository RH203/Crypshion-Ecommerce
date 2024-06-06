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
                'title' => 'Mens Chino Pants - Slim Fit - Long - Office Wear - Casual - Vacation - Gentlemen',
                'description' => 'Upgrade your wardrobe with our versatile Mens Slim Fit Chino Pants. Perfect for the office, casual outings, or vacation, these pants are designed for the modern gentleman.',
                'category_id' => 2,
                'sizes' => json_encode(['XS', 'S', 'M', 'L', 'XL']),
                'prices' => json_encode([
                    'XS' => '120000',
                    'S' => '120000',
                    'M' => '150000',
                    'L' => '150000',
                    'XL' => '150000',
                ]),
                'colors' => json_encode(['Maroon', 'Green', 'Yellow', 'Navy']),
                'images' => json_encode([
                    'product-dummy/cc-1.jpg',
                    'product-dummy/cc-2.jpg',
                    'product-dummy/cc-3.jpg',
                    'product-dummy/cc-4.jpg',
                    'product-dummy/cc-5.jpg',
                    'product-dummy/cc-6.jpg',
                    'product-dummy/cc-7.jpg'
                ]),
                'stock' => 17
            ],
            [
                'title' => 'NEW ARRIVAL - Mens Xavier Backpack - Office Bag - School Bag - Daily Backpack',
                'description' => 'Upgrade your daily essentials with our stylish and functional Xavier Backpack. Perfect for the office, school, or everyday use, this backpack combines practicality with modern design',
                'category_id' => 6,
                'prices' => json_encode([ '345000'
                ]),
                'colors' => json_encode(['Maroon', 'Green', 'Yellow', 'Navy']),
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
                'stock' => 30
            ],
            [
                'title' => 'Mountain Hiking Hat with Strap, Available in Black, Cream, Green, Army, Brown, Navy Blue, Red, Yellow, Grey, and Camouflage for Outdoor Adventures',
                'description' => 'Prepare for your next outdoor adventure with our Mountain Hiking Hats with Strap. Available in a variety of colors, these hats are perfect for hiking, camping, and all your outdoor activities.

                🔥 Why Youll Love Our Hiking Hats:
                -Adventure-Ready Design: Ideal hiking, camping, and exploring the great outdoors.
                -Secure Fit: Equipped with a strap to ensure a snug fit during all your activities.
                -Multiple Colors: Choose from Black, Cream, Green, Army, Brown, Navy Blue, Red, Yellow, Grey, and Camouflage your style.
                -Durable and Comfortable: Made with high-quality materials to withstand rugged outdoor conditions providing comfort.',
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
                'colors' => json_encode(['Navy', 'White', 'Dark Green', 'Gray', 'Black', 'Cream']),
                'images' => json_encode([
                    'product-dummy/tc-1.jpg',
                    'product-dummy/tc-2.jpg',
                    'product-dummy/tc-3.png',
                    'product-dummy/tc-4.jpg',
                    'product-dummy/tc-5.jpeg',
                    'product-dummy/tc-6.jpg',
                    'product-dummy/tc-7.jpg',
                ]),
                'stock' => 14
            ],
            [
                'title' => 'Plain Baseball Cap with Metal Ring, Most Affordable for Men and Women, Available at POLOSANT.ID',
                'description' => 'Add a touch of cool to your look with our Plain Baseball Caps with Metal Ring. Perfect for both men and women, these caps are a must-have accessory for any casual outfit.',
                'category_id' => 5,
                'sizes' => json_encode(['8', '9', '10', '11']),
                'prices' => json_encode([
                    '8' => '40000',
                    '9' => '45000',
                    '10' => '50000',
                    '11' => '55000',
                ]),
                'colors' => json_encode(['Navy', 'White', 'Dark Green', 'Gray', 'Black', 'Cream', 'Brown']),
                'images' => json_encode([
                    'product-dummy/tpc-1.jpg',
                    'product-dummy/tpc-2.jpg',
                    'product-dummy/tpc-3.jpg',
                    'product-dummy/tpc-4.jpg',
                    'product-dummy/tpc-5.jpg',
                    'product-dummy/tpc-6.jpg',
                    'product-dummy/tpc-7.jpg',
                ]),
                'stock' => 23
            ],
            [
                'title' => 'Mens White Sneakers / Mens Casual Running Shoes / Modern Sports Shoes for Jogging and Running',
                'description' => 'Step up your footwear game with our best-selling white sneakers. Whether you’re hitting the gym, going for a run, or just hanging out with friends, these sneakers are your perfect choice.
                🛒 Shop Now and Stay Ahead in Style!',
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
                'colors' => json_encode(['Navy', 'White', 'Dark Green', 'Gray', 'Black', 'Cream', 'Brown']),
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
                'stock' => 3
            ],
            [
                'title' => 'Mens Loafers / School Shoes / Office Shoes / Black Work Shoes / Formal Shoes / Loafers',
                'description' => 'Introducing our latest collection of Mens Loafers and Formal Shoes—the perfect blend of style and sophistication for every occasion, whether its school, the office, or formal events.',
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
                'colors' => json_encode(['Black', 'Brown']),
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
                'stock' => 57
            ],
            [
                'title' => 'Premium Combed Distro T-Shirts for Men and Women, Trendy Streetwear, Best-Selling',
                'description' => 'Elevate your streetwear game with our best-selling premium combed T-shirts. Whether youre hanging out with friends or hitting the streets, these tees are your perfect choice.',
                'category_id' => 1,
                'sizes' => json_encode(['S', 'M', 'L', 'XL', 'XXL']),
                'prices' => json_encode([
                    'S' => '175000',
                    'M' => '180000',
                    'L' => '200000',
                    'XL' => '220000',
                    'XXL' => '260000',
                ]),
                'colors' => json_encode(['Black', 'Brown', 'Maroon', 'Navy', 'Green', 'Gray']),
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
                'stock' => 120
            ],
            [
                'title' => 'Latest Mens Formal Casual Jackets, Best-Selling Office Jackets',
                'description' => 'Upgrade your office wardrobe with our best-selling formal casual jackets. Whether youre heading to an important meeting or a casual get-together, these jackets are your perfect go-to choice.',
                'category_id' => 4,
                'sizes' => json_encode(['L', 'M', 'XL', 'XXL']),
                'prices' => json_encode([
                    'L' => '110000',
                    'M' => '150000',
                    'XL' => '170000',
                    'XXL' => '190000',
                ]),
                'colors' => json_encode(['Black', 'Brown', 'Maroon', 'Navy', 'Green', 'Gray']),
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
                'stock' => 150
            ],
            [
                'title' => 'AUTOMET Womens Tops Casual Dressy Basic T Shirts Loose Fit Crewneck Cap Sleeve Tee Summer Outfits 2024',
                'description' => 'This womens cute T-shirts is suitable for resort wear, spring, concert, festival, night out, going out, beach, date night, vacation, workout, gym, make you comfy in your casual life. You can freely pair it with flat shoes and jeans.',
                'category_id' => 1,
                'sizes' => json_encode(['L', 'M', 'XL', 'XXL']),
                'prices' => json_encode([
                    'L' => '359000',
                    'M' => '400000',
                    'XL' => '400000',
                    'XXL' => '420000',
                ]),
                'colors' => json_encode(['Maroon', 'Navy', 'Green', 'Gray']),
                'images' => json_encode([
                    'product-dummy/maroon.jpg',
                    'product-dummy/navy.jpg',
                    'product-dummy/green.jpg',
                    'product-dummy/grey.jpg'
                ]),
                'stock' => 25
            ],
            [
                'title' => 'Hanes Men Ecosmart Fleece Sweatshirt, Cotton-blend Pullover, Crewneck Sweatshirt for Men, 1 Or 2 Pack Available',
                'description' => 'About this item :
                    -FLEECE TO FEEL GOOD ABOUT - Hanes EcoSmart midweight sweatshirt is made with cotton sourced from American farms.
                    -CLASSIC SILHOUETTE - Basic crewneck sweatshirt shaping for that versatile look you love.
                    -MADE TO LAST - Double-needle stitching at the neck and armholes adds extra quality and sturdiness.
                    -STAYS SOFT - Thick, sturdy fleece stays warm and cozy.
                    -CONVENIENT TEARAWAY TAGS - Say bye-bye to itchy tags.
                    -COLD WATER WASH - Hanes recommends machine washing this sweatshirt cold water to reduce energy usage.',
                'category_id' => 4,
                'sizes' => json_encode(['L', 'M', 'XL', 'XXL']),
                'prices' => json_encode([
                    'L' => '590000',
                    'M' => '590000',
                    'XL' => '600000',
                    'XXL' => '600000',
                ]),
                'colors' => json_encode(['Green', 'Gray']),
                'images' => json_encode([
                    'product-dummy/c7green.jpg',
                    'product-dummy/c7gray.jpg',
                ]),
                'stock' => 5
            ],
            [
                'title' => 'Trendy Queen Womens Long Sleeve Shirts Basic Spring Crop Tops Fall Fashion Layering Slim Fitted Y2k Tops',
                'description' => 'Material - This long sleeve shirt is made of 88% polyester,12% spandex. Llight weight, super soft and high-stretch fabric with a second-skin feel.Design - Cropped and stretch fitted style,crew neck, tight underscrubs layer,you can wear it regularly or fold it up like a crop top,cute,slim fit,casual y2k style',
                'category_id' => 1,
                'sizes' => json_encode(['L', 'M', 'XL', 'XXL']),
                'prices' => json_encode([
                    'L' => '450000',
                    'M' => '460000',
                    'XL' => '460000',
                    'XXL' => '460000',
                ]),
                'colors' => json_encode(['Black']),
                'images' => json_encode([
                    'product-dummy/c8crop.jpg'
                ]),
                'stock' => 25
            ],
            [
                'title' => 'PRETTYGARDEN Womens Fashion Sweater Long Sleeve Casual Ribbed Knit Winter Pullover Sweaters Blouse Top',
                'description' => 'Womens Fall Fashion 2023! This Knit Pullover Sweater Is A Fantastic Piece To Wear In Cold Days. Classic Lantern Sleeves Are Elegant And Retro, Not Only Keeping Warm, But Also Classic And Fashionable Styles. This Pullover Sweater Has Many Colors For Choice: White Fall Sweaters For Women/ Light Apricot Casual Fall Sweater For Women/ Khaki Jumper Casual Knitted Sweaters/ Sky Blue Lantern Sleeve Sweater For Women/ Grey Womens Fall Tops/ Wine Red Knitted Winter Blouse/ Navy Winter Sweaters For Women/ Black Cozy Long Sleeve Knit Sweater',
                'category_id' => 1,
                'sizes' => json_encode(['L']),
                'prices' => json_encode([
                    'L' => '569000',
                ]),
                'colors' => json_encode(['Orange', 'Black', 'Bean Green', 'Sky Blue']),
                'images' => json_encode([
                    'product-dummy/c9orange.jpg',
                    'product-dummy/c9black.jpg',
                    'product-dummy/c9bg.jpg',
                    'product-dummy/c9sb.jpg',
                ]),
                'stock' => 21
            ],
            [
                'title' => 'Amazon Essentials Mens Water-Resistant Insulated Snow Bib Overall',
                'description' => 'Adjustable elastic suspenders, front D-ring gear attachment, boot gaiters with boot hook, elasticated hook and loop adjustable waist tab for a secure fit and a full length center front zipper with snap closure.',
                'category_id' => 1,
                'sizes' => json_encode(['L']),
                'prices' => json_encode([
                    'L' => '1500000',
                ]),
                'colors' => json_encode(['Navy']),
                'images' => json_encode([
                    'product-dummy/gg.jpg'
                ]),
                'stock' => 15
            ],
            [
                'title' => 'Amazon Essentials Men Classic-Fit Stretch Golf Pant (Available in Big & Tall)',
                'description' => 'Train in confidence with these lightweight golf pants featuring a moisture-wicking, gentle stretch and wrinkle-resistant fabric',
                'category_id' => 2,
                'sizes' => json_encode(['L']),
                'prices' => json_encode([
                    'L' => '267000',
                ]),
                'colors' => json_encode(['Navy', 'Choco Burn']),
                'images' => json_encode([
                    'product-dummy/c10nv.jpg',
                    'product-dummy/c10cb.jpg'
                ]),
                'stock' => 15
            ],
            [
                'title' => 'Carhartt Men Loose Fit Heavyweight Short-Sleeve Pocket T-Shirt',
                'description' => 'About this item : Rib-knit crewneck, Side-seamed construction minimizes twisting, Left-chest pocket with sewn-on Carhartt label, Tagless neck label.',
                'category_id' => 1,
                'sizes' => json_encode(['L', 'XLL', 'XXLL']),
                'prices' => json_encode([
                    'L' => '890000',
                    'XLL'  => '890000',
                    'XXL' => '890000',
                ]),
                'colors' => json_encode(['Apple Butter', 'Black', 'Brite Lime']),
                'images' => json_encode([
                    'product-dummy/c11apple.jpg',
                    'product-dummy/c11blk.jpg',
                    'product-dummy/c11bl.jpg'
                ]),
                'stock' => 15
            ],
        ];

        foreach ($dataProduct as $product) {
            Product::create($product);
        }
    }
}
