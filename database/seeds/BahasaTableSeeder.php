<?php

use Illuminate\Database\Seeder;

use App\Models\Bahasa;

class BahasaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Indonesia', 'Inggris', 'Melayu', 'Jepang', 'Korea'];

    	foreach ($data as $bahasa) {
    		Bahasa::create([
    			'nama' => $bahasa,
    		]);
    	};
    }
}
