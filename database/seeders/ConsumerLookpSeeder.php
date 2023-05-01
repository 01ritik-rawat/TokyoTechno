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
            [
                'lookup_type' => 'PURCHASE',
                'lookup_key' => 'DELIVERY_CHARGES',
                'lookup_value' => json_encode(["japan" => "500", "india" => "200",]),
            ],
            [
                'lookup_type' => 'TAX',
                'lookup_key' => 'TAX',
                'lookup_value' => json_encode(["japan" => "9.8", "india" => "9.8",]),
            ]
        ]);
    }
}
