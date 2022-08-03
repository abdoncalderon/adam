<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_users')->insert([
            'user_id' => '1',
            'project_role_id' => '1',
            'project_id' => '1',
        ]);

        DB::table('project_users')->insert([
            'user_id' => '2',
            'project_role_id' => '3',
            'project_id' => '1',
        ]);

        DB::table('project_users')->insert([
            'user_id' => '3',
            'project_role_id' => '2',
            'project_id' => '1',
        ]);

        DB::table('project_users')->insert([
            'user_id' => '4',
            'project_role_id' => '2',
            'project_id' => '1',
        ]);
    }
}
