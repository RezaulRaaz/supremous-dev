<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=>'SuperAdmin',
            'slug'=>'super-admin'
        ]);
        DB::table('roles')->insert([
            'name'=>'Admin',
            'slug'=>'admin'
        ]);
        DB::table('roles')->insert([
            'name'=>'Moderator',
            'slug'=>'moderator'
        ]);
        DB::table('roles')->insert([
            'name'=>'Customar',
            'slug'=>'customar'
        ]);
    }
}
