<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'Store_name'=>'Soupremous',
            'strore_description'=>'Write somthing about Soupremous',
            'store_email'=>'example@lara.com',
            'store_mobile'=>'017898999885',
            'store_address'=>'Store address',
            'store_alterNate_mobile'=>'017898999885',
            'store_fav_icon'=>'dsfasd',
            'store_logo'=>'dsfasdf',

        ]);
        DB::table('infos')->insert([
            'country'=>'Bangladesh',
            'currency'=>'৳',
        ]);
        DB::table('socials')->insert([
            'facebook_links'=>'https://www.facebook.com/',
            'twitter_links'=>'https://twitter.com/',
            'linked_links'=>'https://www.linkedin.com/',
            'instagram_links'=>'https://www.instagram.com/',
            'youtube_links'=>'https://www.youtube.com/',
        ]);
        DB::table('massegers')->insert([
            'Page_id'=>'112521853671162',
            'color'=>'#100f0f',
        ]);
    }
}
