<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userTypes = [
            ['name' => 'admin'],
            ['name' => 'client'],
            ['name' => 'worker'],
        ];

        UserType::insert($userTypes);
    }
}
