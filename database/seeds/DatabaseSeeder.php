<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(BidangKeahlianTableSeeder::class);
        $this->call(ProgramKeahlianTableSeeder::class);
        $this->call(NegaraTableSeeder::class);
        $this->call(ProvinsiTableSeeder::class);
        $this->call(KabupatenTableSeeder::class);
        $this->call(BahasaTableSeeder::class);
        $this->call(KompetensiKeahlianTableSeeder::class);
        $this->call(KeahlianTableSeeder::class);
    }
}
