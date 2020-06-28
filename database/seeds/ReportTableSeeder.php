<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportTableSeeder extends Seeder
{

    private $reports = [
        'Report',
        'Report1',
        'Report2',
        'Report3',
        'Report4',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('report')->truncate();

        foreach ($this->reports as $report) {
            DB::table('report')->insert([
                'name' => $report,
            ]);
        }
    }
}