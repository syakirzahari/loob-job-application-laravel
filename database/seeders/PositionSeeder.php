<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ref\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            ['name' => 'HR Manager'],
            ['name' => 'HR Executive'],
            ['name' => 'Programmer'],
            ['name' => 'Mobile App Developer'],
            ['name' => 'Web Developer'],
            ['name' => 'UI/UX Designer'],
            ['name' => 'Project Manager'],
            ['name' => 'Sales Manager'],
            ['name' => 'Sales Executive'],
            ['name' => 'Marketing Manager'],
            ['name' => 'Marketing Executive'],
            ['name' => 'Finance Manager'],
            ['name' => 'Finance Executive'],
            ['name' => 'Operations Manager'],
            ['name' => 'Operations Executive'],
            ['name' => 'Barista'],
        ];

        foreach ($data as $datum) {
            Position::firstOrCreate($datum, $datum);
        }
    }
}
