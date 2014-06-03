<?php

class TagsTableSeeder extends Seeder
{

    public function run()
    {
        $tagDataSet = [
            ['name' => 'New'],
            ['name' => 'Tip'],
            ['name' => 'Finance'],
            ['name' => 'Handy']
        ];

        foreach ($tagDataSet as $tagData) {
            $tag = new Tag;
            $tag->fill($tagData);
            $tag->save();
        }
    }

}