<?php

use Illuminate\Database\Seeder;

use App\Models\Keterampilan;

class KeahlianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['php', 'javascript', 'java', 'laravel', 'codeigniter', 'node.js', 'react', 'vue', 'pwa', 'phyton', 'c#', 'c++', 'c', 'ruby'];

        foreach ($data as $result) {
        	Keterampilan::create([
        		'nama' => $result,
        	]);
        }
    }
}
