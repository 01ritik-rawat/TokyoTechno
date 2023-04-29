<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert(
        [
            'name' => 'LG Mobile ',
            'price' => '10000 ',
            'category' => 'mobile',
            'gallery' => 'https://fdn2.gsmarena.com/vv/bigpic/lg-k62.jpg',
            'description' => '******* smartphone description*******  ',
            
        ],
        [
            'name' => 'Oppo Mobile ',
            'price' => '10000 ',
            'category' => 'mobile',
            'gallery' => 'https://cdn1.smartprix.com/rx-iuvs4uvlM-w1200-h1200/uvs4uvlM.jpg',
            'description' => '******* smartphone description*******  ',
            
        ],
        [
            'name' => 'TV Toshiba ',
            'price' => '10000 ',
            'category' => 'TV',
            'gallery' => 'https://fdn2.gsmarena.com/vv/bigpic/lg-k62.jpg',
            'description' => '******* smartTV description*******  ',
            
        ],
        [
            'name' => 'TV Samsung ',
            'price' => '10000 ',
            'category' => 'TV',
            'gallery' => 'https://cdn1.smartprix.com/rx-irn5H4nIi-w1200-h1200/rn5H4nIi.jpg',
            'description' => '******* smartTV description*******  ',
            
        ],
        [
            'name' => 'Sony Play Station 5 ',
            'price' => '50000 ',
            'category' => 'gaming',
            'gallery' => 'https://images.indianexpress.com/2021/02/PS5-FB-1.jpg',
            'description' => '******* smartphone description*******  ',
            
        ],
    );
    }
}
