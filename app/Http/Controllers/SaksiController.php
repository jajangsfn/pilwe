<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaksiController extends Controller
{
    //
    public function tambah_saksi() {
        $calon = DB::table("calon")
                 ->join("warga", "warga.id","calon.id_warga")
                 ->select("calon.id","warga.nik","warga.nama")
                 ->get();

        $saksi = DB::table("warga")
                ->leftJoin("calon", "calon.id_warga","warga.id")
                ->leftJoin("saksi", "saksi.id_saksi","warga.id")
                ->whereRaw("calon.id is null and saksi.id_saksi is null")
                ->select("warga.*")
                ->orderBy("warga.nik","asc","warga.nama","asc")
                 ->get();

        return view('saksi/tambah', ['calon' =>$calon, 'saksi' =>$saksi]);
    }


    public function simpan_saksi(Request $request) {
        
        $calon = DB::table("saksi")->insert(
            [
                "id_saksi" => $request->saksi,
                "id_calon" => $request->calon,
                "flag" => 1,
                "created_date" => date('Y-m-d H:i:s'),
                "updated_date" => date('Y-m-d H:i:s'),
            ]
        );

        if ($calon) {
            $tipe_pesan = 'success';
                $pesan      = 'Data Saksi berhasil disimpan!';
        }else {
            $tipe_pesan = 'failed';
            $pesan      = 'Data Saksi gagal disimpan!';
        }

        return redirect('saksi/tambah')->with($tipe_pesan, $pesan);
    }

    public function delete_saksi($id) {
        // menghapus data saksi berdasarkan id yang dipilih
        DB::table('saksi')->where('id', $id)-> delete();
        // Alihkan ke halaman data calon
        return redirect('admin/saksi')-> with('success', 'Data Saksi Berhasil DiHapus');
    }
}
