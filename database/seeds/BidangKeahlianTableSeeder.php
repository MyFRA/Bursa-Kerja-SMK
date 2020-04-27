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
