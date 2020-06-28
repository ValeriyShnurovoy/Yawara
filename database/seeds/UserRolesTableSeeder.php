<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesTableSeeder extends Seeder
{

    private $roles = [
        'user',
        'owner',
        'admin',
        'employee',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_role')->truncate();

        foreach ($this->roles as $role) {
            DB::table('user_role')->insert([
                'name' => $role,
            ]);
        }
    }
}