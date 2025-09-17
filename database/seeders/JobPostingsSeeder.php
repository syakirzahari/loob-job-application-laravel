<?php

namespace Database\Seeders;

use App\Models\Job\JobPosting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class JobPostingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => '01jvysz678ydznp92xmyd1wrda',
                'title' => 'Senior Manager',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book',
                'start_date' => '2025-09-15',
                'end_date' => '2025-09-25',
                'is_active' => 1,
                'salary' => '8000-10000',
                'position_id' => 12,
                'position_type_id' => 8,
                'created_at' => Carbon::now(),
                'created_by' => User::where('email', 'hr@loob.com')->first()->id,
            ],
            [
                'id' => '01jvysz678ydznp92xmyd1wres',
                'title' => 'Full Stack Developer',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book',
                'start_date' => '2025-09-15',
                'end_date' => '2025-09-25',
                'salary' => '7000-8000',
                'is_active' => 1,
                'position_id' => 3,
                'position_type_id' => 8,
                'created_at' => Carbon::now(),
                'created_by' => User::where('email', 'hr@loob.com')->first()->id,
            ],
        ];

        foreach ($data as $datum) {
            JobPosting::firstOrCreate($datum, $datum);
        }
    }
}
