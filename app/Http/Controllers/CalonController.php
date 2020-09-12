<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalonController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function tambah_calon() {
        $calon = DB::table("warga")
                 ->leftJoin("calon", "calon.id_warga","warga.id")
                 ->select("warga.*")
                 ->whereRaw("calon.id_warga is null")
                 ->orderBy("warga.nama")
                 ->get();
        
        return view('calon/tambah', ['calon' =>$calon]);
    }

    public function simpan_calon(Request $request) {
        
        $calon = DB::table("calon")->insert(
            [
                "id_warga" => $request->calon,
                "flag" => 1,
                "created_date" => date('Y-m-d H:i:s'),
                "updated_date" => date('Y-m-d H:i:s'),
            ]
        );

        if ($calon) {
            $tipe_pesan = 'success';
                $pesan      = 'Data Calon berhasil disimpan!';
        }else {
            $tipe_pesan = 'failed';
            $pesan      = 'Data Calon gagal disimpan!';
        }

        return redirect('calon/tambah')->with($tipe_pesan, $pesan);
    }

    public function edit_calon($id) {
        return view('calon/edit');
    }

    public function update_calon(Request $request) {

    }

    public function delete_calon($id) {
        // menghapus data calon berdasarkan id yang dipilih
        DB::table('calon')->where('id', $id)-> delete();
        // Alihkan ke halaman data calon
        return redirect('admin/calon')-> with('success', 'Data Calon Berhasil DiHapus');
    }


    public function visi_misi($id) {

        $calon= DB::table("calon")
                ->leftJoin("warga", "warga.id","calon.id_warga")
                ->select("warga.nama","calon.id")
                ->where("calon.id", $id)->get();
        // echo json_encode($calon[0]->nama);exit;
        $visi = DB::table("visi")->where("id_calon", $id)->get();
        $misi = DB::table("misi")->where("id_calon", $id)->get();

        return view('calon/visimisi', ['calon' => $calon,'visi' => $visi, 'misi' => $misi]);
    }

    public function simpan_visi(Request $request) {

        $visi = DB::table("visi")->insert(
            [
                "visi" => $request->visi,
                "id_calon" => $request->id,
                "flag" => 1,
                "created_date" => date('Y-m-d H:i:s'),
                "updated_date" => date('Y-m-d H:i:s'),
            ]
        );

        if ($visi) {
            $tipe_pesan = 'success_visi';
                $pesan      = 'Data visi berhasil disimpan!';
        }else {
            $tipe_pesan = 'failed_visi';
            $pesan      = 'Data visi gagal disimpan!';
        }

        return redirect('calon/visi_misi/'.$request->id)->with($tipe_pesan, $pesan);
    }

    public function delete_visi($id_calon,$id) {
        $visi = DB::table("visi")->where("id", $id)->delete();
        if ($visi) {
            $tipe_pesan = 'success_visi';
                $pesan      = 'Data visi berhasil dihapus!';
        }else {
            $tipe_pesan = 'failed_visi';
            $pesan      = 'Data visi gagal dihapus!';
        }

        return redirect('calon/visi_misi/'.$id_calon)->with($tipe_pesan, $pesan);
    }

    public function simpan_misi(Request $request) {
        $misi = DB::table("misi")->insert(
            [
                "misi" => $request->misi,
                "id_calon" => $request->id,
                "flag" => 1,
                "created_date" => date('Y-m-d H:i:s'),
                "updated_date" => date('Y-m-d H:i:s'),
            ]
        );

        if ($misi) {
            $tipe_pesan = 'success_misi';
                $pesan      = 'Data misi berhasil disimpan!';
        }else {
            $tipe_pesan = 'failed_misi';
            $pesan      = 'Data isi gagal disimpan!';
        }

        return redirect('calon/visi_misi/'.$request->id)->with($tipe_pesan, $pesan);
    }

    public function delete_misi($id) {

    }
}
