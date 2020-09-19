<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WargaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function tambah_warga() {

        $rt = DB::table("rt")
              ->select("*")
              ->get();

        $pendidikan = DB::table("jenis_pendidikan")
                      ->select("*")
                      ->get();

        return view('warga/tambah', ['rt' => $rt, 'pendidikan' => $pendidikan]);
    }

    public function simpan_warga(Request $request) {
        date_default_timezone_set('Asia/Jakarta');

        // cek NIK
        $cek_nik = DB::table("warga")->where('nik', $request->nik)->count();
        
        if ($cek_nik > 0) {
            $tipe_pesan = 'failed';
            $pesan      = 'Nik telah terdaftar!';
        }else {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('foto');
            if ($file) {
                // echo json_encode($request);exi;
                $foto = $file->getClientOriginalName();
                    // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'attachments';
        
                // upload file
                $move = $file->move($tujuan_upload,$file->getClientOriginalName());

                if ($move) {
                    $warga= DB::table("warga")->insert(
                        [   "nik" => $request->nik,
                            "nama" => $request->nama,
                            "tempat_lahir" => $request->tempat_lahir,
                            "tanggal_lahir" => $request->tanggal_lahir,
                            "id_rt" => $request->rt,
                            "id_pendidikan_terakhir" => $request->pendidikan,
                            "jenis_kelamin" => $request->jenkel,
                            "foto" => $foto,
                            "flag" => 1,
                            "created_date" => date('Y-m-d H:i:s'),
                            "updated_date" => date('Y-m-d H:i:s'),
                        ]
                    );
            
                    if ($warga) {
                        $tipe_pesan = 'success';
                        $pesan      = 'Data Warga berhasil ditambahkan!';
                    }else {
                        $tipe_pesan = 'failed';
                        $pesan      = 'Data Warga gagal ditambahkan!';
                    }
                }else {
                    $tipe_pesan = 'failed';
                    $pesan      = 'Data Foto Warga gagal diunggah!';
                }

            }else {
                $warga= DB::table("warga")->insert(
                    [   "nik" => $request->nik,
                        "nama" => $request->nama,
                        "tempat_lahir" => $request->tempat_lahir,
                        "tanggal_lahir" => $request->tanggal_lahir,
                        "id_rt" => $request->rt,
                        "id_pendidikan_terakhir" => $request->pendidikan,
                        "jenis_kelamin" => $request->jenkel,
                        "flag" => 1,
                        "created_date" => date('Y-m-d H:i:s'),
                        "updated_date" => date('Y-m-d H:i:s'),
                    ]
                );
        
                if ($warga) {
                    $tipe_pesan = 'success';
                    $pesan      = 'Data Warga berhasil ditambahkan!';
                }else {
                    $tipe_pesan = 'failed';
                    $pesan      = 'Data Warga gagal ditambahkan!';
                }
            }
        }

        return redirect('/warga/tambah')->with($tipe_pesan, $pesan);
    }

    public function edit_warga($id)
    {
        $warga = DB::table("warga")->where("id", $id)->first();
        $rt = DB::table("rt")
                    ->select("*")
                    ->get();

        $pendidikan = DB::table("jenis_pendidikan")
                        ->select("*")
                        ->get();

        return view('warga/edit', ['warga'=>$warga, 'rt' => $rt, 'pendidikan' => $pendidikan]);
    }

    public function delete_warga($id) {
        // menghapus data warga berdasarkan id yang dipilih
        DB::table('warga')->where('id', $id)-> delete();
        // Alihkan ke halaman data warga
        return redirect('admin/warga')-> with('success', 'Data Warga Berhasil DiHapus');
    }

    public function update_warga(Request $request) {
        date_default_timezone_set('Asia/Jakarta');
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');
        
        if ($file) {
            // echo json_encode($request);exi;
            $foto = $file->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'attachments';
    
            // upload file
            $move = $file->move($tujuan_upload,$file->getClientOriginalName());

            if ($move) {
                $warga= DB::table('warga')-> where('id', $request->id)->update(
                    [   "nik" => $request->nik,
                        "nama" => $request->nama,
                        "tempat_lahir" => $request->tempat_lahir,
                        "tanggal_lahir" => $request->tanggal_lahir,
                        "id_rt" => $request->rt,
                        "id_pendidikan_terakhir" => $request->pendidikan,
                        "jenis_kelamin" => $request->jenkel,
                        "foto" => $foto,
                        "updated_date" => date('Y-m-d H:i:s'),
                    ]
                );
        
                if ($warga) {
                    $tipe_pesan = 'success';
                    $pesan      = 'Data Warga berhasil diperbaharui!';
                }else {
                    $tipe_pesan = 'failed';
                    $pesan      = 'Data Warga gagal diperbaharui!';
                }
            }else {
                $tipe_pesan = 'failed';
                $pesan      = 'Data Foto Warga gagal diunggah!';
            }

        }else {
            $warga= DB::table('warga')-> where('id', $request->id)->update(
                [   "nik" => $request->nik,
                    "nama" => $request->nama,
                    "tempat_lahir" => $request->tempat_lahir,
                    "tanggal_lahir" => $request->tanggal_lahir,
                    "id_rt" => $request->rt,
                    "id_pendidikan_terakhir" => $request->pendidikan,
                    "jenis_kelamin" => $request->jenkel,
                    "updated_date" => date('Y-m-d H:i:s'),
                ]
            );
    
            if ($warga) {
                $tipe_pesan = 'success';
                $pesan      = 'Data Warga berhasil diperbaharui!';
            }else {
                $tipe_pesan = 'failed';
                $pesan      = 'Data Warga gagal diperbaharui!';
            }
        }

        return redirect('admin/warga')->with($tipe_pesan, $pesan);
    }
}
