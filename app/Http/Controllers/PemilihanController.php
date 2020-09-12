<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\MyNotify as MyNotify;

class PemilihanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
       

        $bilik   = DB::table("bilik_suara")
                  ->orderBy("bilik_suara")->get();
        
        return view('pemilihan/index', ['bilik' => $bilik]);
    }

    public function data_pemilih() {
        $pemilihan = DB::table("warga")
                    ->leftJoin("pemilihan", "pemilihan.id_warga", "warga.id")
                    ->select("warga.*")
                    ->whereRaw("pemilihan.id_warga is null")->get();

        $arr['data'] = $pemilihan;
        echo json_encode($arr);
    }


    public function get_pemilih($id) {
        $pemilih = DB::table("pemilihan")
                   ->join("warga", "warga.id","pemilihan.id_warga")
                   ->select("warga.*","pemilihan.id as id_pemilihan")
                   ->where("pemilihan.id_bilik",$id)
                   ->whereRaw("pemilihan.realization_time is null")
                   ->get();

        $arr['data'] = $pemilih;
        echo json_encode($arr);
    }

    public function tempatkan_pemilih($id_pemilih, $id_bilik) {
        
        $tempatkan = DB::table("pemilihan")->insert(
            [
                "id_warga" => $id_pemilih,
                "id_bilik" => $id_bilik,
                "flag" => 1,
                "created_date" => date('Y-m-d H:i:s'),
                "updated_date" => date('Y-m-d H:i:s'),
            ]
        );

        if ($tempatkan) {
            echo json_encode(1);
            // send notify
            event(new MyNotify('success','new'));
        }else {
            echo json_encode(0);
        }
    }

    public function hapus_pemilih($id) {
        $pemilih = DB::table("pemilihan")->where("id", $id)->delete();

        if ($pemilih) {
            echo json_encode(1);
        }else {
            echo json_encode(0);
        }
    }


    public function notify() {
        return view('pemilihan/notify');
    }
}
