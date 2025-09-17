<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\Seeder;
use Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'full_name' => 'superadmin',
                'name'     => 'superadmin',
                'email'    => 'superadmin@loob.com',
                'password' => Hash::make('password'),
                'email_verified_at' => Carbon::now(),
            ],
            [
                'full_name' => 'HR',
                'name'     => 'HR',
                'email'    => 'hr@loob.com',
                'password' => Hash::make('password'),
                'email_verified_at' => Carbon::now(),
            ],
            [
                'full_name' => 'Applicant',
                'name'     => 'Applicant',
                'email'    => 'applicant@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => Carbon::now(),
            ],
        ];

        foreach ($data as $datum) {
            $user = User::updateOrCreate(['email' => $datum['email']], $datum);

            switch ($user->email) {
                case 'superadmin@loob.com':
                    $user->assignRole('superadmin');
                    break;
                case 'hr@loob.com':
                    $user->assignRole('HR');
                    break;
                default:
                    $user->assignRole('applicant');
                    break;
            }
        }
    }
}
