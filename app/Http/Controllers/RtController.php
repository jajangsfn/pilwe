<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RtController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tambah_rt() {

        return view('rt/tambah');
    }

    public function simpan_rt(Request $request) {

        // cek nama rt
        $cek_rt = DB::table("rt")->where("rt", $request->rt)->count();

        if ($cek_rt > 0) {
            $tipe_pesan = 'failed';
            $pesan      = 'Nama RT telah terdaftar!';
        }else {
            $simpan = DB::table("rt")->insert(
                ['rt' => $request->rt,
                 'flag' => 1,
                 'created_date' => date('Y-m-d H:i:s'),
                 'updated_date' => date('Y-m-d H:i:s'),
                ]
            );
    
            if ($simpan) {
                $tipe_pesan = 'success';
                $pesan      = 'Data RT berhasil ditambahkan!';
            }else {
                $tipe_pesan = 'failed';
                $pesan      = 'Data RT gagal ditambahkan!';
            }
        }

        return redirect('rt/tambah')->with($tipe_pesan, $pesan);
    }

    public function edit_rt($id) {
        $rt = DB::table("rt")->where('id', $id)->first();
        
        return view('rt/edit', ['rt' => $rt]);
    }

    public function update_rt(Request $request) {
        
        $rt = DB::table("rt")->where("id", $request->id)->update(
            ['rt' => $request->rt,
             'flag' => 1,
             'updated_date' => date('Y-m-d H:i:s'),
            ]
        );

        if ($rt) {
            $tipe_pesan = 'success';
            $pesan      = 'Data RT berhasil diperbaharui!';
        }else {
            $tipe_pesan = 'failed';
            $pesan      = 'Data RT gagal diperbaharui!';
        }

        return redirect('admin/rt')->with($tipe_pesan, $pesan);
    }

    public function delete_rt($id) {
        // menghapus data rt berdasarkan id yang dipilih
        DB::table('rt')->where('id', $id)-> delete();
        // Alihkan ke halaman data rt
        return redirect('admin/rt')-> with('success', 'Data RT Berhasil DiHapus');
    }
}
