<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ref\Status;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'name' => 'Application', 'parent_id' => null],
            ['id' => 2, 'name' => 'Applied', 'parent_id' => 1],
            ['id' => 3, 'name' => 'Screening', 'parent_id' => 1],
            ['id' => 4, 'name' => 'Interview', 'parent_id' => 1],
            ['id' => 5, 'name' => 'Offer', 'parent_id' => 1],
            ['id' => 6, 'name' => 'Rejected', 'parent_id' => 1],
            ['id' => 7, 'name' => 'Job Type', 'parent_id' => null],
            ['id' => 8, 'name' => 'Full Time', 'parent_id' => 7],   
            ['id' => 9, 'name' => 'Contract', 'parent_id' => 7],
            ['id' => 10, 'name' => 'Part Time', 'parent_id' => 7],
            ['id' => 11, 'name' => 'Internship', 'parent_id' => 7],
        ];

        foreach ($data as $datum) {
            Status::firstOrCreate($datum, $datum);
        }
    }
}
