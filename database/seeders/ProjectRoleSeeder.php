<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_roles')->insert([
            'project_id' => '1',
            'role_id' => '1',
        ]);

        DB::table('project_roles')->insert([
            'project_id' => '1',
            'role_id' => '2',
        ]);

        DB::table('project_roles')->insert([
            'project_id' => '1',
            'role_id' => '3',
        ]);
    }
}
