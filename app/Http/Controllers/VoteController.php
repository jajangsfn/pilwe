<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\MyNotify as MyNotify;

class VoteController extends Controller
{
    //

    public function index($bilik) {
        
        return view('vote/index', ['bilik' => $bilik]);
    }

    public function get_pemilih($bilik)
    {
        $arr['pemilih'] = DB::table("pemilihan")
                   ->join("warga", "warga.id","pemilihan.id_warga")
                   ->join("bilik_suara","bilik_suara.id","pemilihan.id_bilik")
                   ->select("warga.*","pemilihan.id as id_pemilihan")
                   ->whereRaw("bilik_suara.bilik_suara ='".$bilik."'")
                   ->whereRaw("pemilihan.realization_time is null")
                   ->limit(1)
                   ->get();

        echo json_encode($arr);
        
    }

    public function get_calon()
    {
        $arr['calon'] = DB::table("calon")
                        ->join("warga", "warga.id","calon.id_warga")
                        ->select("warga.*","calon.id as id_calon")
                        ->get();

        echo json_encode($arr);
    }

    public function vote_calon($id_pemilih, $id_calon)
    {
        $vote = DB::table("pemilihan")->where('id', $id_pemilih)->update(
            [
                "id_calon" => $id_calon,
                "realization_time" => date('Y-m-d H:i:s'),
                "updated_date" =>date('Y-m-d H:i:s'),
            ]
        );

        $get_pemilih = DB::table("warga")
                        ->select("nama")
                        ->where("id", $id_pemilih)->first();

        if ($vote) {
            echo json_encode(1);
            // send notify
            event(new MyNotify('success',$get_pemilih->nama));
        }else {
            echo json_encode(0);
        }
    }
}
