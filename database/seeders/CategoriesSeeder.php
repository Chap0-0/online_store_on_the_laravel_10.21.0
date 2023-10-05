<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'title' => 'Электроника',
            'slug' => 'electronics',
            'children' => [
                [
                    'title' => 'Компьютеры',
                    'slug' => 'computers',
                    'children' => [
                        [
                            'title' => 'Комплектующие',
                            'slug' => 'accessories',
                            'children' => [
                                ['title' => 'Процессор'],
                                ['title' => 'Оперативная память'],
                                ['title' => 'Материнская плата'],
                                ['title' => 'Блоки питания'],
                            ],
                        ],
                        ['title' => 'Моноблоки'],
                        [
                            'title' => 'Переферия',
                            'children' => [
                                ['title' => 'Клавиатуры'],
                                ['title' => 'Мыши'],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Ноутбуки, планшеты',
                    'slug' => 'laptops-and-tabs',
                    'children' => [
                        [
                            'title' => 'Ноутбуки',
                            'slug' => 'laptops',
                            'children' => [
                                ['title' => 'Apple'],
                                ['title' => 'ASUS'],
                                ['title' => 'HP'],
                                ['title' => 'Acer'],
                                ['title' => 'Honor'],
                                ['title' => 'Microsoft'],
                            ],
                        ],
                        [
                            'title' => 'Планшеты',
                            'slug' => 'tabs',
                            'children' => [
                                ['title' => 'Apple'],
                                ['title' => 'Samsung'],
                                ['title' => 'Lenovo'],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Телефоны и смарт-часы',
                    'slug' => 'phones-and-smart-watch',
                    'children' => [
                        [
                            'title' => 'Смартфоны',
                            'slug' => 'smartphones',
                            'children' => [
                                ['title' => 'Apple'],
                                ['title' => 'Xiaomi'],
                                ['title' => 'Huawei'],
                                ['title' => 'Samsung'],
                                ['title' => 'Honor'],
                            ],
                        ],
                        [
                            'title' => 'Смарт-часы',
                            'slug' => 'smart-watch',
                            'children' => [
                                ['title' => 'Apple'],
                                ['title' => 'Xiaomi'],
                                ['title' => 'Huawei'],
                                ['title' => 'Samsung'],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        Category::create($categories);
    }
}
