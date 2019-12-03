<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userTypes = [
            ['id' => 1, 'name' => 'admin'],
            ['id' => 2, 'name' => 'company'],
            ['id' => 3, 'name' => 'employer']
        ];

        DB::table('user_types')->insert($userTypes);
    }
}
