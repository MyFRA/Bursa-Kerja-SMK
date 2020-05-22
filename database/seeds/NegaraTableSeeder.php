<?php

use Illuminate\Database\Seeder;

use App\Models\Negara;

class NegaraTableSeeder extends Seeder
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
    			'id' => 1,
    			'nama_negara' => 'Indonesia'
    		]
    	];

    	foreach ($data as $negara) {
    		Negara::create([
    			'id' => $negara['id'],
    			'nama_negara' => $negara['nama_negara'],
    		]);
    	};

    }
}
