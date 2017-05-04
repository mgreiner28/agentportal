<?php

use Illuminate\Database\Seeder;

class TestSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'test' => 'me',],
            ['id' => 2, 'test' => 'blah',],

        ];

        foreach ($items as $item) {
            \App\Test::create($item);
        }
    }
}
