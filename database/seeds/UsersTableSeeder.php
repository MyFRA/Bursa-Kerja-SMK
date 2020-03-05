<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'administrator@admin.com',
            'username' => 'administrator',
            'password' => Hash::make('administrator'),
            'level' => 'superadmin'
        ]);
    }
}
