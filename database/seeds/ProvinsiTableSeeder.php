<?php

use Illuminate\Database\Seeder;

use App\Models\Provinsi;

class ProvinsiTableSeeder extends Seeder
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

        $provinsiJson = file_get_contents('https://x.rajaapi.com/MeP7c5ne' . $token['token'] . '/m/wilayah/provinsi');
        $provinsi = json_decode($provinsiJson, true);
            foreach ($provinsi['data'] as $prov) {
                Provinsi::create([
                	'id' => $prov['id'],
                	'negara_id' => 1,
                	'nama_provinsi' => $prov['name']
                ]);
            }
    }
}
