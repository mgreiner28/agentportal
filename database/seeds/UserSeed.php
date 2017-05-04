<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$t6UcM2jn43UQxO5/8aGeAeiO76UJCZxaN4jwLevMSzwT0zr8gSmGK', 'role_id' => 1, 'remember_token' => '', 'approved' => 1,],
            ['id' => 2, 'name' => 'test name', 'email' => 'test@email.com', 'password' => '$2y$10$WSmj4bQ35JHNw4kPuDozKehgIh.ANt4GcvEL12SZ6Pd8XXCLqHR8W', 'role_id' => 2, 'remember_token' => null, 'approved' => 1,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
