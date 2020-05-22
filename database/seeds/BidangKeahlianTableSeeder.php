<?php

use Illuminate\Database\Seeder;
use App\Models\BidangKeahlian;

class BidangKeahlianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bidangKeahlian = [
        	[
        		'id'   => 1,
        		'kode' => 'TdR',
        		'nama' => 'Teknologi dan Rekayasa',
        	],
        	[
        		'id'   => 2,
        		'kode' => 'EdP',
        		'nama' => 'Energi dan Pertambangan',
        	],
        	[
        		'id'   => 3,
        		'kode' => 'TIdK',
        		'nama' => 'Teknologi Informasi dan Komunikasi',
			],
			// [
        	// 	'id'   => 4,
        	// 	'kode' => 'KdPS',
        	// 	'nama' => 'Kesehatan dan Pekerjaan Sosial',
			// ],
			// [
        	// 	'id'   => 5,
        	// 	'kode' => 'AdA',
        	// 	'nama' => 'Agribisnis dan Agroteknologi',
			// ],
			// [
        	// 	'id'   => 6,
        	// 	'kode' => 'Kmrtmn',
        	// 	'nama' => 'Kemaritiman',
			// ],
			// [
        	// 	'id'   => 7,
        	// 	'kode' => 'BdM',
        	// 	'nama' => 'Bisnis dan Manajemen',
			// ],
			// [
        	// 	'id'   => 8,
        	// 	'kode' => 'Prwst',
        	// 	'nama' => 'Pariwisata',
			// ],
			// [
        	// 	'id'   => 9,
        	// 	'kode' => 'SdIK',
        	// 	'nama' => 'Seni dan Industri Kreatif',
			// ]
        ];

        foreach( $bidangKeahlian as $bk ) {
        	BidangKeahlian::create([
        		'id'   => $bk['id'],
        		'kode' => $bk['kode'],
        		'nama' => $bk['nama']
        	]);
        }
    }
}
