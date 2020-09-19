<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller
{
    //

    public function index() {
        $system = DB::table("system")->get();

        return view('system/index', ['system'=>$system]);
    }

    public function update(Request $request) {
        
        $update = DB::table("system")->where("id", $request->id)->update(
            [
                "system_name" => $request->nama,
                "version" => $request->versi,
                "demo" => $request->demo,
                "limit_counting" => $request->counting,
                "limit_quick_count" => $request->quick,
            ]);

            if ($update) {
                $tipe_pesan = 'success';
                $pesan      = 'Data System berhasil diperbaharui!';
            }else {
                $tipe_pesan = 'failed';
                $pesan      = 'Data System gagal diperbaharui! '. $update;
            }

            return redirect('system/')->with($tipe_pesan, $pesan);
    }


    public function reset()
    {
        $system = DB::table("system")->get();
        return view('system/reset', ['system' => $system]);
    }

    public function truncate_data($type = 1) {
        
        if ($type == 1) {
            $truncate = DB::table("pemilihan")->truncate();

            if ($truncate) {
                $tipe_pesan = 'failed';
                $pesan      = 'Data tabel pemilihan gagal dikosongkan! ';
            }else {
                $tipe_pesan = 'success';
                $pesan      = 'Data tabel pemilihan berhasil dikosongkan!';
                
            }

        }else {
            $clear_counting = DB::table("pemilihan")->update(
                [
                    "counting" => null,
                ]);

                if ($clear_counting) {
                    $tipe_pesan = 'success';
                    $pesan      = 'Status counting pemilih berhasil diperbaharui!';
                }else {
                    $tipe_pesan = 'failed';
                    $pesan      = 'Status counting pemilih gagal diperbaharui! ';
                }
        }

        return redirect("system/reset")->with($tipe_pesan, $pesan);
    }
}
