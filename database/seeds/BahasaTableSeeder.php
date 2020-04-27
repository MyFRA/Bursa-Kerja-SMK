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
        $data = [
    		[
    			'nama' => 'Indonesia'
    		],
    		[
    			'nama' => 'Inggris'
    		],
    		[
    			'nama' => 'Melayu'
    		]
    	];

    	foreach ($data as $bahasa) {
    		Bahasa::create([
    			'nama' => $bahasa['nama'],
    		]);
    	};
    }
}
