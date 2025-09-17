<?php

namespace Database\Seeders;

use App\Models\Application\Application;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ApplicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'reference_no' => '1234567890',
                'job_posting_id' => '01jvysz678ydznp92xmyd1wrda',
                'applicant_name' => 'applicant',
                'applicant_email' => 'applicant@gmail.com',
                'applicant_phone' => '0123456789',
                'applicant_address' => 'Selangor, Malaysia',
                'expected_salary' => '3000',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book',
                'status_id' => 2,
                'created_at' => Carbon::now(),
            ],
            [
                'reference_no' => '11223356789',
                'job_posting_id' => '01jvysz678ydznp92xmyd1wres',
                'applicant_name' => 'applicant 2',
                'applicant_email' => 'applicant2@gmail.com',
                'applicant_phone' => '0123456789',
                'applicant_address' => 'Perak, Malaysia',
                'expected_salary' => '5000',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book',
                'status_id' => 2,
                'created_at' => Carbon::now(),
            ],
        ];

        foreach ($data as $datum) {
            Application::firstOrCreate($datum, $datum);
        }
    }
}
