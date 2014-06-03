<?php


class CategoriesTableSeeder extends Seeder
{

    public function run()
    {
        $categoryDataSet = [
            ['name' => 'No Category'],
            ['name' => 'Science'],
            ['name' => 'Finance'],
            ['name' => 'Algebra']
        ];

        foreach ($categoryDataSet as $categoryData) {
            $category = new Category;
            $category->fill($categoryData);
            $category->save();
        }
    }

}