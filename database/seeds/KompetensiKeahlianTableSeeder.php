<?php

use Illuminate\Database\Seeder;

use App\Models\KompetensiKeahlian;

class KompetensiKeahlianTableSeeder extends Seeder
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
        		'program_keahlian_id' => 1,
        		'kode' => 'KGSdP',
        		'nama' => 'Konstruksi Gedung, Sanitasi, dan Perawatan',
        	],[
        		'program_keahlian_id' => 1,
        		'kode' => 'KJIdJ',
        		'nama' => 'Konstruksi Jalan, Irigasi, dan Jembatan',
        	],[
        		'program_keahlian_id' => 1,
        		'kode' => 'BKdP',
        		'nama' => 'Bisnis Konstruksi dan Properti',
        	],[
        		'program_keahlian_id' => 1,
        		'kode' => 'DPdIB',
        		'nama' => 'Desain Pemodelan dan Informasi Bangunan',
        	],[
        		'program_keahlian_id' => 2,
        		'kode' => 'TG',
        		'nama' => 'Teknik Geomatika',
        	],[
        		'program_keahlian_id' => 2,
        		'kode' => 'IG',
        		'nama' => 'Informasi Geospasial',
        	],[
        		'program_keahlian_id' => 3,
        		'kode' => 'TPTL',
        		'nama' => 'Teknik Pembangkit Tenaga Listrik',
        	],
        ];

        foreach ($data as $result) {
        	KompetensiKeahlian::create([
        		'program_keahlian_id' => $result['program_keahlian_id'],
        		'kode' => $result['kode'],
        		'nama' => $result['nama'],
        	]);
        }
    }
}
