<?php

namespace Database\Seeders;

use App\Helpers\Phone;
use App\Models\Dictionaries\Brand;
use App\Models\Dictionaries\City;
use App\Models\Dictionaries\PriceType;
use App\Models\Dictionaries\Region;
use App\Models\Dictionary\Priority;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DictionariesPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = array(
            array(
                 'name' => 'Низкий',
                 'priority' => 10,
            ),
            array(
                'name' => 'Средний',
                'priority' => 50,
            ),
            array(
                'name' => 'Высокий',
                'priority' => 100,
            ),

        );

        foreach ($brands as $brand) {
            Priority::create($brand);
        }
    }
}
