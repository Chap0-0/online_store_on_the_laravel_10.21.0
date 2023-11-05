<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            [
                'name_property' => 'Цвет',
            ],
            [
                'name_property' => 'Объем памяти',
            ]
        ];
        foreach ($properties as $propertyData) {
            Property::updateOrInsert($propertyData);
        }
    }
}
