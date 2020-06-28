<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationTableSeeder extends Seeder
{

    private $configurations = [
        [
            'controller' => 'dashboard', 
            'role_id' => 2
        ],
        [
            'controller' => 'dashboard', 
            'role_id' => 3
        ],
        [
            'controller' => 'dashboard', 
            'role_id' => 4
        ],
        [
            'controller' => 'report', 
            'role_id' => 2
        ],
        [
            'controller' => 'report', 
            'role_id' => 4
        ],
        [
            'controller' => 'configuration',
            'role_id' => 2
        ],
        [
            'controller' => 'configuration',
            'role_id' => 3
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuration')->truncate();

        foreach ($this->configurations as $configuration) {
            DB::table('configuration')->insert([
                'controller' => $configuration['controller'],
                'role_id' => $configuration['role_id'],
            ]);
        }
    }
}