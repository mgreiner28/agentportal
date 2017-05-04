<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(FaqCategorySeed::class);
        $this->call(FaqQuestionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(SaleSeed::class);
        $this->call(Test1Seed::class);
        $this->call(Test2Seed::class);
        $this->call(TestSeed::class);
        $this->call(UserActionSeed::class);

    }
}
