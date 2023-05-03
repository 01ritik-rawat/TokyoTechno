<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_users')->insert([
            'name' => 'John Doe',
            'customer_id'=>123,
            'email' => 'jhondeo@gmail.com',
            'password' => Hash::make('Staging123$'),
        ]);
        DB::table('admin_users')->insert([
            'name' => 'Ritik Rawat',
            'customer_id'=>124,
            'email' => 'ritik@gmail.com',
            'password' => Hash::make('password'),
        ]);

    }
}
