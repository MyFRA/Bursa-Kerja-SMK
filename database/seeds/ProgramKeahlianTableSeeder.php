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
        		'nama' => 'Teknik Konstruksi dan Properti',
        	],
        	[
        		'id' => 2,
        		'bidang_keahlian_id' => 1,
        		'kode' => 'TGdG', 
        		'nama' => 'Teknik Geomatika dan Geospasial',
        	],
        	[
        		'id' => 3,
        		'bidang_keahlian_id' => 1,
        		'kode' => 'TKLSTRK', 
        		'nama' => 'Teknik Ketenagalistrikan',
			],       
			[
        		'id' => 4,
        		'bidang_keahlian_id' => 2,
        		'kode' => 'TPRMNYKN', 
        		'nama' => 'Teknik Perminyakan',
			],
			[
        		'id' => 5,
        		'bidang_keahlian_id' => 2,
        		'kode' => 'GdPRT', 
        		'nama' => 'Geologi Pertambangan',
			],
			[
        		'id' => 6,
        		'bidang_keahlian_id' => 2,
        		'kode' => 'TETRBRU', 
        		'nama' => 'Teknik Energi Terbarukan',
        	],
			[
        		'id' => 7,
        		'bidang_keahlian_id' => 3,
        		'kode' => 'TKdINFO', 
        		'nama' => ' Teknik Komputer dan Informatika',
        	],
			[
        		'id' => 8,
        		'bidang_keahlian_id' => 3,
        		'kode' => 'TTELE', 
        		'nama' => 'Teknik Telekomunikasi',
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
