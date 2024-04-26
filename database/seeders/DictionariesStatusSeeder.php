<?php

namespace Database\Seeders;

use App\Helpers\Phone;
use App\Models\Dictionaries\Brand;
use App\Models\Dictionaries\City;
use App\Models\Dictionaries\PriceType;
use App\Models\Dictionaries\Region;
use App\Models\Dictionary\Status;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DictionariesStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = array(
            array(
                'name' => 'Новый',
                'description' => 'Новая задача',
            ),
            array(
                'name' => 'В работе',
                'description' => 'Задача в процессе выполнеия',
            ),
            array(
                'name' => 'Закрыт',
                'description' => 'Завершенная задача',
            ),
        );

        foreach ($brands as $brand) {
            Status::create($brand);
        }
    }
}
