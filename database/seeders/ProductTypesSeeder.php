<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_types = [
            [
                'product_id' => 1,
                'price' => 129990,
                'name_type' => 'Черный,256 ГБ',
                'main_image' => 'https://static.re-store.ru/upload/resize_cache/iblock/0b4/100500_800_140cd750bba9870f18aada2478b24840a/2903b9h9f5aq6gars37yr6mp4dkv53cu.jpg',
            ],
            [
                'product_id' => 1,
                'price' => 129990,
                'name_type' => 'Розовый,256 ГБ',
                'main_image' => 'https://static.re-store.ru/upload/resize_cache/iblock/8cd/100500_800_140cd750bba9870f18aada2478b24840a/3paf42sx47boqu720ihb2l6tx2ljwl5b.jpg',
            ],
            [
                'product_id' => 1,
                'price' => 129990,
                'name_type' => 'Зеленый,256 ГБ',
                'main_image' => 'https://static.re-store.ru/upload/resize_cache/iblock/5ec/100500_800_140cd750bba9870f18aada2478b24840a/j6p66qupaml589xhp4lzcw9mpd3m56zz.jpg',
            ],
            [
                'product_id' => 1,
                'price' => 119990,
                'name_type' => 'Черный,128 ГБ',
                'main_image' => 'https://static.re-store.ru/upload/resize_cache/iblock/0b4/100500_800_140cd750bba9870f18aada2478b24840a/2903b9h9f5aq6gars37yr6mp4dkv53cu.jpg',
            ],
            [
                'product_id' => 1,
                'price' => 119990,
                'name_type' => 'Розовый,128 ГБ',
                'main_image' => 'https://static.re-store.ru/upload/resize_cache/iblock/8cd/100500_800_140cd750bba9870f18aada2478b24840a/3paf42sx47boqu720ihb2l6tx2ljwl5b.jpg',
            ],
            [
                'product_id' => 1,
                'price' => 119990,
                'name_type' => 'Зеленый,128 ГБ',
                'main_image' => 'https://static.re-store.ru/upload/resize_cache/iblock/5ec/100500_800_140cd750bba9870f18aada2478b24840a/j6p66qupaml589xhp4lzcw9mpd3m56zz.jpg',
            ],
        ];
        foreach ($product_types as $product_types_data) {
            ProductType::updateOrInsert($product_types_data);
        }
    }
}
