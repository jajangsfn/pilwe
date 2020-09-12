<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BilikController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tambah_bilik() {
        
        return view('bilik/tambah');
    }

    public function simpan_bilik(Request $request) {

        // cek bilik suara
        $cek_bilik = DB::table("bilik_suara")->where("bilik_suara", $request->bilik)->count();

        if ($cek_bilik > 0) {
            $tipe_pesan = 'failed';
            $pesan      = 'Data Bilik Suara telah terdaftar!';
        }else {
            $bilik = DB::table("bilik_suara")->insert(
                [
                    'bilik_suara' => $request->bilik,
                    'flag' => 1,
                    'created_date' => date('Y-m-d H:i:s'),
                    'updated_date' => date('Y-m-d H:i:s'),
                ]
            );
    
            if ($bilik) {
                $tipe_pesan = 'success';
                $pesan      = 'Data Bilik Suara berhasil disimpan!';
            }else {
                $tipe_pesan = 'failed';
                $pesan      = 'Data Bilik Suara gagal disimpan!';
            }
        }
        


        return redirect('bilik/tambah')->with($tipe_pesan, $pesan);
    }

    public function edit_bilik($id) {
        $bilik = DB::table("bilik_suara")->where("id", $id)->first();

        return view('bilik/edit', ['bilik' => $bilik]);
    }

    public function update_bilik(Request $request) {

        $bilik = DB::table("bilik_suara")->where('id', $request->id)->update(
            [
                'bilik_suara' => $request->bilik,
                'flag' => 1,
                'updated_date' => date('Y-m-d H:i:s'),
            ]
        );

        if ($bilik) {
            $tipe_pesan = 'success';
            $pesan      = 'Data Bilik Suara berhasil diperbaharui!';
        }else {
            $tipe_pesan = 'failed';
            $pesan      = 'Data Bilik Suara gagal diperbaharui!';
        }

        return redirect('admin/bilik')->with($tipe_pesan, $pesan);
    }

    public function delete_bilik($id) {
        // menghapus data bilik suara berdasarkan id yang dipilih
        DB::table('bilik_suara')->where('id', $id)-> delete();
        // Alihkan ke halaman data bilik suara
        return redirect('admin/bilik')-> with('success', 'Data Bilik Suara Berhasil DiHapus');
    }
}
