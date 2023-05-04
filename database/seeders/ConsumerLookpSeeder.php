<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsumerLookpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('consumer_lookups')->insert([
            // [
            //     'lookup_type' => 'PURCHASE',
            //     'lookup_key' => 'DELIVERY_CHARGES',
            //     'lookup_value' => json_encode(["japan" => "500", "india" => "200",]),
            // ],
            // [
            //     'lookup_type' => 'TAX',
            //     'lookup_key' => 'TAX',
            //     'lookup_value' => json_encode(["japan" => "9.8", "india" => "9.8",]),
            // ],
            [
                'lookup_type' => 'CONSUMER_PRODUCT',
                'lookup_key' => 'CONSUMER_PRODUCT_CATEGORY',
                'lookup_value' => json_encode(
                    [
                        "alexa_skills" => "Alexa Skills",
                        "amazon_devices " => "Amazon Devices ",
                        "fashion" => "Amazon Fashion",
                        "amazon_pharmacy" => "Amazon Pharmacy ",
                        "appliances" => "Appliances ",
                        "mobile_apps " => "Apps &amp; Games",
                        "baby" => "Baby ",
                        "beauty" => "Beauty ",
                        "stripbooks" => "Books",
                        "automotive" => "Car &amp; Motorbike",
                        "apparel" => "Clothing &amp; Accessories",
                        "collectibles" => "Collectibles ",
                        "computers" => "Computers &amp; Accessories ",
                        "todays_deals" => "Deals",
                        "electronics " => "Electronics ",
                        "furniture" => "Furniture ",
                        "lawngarden" => "Garden &amp; Outdoors",
                        "gift_cards" => "Gift Cards ",
                        "grocery" => "Grocery &amp; Gourmet Foods ",
                        "hpc" => "Health &amp; Personal Care",
                        "kitchen" => "Home &amp; Kitchen",
                        "industrial" => "Industrial &amp; Scientific",
                        "jewelry" => "Jewellery ",
                        "digital_text" => "Kindle Store ",
                        "luggage" => "Luggage &amp; Bags",
                        "luxury_beauty" => "Luxury Beauty ",
                        "dvd" => "Movies &amp; TV Shows ",
                        "popular" => "Music ",
                        "mi " => "Musical Instruments",
                        "office_products" => "Office Products ",
                        "pets" => "Pet Supplies ",
                        "instant_video" => "Prime Video ",
                        "shoes " => "Shoes &amp; Handbags",
                        "software " => "Software ",
                        "sporting " => "Sports, Fitness &amp; Outdoor",
                        "specialty_aps_sns " => "Subscribe &amp; Save",
                        "home_improvement" => "Tools &amp; Home Impr",
                        "toys" => "Toys &amp; Games ",
                        "under_ten_dollars " => "Under ₹500",
                        "videogames" => "Video Games",
                        "watches" => "Watches ",


                    ]
                ),
            ]
        ]);
    }
}
