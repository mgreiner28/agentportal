<?php

use Illuminate\Database\Seeder;

class SaleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'test1' => 'test content', 'test2' => 'test content', 'test3' => 'test content', 'created_by_id' => 1,],

        ];

        foreach ($items as $item) {
            \App\Sale::create($item);
        }
    }
}
