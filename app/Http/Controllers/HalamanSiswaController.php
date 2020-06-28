<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use Artesaos\SEOTools\Facades\SEOTools;

use App\Models\Perusahaan;
use App\Models\ProgramKeahlian;
use App\Models\Provinsi;

use App\User;

class HalamanSiswaController extends Controller
{
    /**
     * Return a SEO Script.
     *
     */
    public function getSeo()
    {
        // SEO Script
        SEOTools::setTitle('SMK Bisa Kerja | SMK Negeri 1 Bojongsari', false);
        SEOTools::setDescription('Portal lowongan kerja yang disediakan untuk para pencari pekerjaan bagi lulusan SMK/SMA sederajat');
        SEOTools::setCanonical(URL::current());
        SEOTools::metatags()
            ->setKeywords('Lowongan Kerja, Lulusan SMA/SMK, SMK Negeri 1 Bojongsari, Purbalingga, Bursa Kerja, Portal Lowongan Kerja');
        SEOTools::opengraph()
            ->setUrl(URL::current())
            ->addProperty('type', 'homepage');
        SEOTools::twitter()->setSite('@smkbisakerja');
        SEOTools::jsonLd()->addImage(asset('img/logo.png'));
    }


    public function testimoniSiswa()
    {
        $this->getSeo();

        $data = [
            'navLink' => ''
        ];

        return view('halaman-siswa.testimoni-siswa', $data);
    }

    public function daftarPerusahaan(Request $request)
    {
        $this->getSeo();

        $list_perusahaan;

        if ( !is_null($request->kategori) ) {
            $list_perusahaan = User::select('users.*')
                                ->where('perusahaan.kategori', $request->kategori)
                                ->where('permission_id', 3)
                                ->join('perusahaan', 'users.id', '=', 'perusahaan.user_id')
                                ->join('model_has_permissions', 'users.id', '=', 'model_has_permissions.model_id')
                                ->orderBy('perusahaan.created_at', 'DESC')->paginate(10);
        } else {
            $list_perusahaan = User::select('users.*')
                                ->where('permission_id', 3)
                                ->join('perusahaan', 'users.id', '=', 'perusahaan.user_id')
                                ->join('model_has_permissions', 'users.id', '=', 'model_has_permissions.model_id')
                                ->orderBy('perusahaan.created_at', 'DESC')
                                ->paginate(10);
        }

        $navLinkPerusahaan = ($request->kategori) ? $request->kategori : 'semua';

        $data = [
            'navLink' => 'perusahaan',
            'navLinkPerusahaan' => $navLinkPerusahaan,
            'programKeahlian' => ProgramKeahlian::orderBy('nama', 'ASC')->get(),
            'provinsi' => Provinsi::orderBy('nama_provinsi', 'ASC')->get(),
            'gaji_minimal' => [1000000, 2000000, 3000000, 4000000, 5000000],
            'list_perusahaan' => $list_perusahaan
        ];

        return view('halaman-siswa.daftar-perusahaan', $data);
    }

    static function html_cut($text, $max_length)
    {
        $tags   = array();
        $result = "";

        $is_open   = false;
        $grab_open = false;
        $is_close  = false;
        $in_double_quotes = false;
        $in_single_quotes = false;
        $tag = "";

        $i = 0;
        $stripped = 0;

        $stripped_text = strip_tags($text);

        while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length)
        {
            $symbol  = $text{$i};
            $result .= $symbol;

            switch ($symbol)
            {
            case '<':
                    $is_open   = true;
                    $grab_open = true;
                    break;

            case '"':
                if ($in_double_quotes)
                    $in_double_quotes = false;
                else
                    $in_double_quotes = true;

                break;

                case "'":
                if ($in_single_quotes)
                    $in_single_quotes = false;
                else
                    $in_single_quotes = true;

                break;

                case '/':
                    if ($is_open && !$in_double_quotes && !$in_single_quotes)
                    {
                        $is_close  = true;
                        $is_open   = false;
                        $grab_open = false;
                    }

                    break;

                case ' ':
                    if ($is_open)
                        $grab_open = false;
                    else
                        $stripped++;

                    break;

                case '>':
                    if ($is_open)
                    {
                        $is_open   = false;
                        $grab_open = false;
                        array_push($tags, $tag);
                        $tag = "";
                    }
                    else if ($is_close)
                    {
                        $is_close = false;
                        array_pop($tags);
                        $tag = "";
                    }

                    break;

                default:
                    if ($grab_open || $is_close)
                        $tag .= $symbol;

                    if (!$is_open && !$is_close)
                        $stripped++;
            }

            $i++;
        }

        while ($tags)
            $result .= "</".array_pop($tags).">";

        return $result;
    }
}
