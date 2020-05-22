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
        $data = ['Audit dan Pajak', 'Perbankan/Keuangan', 'Keuangan/Investasi', 'Akuntansi Umum/Pembiayaan', 'Staf/Administrasi Umum', 'Personalia', 'Sekretaris', 'Manajemen Atas', 'Periklanan', 'Seni/Desain Kreatif', 'Hiburan/Seni Panggung', 'Hubungan Masyarakat', 'Arsitek/Desain Interior', 'Sipil/Konstruksi Bangunan', 'Properti/Real Estate', 'Survei Kuantitas', 'IT-Perangkat Keras', 'IT-Jaringan/Sistem/Sistem Database', 'IT-Perangkat Lunak', 'Pendidikan', 'Penelitian dan Pengembangan', 'Teknik Kimia', 'Teknik Elektrikal', 'Teknik Elektro', 'Teknik Lingkungan', 'Teknik', 'Mekanik/Otomotif', 'Teknik Perminyakan', 'Dokter/Diagnosa', 'Farmasi', 'Praktisi/Asisten Medis', 'Makanan/Minuman/Pelayanan/Restoran', 'Hotel/Pariwisata', 'Pemeliharaan', 'Manufaktur', 'Kontrol Proses', 'Pembelian/Manajemen Material', 'Penjaminan Kualitas/QA', 'Penjualan - Korporasi', 'Digital Marketing', 'E-commerce', 'Pemasaran/Pengembangan Bisnis', 'Merchandising', 'Penjualan Ritel', 'Penjualan - Teknik/Teknikal/IT', 'Proses Desain dan Kontrol', 'Tele-Sales/Telemarketing', 'Aktuaria/Statistik', 'Pertanian', 'Penerbangan', 'Biomedis', 'Bioteknologi', 'Kimia', 'Teknologi Makanan/Ahli Gizi', 'Geologi/Geofisika', 'Ilmu Pengetahuan & Teknologi/Lab', 'Keamanan/Angkatan Bersenjata', 'Pelayanan Pelanggan', 'Logistik/Jaringan Distribusi', 'Hukum/Legal', 'Perawatan Kesehatan/Kecantikan', 'Pelayanan Kemasyarakatan', 'Teknikal & Bantuan Pelanggan', 'Pekerjaan Umum', 'Jurnalis/Editor', 'Penerbitan', 'Lainya'];

        foreach ($data as $result) {
        	Keterampilan::create([
        		'nama' => $result,
        	]);
        }
    }
}
