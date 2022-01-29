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
        $provinsi = Provinsi::get();

        foreach ($provinsi as $prov) {
        	$kabupatenJson = file_get_contents('http://www.emsifa.com/api-wilayah-indonesia/api/regencies/' . $prov['id'] . '.json');
        	$kabupaten = json_decode($kabupatenJson, true);
            foreach ($kabupaten as $kab) {
                Kabupaten::create([
                    'id' => $kab['id'],
                    'provinsi_id' => $prov['id'],
                    'nama_kabupaten' => $kab['name']
                ]);
            }
        }
    }
}
