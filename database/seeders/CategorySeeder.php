<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'slug' => 'first',
                'translation' => ['az' => 'ilk', 'en' => 'first', 'ru' => 'sdfnkjsdnf'],
                'subcategories' => [
                    [
                        'slug' => 'ikinci',
                        'translation' => ['az' => 'ikinci', 'en' => 'second', 'ru' => 'adasdsad'],
                    ],
                    [
                        'slug' => 'dgdgdgdg',
                        'translation' => ['az' => 'ucuncu', 'en' => 'third', 'ru' => 'kbvdfn'],
                    ],
                    [
                        'slug' => 'dorduncu',
                        'translation' => ['az' => 'dorduncu', 'en' => 'fourth', 'ru' => 'asdasdsadasdas'],
                    ],
                ]
            ],
            [
                'slug' => 'first1',
                'translation' => ['az' => 'ilk1', 'en' => 'first1', 'ru' => 'sdfnkjsdnf1'],
                'subcategories' => [
                    [
                        'slug' => 'ikinci1',
                        'translation' => ['az' => 'ikinci1', 'en' => 'second1', 'ru' => 'adasdsad1'],
                    ],
                    [
                        'slug' => 'gdfgdfg',
                        'translation' => ['az' => 'ucuncu1', 'en' => 'third1', 'ru' => 'kbvdfn1'],
                    ],
                    [
                        'slug' => 'dorduncu1',
                        'translation' => ['az' => 'dorduncu1', 'en' => 'fourth1', 'ru' => 'asdasdsadasdas1'],
                    ],
                ]
            ],
            [
                'slug' => 'first2',
                'translation' => ['az' => 'ilk12', 'en' => 'first12', 'ru' => 'sdfnkjsdnf12'],
            ],
        ];
        foreach ($categories as $cat) {
            $newCategory = new Category();
            $newCategory->slug = $cat['slug'];
            $newCategory->save();
            foreach (active_langs() as $lang) {
                $translation = new CategoryTranslation();
                $translation->locale = $lang->code;
                $translation->category_id = $newCategory->id;
                $translation->name = $cat['translation'][$lang->code];
                $translation->save();
            }
            if (array_key_exists('subcategories', $cat)) {
                foreach ($cat['subcategories'] as $altCat) {
                    $subCategory = new Category();
                    $subCategory->slug = $altCat['slug'];
                    $newCategory->subcategories()->save($subCategory);
                    foreach (active_langs() as $lang) {
                        $subTranslation = new CategoryTranslation();
                        $subTranslation->locale = $lang->code;
                        $subTranslation->category_id = $subCategory->id;
                        $subTranslation->name = $altCat['translation'][$lang->code];
                        $subTranslation->save();
                    }
                }
            }
        }
    }
}
