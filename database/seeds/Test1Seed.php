<?php

use Illuminate\Database\Seeder;

class Test1Seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'test5' => null, 'test6' => null, 'test7' => null, 'test8' => null, 'test9' => null,],

        ];

        foreach ($items as $item) {
            \App\Test1::create($item);
        }
    }
}
