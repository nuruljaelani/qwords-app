<?php

namespace Database\Seeders;

use App\Models\Costumer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CostumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Chelsea Islan',
            'gender' => 'Female',
            'phone' => '08937726681',
            'address' => 'Jakarta'
        ];

        Costumer::create($data);
    }
}
