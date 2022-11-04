<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Logitech MX',
                'price' => 300000,
                'desc' => 'Mouse fro logitech',
                'stock' => 10
            ],
            [
                'name' => 'Iphone 14',
                'price' => 20000000,
                'desc' => 'Phone',
                'stock' => 5
            ]
        ];

        DB::table('products')->insert($data);
    }
}
