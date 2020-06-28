<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    private $users = [
        [
            'name' => 'user',
            'email' => 'a@a.com',
            'password' => 123,
            'role_id' => 1,
        ],
        [
            'name' => 'owner',
            'email' => 'b@a.com',
            'password' => 123,
            'role_id' => 2,
        ],
        [
            'name' => 'admin',
            'email' => 'c@a.com',
            'password' => 123,
            'role_id' => 3,
        ],
        [
            'name' => 'employee',
            'email' => 'd@a.com',
            'password' => 123,
            'role_id' => 4,
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        foreach ($this->users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt($user['password']),
                'role_id' => $user['role_id'],
            ]);
        }
    }
}