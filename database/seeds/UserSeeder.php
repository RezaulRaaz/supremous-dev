<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'=>'1',
            'name'=>'SuperAdmin',
            'email'=>'superadmin@lara.com',
            'password'=>Hash::make('12345678'),

        ]);
        DB::table('users')->insert([
            'role_id'=>'2',
            'name'=>'admin',
            'email'=>'admin@lara.com',
            'password'=>Hash::make('12345678'),

        ]);
        DB::table('users')->insert([
            'role_id'=>'3',
            'name'=>'moderator',
            'email'=>'moderator@lara.com',
            'password'=>Hash::make('12345678'),

        ]);
        DB::table('users')->insert([
            'role_id'=>'4',
            'name'=>'customar',
            'email'=>'customar@lara.com',
            'password'=>Hash::make('12345678'),

        ]);
    }
}
