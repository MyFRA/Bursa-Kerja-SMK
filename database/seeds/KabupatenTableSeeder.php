<?php

use Illuminate\Database\Seeder;

use App\Models\Provinsi;
use App\Models\Kabupaten;

class KabupatenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $token = file_get_contents('https://x.rajaapi.com/poe');
        $token = json_decode($token, true);

        $provinsi = Provinsi::get();

        foreach ($provinsi as $prov) {
        	$kabupatenJson = file_get_contents('https://x.rajaapi.com/MeP7c5ne'. $token['token'] .'/m/wilayah/kabupaten?idpropinsi=' . $prov['id']);
        	$kabupaten = json_decode($kabupatenJson, true);
            foreach ($kabupaten['data'] as $kab) {
                Kabupaten::create([
                    'id' => $kab['id'],
                    'provinsi_id' => $prov['id'],
                    'nama_kabupaten' => $kab['name']
                ]);
            }
        }
    }
}
