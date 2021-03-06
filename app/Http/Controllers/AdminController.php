<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        

        
        $belum_memilih = DB::table("warga")
                         ->leftJoin("pemilihan", "pemilihan.id_warga", "warga.id") 
                         ->whereRaw("pemilihan.id_warga is null")
                         ->select("*")
                         ->get()->count();

        $sudah_memilih = DB::table("warga")
                        ->join("pemilihan", "pemilihan.id_warga", "warga.id") 
                        ->select("*")
                        ->get()->count();

        $warga = DB::table("warga")->select("*")->get()->count();
        $calon = DB::table("calon")->select("*")->get()->count();
        
        
        $dashboard = array("sudah_memilih" => $sudah_memilih,
                            "belum_memilih" => $belum_memilih,
                            "warga" => $warga,
                            "calon" => $calon,
                        );

        return view('admin/admin', ['dashboard' => $dashboard]);
    }

    public function pemilihan() {
        return view('home/pemilihan');
    }

    public function calon() {
        $calon = DB::table("calon")
                 ->join("warga", "warga.id","=", "calon.id_warga")
                 ->join("rt", "rt.id", "=", "warga.id_rt")
                 ->join("jenis_pendidikan", "jenis_pendidikan.id", "=", "warga.id_pendidikan_terakhir")
                 ->select("calon.*","warga.nama","warga.nik","warga.tempat_lahir","warga.tanggal_lahir","warga.foto","rt.rt", "jenis_pendidikan.nama as pendidikan_terakhir")
                 ->get();

        return view('home/calon', ['calon'=> $calon]);
    }
    public function warga() {

        $warga = DB::table("warga")
                 ->join("rt", "rt.id", "=", "warga.id_rt")
                 ->leftJoin("jenis_pendidikan", "jenis_pendidikan.id", "=", "warga.id_pendidikan_terakhir")
                 ->select("warga.*", "rt.rt","jenis_pendidikan.nama as pendidikan_terakhir")
                 ->orderBy("warga.nik","asc","warga.nama","asc")
                 ->get();
        
        return view('home/warga', ['warga' => $warga]);
    }

    public function saksi() {
        $saksi  = DB::table("saksi")
                  ->leftJoin("warga", "warga.id","saksi.id_saksi")
                  ->leftJoin("calon","calon.id","saksi.id_calon")
                  ->leftJoin("warga as warga_", "warga_.id","calon.id_warga")
                  ->select("saksi.*","warga.nik","warga.nama as nama_saksi","warga_.nama as nama_calon")
                  ->get();
        
        return view('home/saksi', ['saksi' => $saksi]);
    }

    public function rt() {

        $rt = DB::table("rt")->get();

        return view('home/rt', ['rt' => $rt]);
    }

    public function bilik_suara() {
        $bilik = DB::table("bilik_suara")->get();
        return view('home/bilik_suara', ['bilik' => $bilik]);
    }
}
