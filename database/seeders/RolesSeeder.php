<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_seeds = [
            [
                'name'        => 'superadmin',
               'permissions' => []
            ],
            [
                'name'        => 'HR',
               'permissions' => []
            ],
            [
                'name'        => 'Applicant',
               'permissions' => []
            ],
        ];

        foreach ( $data_seeds as $seed ) {
            $role = Role::firstOrCreate( ['name' => $seed['name']] );

            if ( count( $seed['permissions'] ) > 0 ) {
                foreach ( $seed['permissions'] as $permission ) {
                    $role->givePermissionTo( $permission );
                }
            }
        }
    }
}
