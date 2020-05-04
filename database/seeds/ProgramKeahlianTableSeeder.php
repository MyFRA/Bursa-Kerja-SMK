<?php

use Illuminate\Database\Seeder;

use App\Models\ProgramKeahlian;

class ProgramKeahlianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programKeahlian = [
        	[
        		'id' => 1,
        		'bidang_keahlian_id' => 1,
        		'kode' => 'TKdp', 
        		'nama' => 'Teknologi Konstruksi dan Properti',
        	],
        	[
        		'id' => 2,
        		'bidang_keahlian_id' => 2,
        		'kode' => 'TP', 
        		'nama' => 'Teknologi Perminyakan',
        	],
        	[
        		'id' => 3,
        		'bidang_keahlian_id' => 3,
        		'kode' => 'TKdI', 
        		'nama' => 'Teknologi Komputer dan Informatika',
        	],
        ];

        foreach($programKeahlian as $pk) {
        	ProgramKeahlian::create([
        		'id' => $pk['id'],
        		'bidang_keahlian_id' => $pk['bidang_keahlian_id'],
        		'kode' => $pk['kode'],
        		'nama' => $pk['nama'],
        	]);
        }
    }
}