<?php

namespace Database\Seeders;

use App\Models\ProductPropertyValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductPropertyValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties_values = [
            [
                'property_value' => 'Черный',
                'product_type_id' => 1,
                'property_id' => 1,
            ],
            [
                'property_value' => 'Черный',
                'product_type_id' => 4,
                'property_id' => 1,
            ],
            [
                'property_value' => 'Розовый',
                'product_type_id' => 2,
                'property_id' => 1,
            ],
            [
                'property_value' => 'Розовый',
                'product_type_id' => 5,
                'property_id' => 1,
            ],
            [
                'property_value' => 'Зеленый',
                'product_type_id' => 3,
                'property_id' => 1,
            ],
            [
                'property_value' => 'Розовый',
                'product_type_id' => 6,
                'property_id' => 1,
            ],
            [
                'property_value' => '256 ГБ',
                'product_type_id' => 1,
                'property_id' => 2,
            ],
            [
                'property_value' => '128 ГБ',
                'product_type_id' => 4,
                'property_id' => 2,
            ],
            [
                'property_value' => '256 ГБ',
                'product_type_id' => 2,
                'property_id' => 2,
            ],
            [
                'property_value' => '128 ГБ',
                'product_type_id' => 5,
                'property_id' => 2,
            ],
            [
                'property_value' => '256 ГБ',
                'product_type_id' => 3,
                'property_id' => 2,
            ],
            [
                'property_value' => '128 ГБ',
                'product_type_id' => 6,
                'property_id' => 2,
            ],
        ];
        foreach ($properties_values as $properties_values_data) {
            ProductPropertyValue::updateOrInsert($properties_values_data);
        }
    }
}
