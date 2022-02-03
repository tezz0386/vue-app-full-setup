<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name'=>'Developer Developer',
            'email'=>'developer@gmail.com',
            'password'=>Hash::make('developer'),
            'role'=>'admin',
        ]);
        DB::table('settings')->insert([
            'name'=>'App Name',
            'p_email'=>'info@developer.com',
            'm_no'=>'091982545',
        ]);
    }
}
