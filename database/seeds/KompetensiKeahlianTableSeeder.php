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
			],
			[
        		'program_keahlian_id' => 1,
        		'kode' => 'KJIdJ',
        		'nama' => 'Konstruksi Jalan, Irigasi, dan Jembatan',
			],
			[
        		'program_keahlian_id' => 1,
        		'kode' => 'BKdP',
        		'nama' => 'Bisnis Konstruksi dan Properti',
			],
			[
        		'program_keahlian_id' => 1,
        		'kode' => 'DPdIB',
        		'nama' => 'Desain Pemodelan dan Informasi Bangunan',
			],
			[
        		'program_keahlian_id' => 2,
        		'kode' => 'TG',
        		'nama' => 'Teknik Geomatika',
			],
			[
        		'program_keahlian_id' => 2,
        		'kode' => 'IG',
        		'nama' => 'Informasi Geospasial',
			],
			[
        		'program_keahlian_id' => 3,
        		'kode' => 'TPTL',
        		'nama' => 'Teknik Pembangkit Tenaga Listrik',
        	],
			[
        		'program_keahlian_id' => 3,
        		'kode' => 'TJTL',
        		'nama' => 'Teknik Jaringan Tenaga Listrik',
        	],
			[
        		'program_keahlian_id' => 3,
        		'kode' => 'TITL',
        		'nama' => 'Teknik Instalasi Tenaga Listrik',
        	],
			[
        		'program_keahlian_id' => 4,
        		'kode' => 'TPMdG',
        		'nama' => 'Teknik Produksi Minyak dan Gas',
        	],
			[
        		'program_keahlian_id' => 4,
        		'kode' => 'TPembMdG',
        		'nama' => 'Teknik Pemboran Minyak dan Gas',
        	],
			[
        		'program_keahlian_id' => 4,
        		'kode' => 'TPMGdP',
        		'nama' => 'Teknik Pengolahan Minyak, Gas dan Petrokimia',
        	],
			[
        		'program_keahlian_id' => 5,
        		'kode' => 'GPRTMB',
        		'nama' => 'Geologi Pertambangan',
        	],
			[
        		'program_keahlian_id' => 6,
        		'kode' => 'TESHdA',
        		'nama' => 'Teknik Energi Surya, Hidro dan Angin',
        	],
			[
        		'program_keahlian_id' => 6,
        		'kode' => 'TEBIO',
        		'nama' => 'Teknik Energi Biomassa',
        	],
			[
        		'program_keahlian_id' => 7,
        		'kode' => 'RPL',
        		'nama' => 'Rekayasa Perangkat Lunak',
        	],
			[
        		'program_keahlian_id' => 7,
        		'kode' => 'TKJ',
        		'nama' => 'Teknik Komputer dan Jaringan',
        	],
			[
        		'program_keahlian_id' => 7,
        		'kode' => 'MM',
        		'nama' => 'Multimedia',
        	],
			[
        		'program_keahlian_id' => 7,
        		'kode' => 'SIJdA',
        		'nama' => 'Sistem Informatika, Jaringan dan Aplikasi',
        	],
			[
        		'program_keahlian_id' => 8,
        		'kode' => 'TTT',
        		'nama' => 'Teknik Transmisi Telekomunikasi',
        	],
			[
        		'program_keahlian_id' => 8,
        		'kode' => 'TJAT',
        		'nama' => 'Teknik Jaringan Akses Telekomunikasi',
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
