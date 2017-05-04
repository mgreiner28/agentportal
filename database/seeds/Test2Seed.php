<?php

use Illuminate\Database\Seeder;

class Test2Seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'test1' => null, 'test2' => null, 'test3' => null, 'test4' => null, 'test5' => null, 'test6' => null, 'test7' => null, 'test8' => null, 'test9' => null, 'test10' => null,],
            ['id' => 2, 'test1' => null, 'test2' => null, 'test3' => null, 'test4' => null, 'test5' => null, 'test6' => null, 'test7' => null, 'test8' => null, 'test9' => null, 'test10' => null,],
            ['id' => 3, 'test1' => null, 'test2' => null, 'test3' => null, 'test4' => null, 'test5' => null, 'test6' => null, 'test7' => null, 'test8' => null, 'test9' => null, 'test10' => null,],
            ['id' => 4, 'test1' => ';lkjsd;lfjksd;fj', 'test2' => 'tesdfd', 'test3' => null, 'test4' => null, 'test5' => null, 'test6' => null, 'test7' => null, 'test8' => null, 'test9' => null, 'test10' => null,],

        ];

        foreach ($items as $item) {
            \App\Test2::create($item);
        }
    }
}
