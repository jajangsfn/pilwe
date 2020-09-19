<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Codedge\Fpdf\Fpdf\Fpdf;

class ReportController extends Controller
{
    private $fpdf;
    //

    public function index() {
        return view('report/index');
    }

    public function print($type = 1) {
        $table= $this->get_table($type);
        
        $data = $this->get_data($type);
        
        
        $this->fpdf = new Fpdf;
        $this->fpdf->AddPage("P","A4");
        $this->fpdf->setfont('Arial','B',14);
        $this->fpdf->Cell(190,10,$table['title'],0,0,'C');    
        $this->fpdf->setfont('Arial','B',11);
        $this->fpdf->setY(25);
        $this->fpdf->setX($table['x']);
        $this->fpdf->SetFillColor(52, 152, 219);
        $this->fpdf->SetTextColor(255, 255, 255);
        if ($type == 3) {            
            $this->fpdf->SetFillColor(255, 255, 255);
            $this->fpdf->SetTextColor(0, 0, 0);
            $this->fpdf->cell(65, 5, 'Data Pemilihan',0,0,'',1);
            $this->fpdf->ln();
            $this->fpdf->SetFillColor(52, 152, 219);
            $this->fpdf->SetTextColor(255, 255, 255);
            $this->fpdf->setY(30);
            $this->fpdf->cell(65, 5, 'Total Pemilih',1,0,'C',1);
            $this->fpdf->cell(65, 5, 'Belum Memilih',1,0,'C',1);
            $this->fpdf->cell(65, 5, 'Sudah Memilih',1,0,'C',1);
            $this->fpdf->Ln(5);
            // $this->fpdf->setY(45);
            $this->fpdf->setX($table['x']);
            $this->fpdf->ln(10);
            $this->fpdf->SetFillColor(255, 255, 255);
            $this->fpdf->SetTextColor(0, 0, 0);
            $this->fpdf->cell(65, 5, 'Data Perolehan Suara',0,1,'',1);
            $this->fpdf->SetFillColor(52, 152, 219);
            $this->fpdf->SetTextColor(255, 255, 255);
        }

        foreach($table['header'] as $key => $row) {
            $this->fpdf->cell($row['width'], $row['height'], $row['title'],1,0,'C',1);
            
        }

        if (!$data['data']->isEmpty()) {
            $this->fpdf->setfont('Arial','',10);
            $this->fpdf->setY(30);
            $this->fpdf->SetTextColor(0, 0, 0);
            //warga
            if ($type == 1) {
                foreach($data['data'] as $key =>$row) {
                    $this->fpdf->setX($table['x']);
                    $this->fpdf->cell($table['header'][0]['width'], 
                                      $table['header'][0]['height'], 
                                      $key+1,1,0,'C');
                    
                    $this->fpdf->cell($table['header'][1]['width'], 
                                      $table['header'][1]['height'], 
                                      $row->nik,1,0);
                    
                    $this->fpdf->cell($table['header'][2]['width'], 
                                      $table['header'][2]['height'], 
                                      $row->nama,1,0);
                    
                    $this->fpdf->cell($table['header'][3]['width'], 
                                      $table['header'][3]['height'], 
                                      ucfirst($row->tempat_lahir),1,0,'C');
    
                    $this->fpdf->cell($table['header'][4]['width'], 
                                      $table['header'][4]['height'], 
                                      $row->tanggal_lahir,1,0,'C');
                        
                    $this->fpdf->cell($table['header'][5]['width'], 
                                      $table['header'][5]['height'], 
                                      $row->rt,1,0,'C');
                    
                    $this->fpdf->ln();
                }
            //calon
            }else if ( $type == 2 ){
                foreach($data['data'] as $key =>$row) {
                    $this->fpdf->setX($table['x']);
                    $this->fpdf->cell($table['header'][0]['width'], 
                                      $table['header'][0]['height'], 
                                      $key+1,1,0,'C');
                    
                    $this->fpdf->cell($table['header'][1]['width'], 
                                      $table['header'][1]['height'], 
                                      $row->nik,1,0);
                    
                    $this->fpdf->cell($table['header'][2]['width'], 
                                      $table['header'][2]['height'], 
                                      $row->nama,1,0);
                    
                    $this->fpdf->cell($table['header'][3]['width'], 
                                      $table['header'][3]['height'], 
                                      ucfirst($row->tempat_lahir),1,0,'C');
    
                    $this->fpdf->cell($table['header'][4]['width'], 
                                      $table['header'][4]['height'], 
                                      $row->tanggal_lahir,1,0,'C');
                        
                    $this->fpdf->cell($table['header'][5]['width'], 
                                      $table['header'][5]['height'], 
                                      $row->rt,1,0,'C');
                    
                    $this->fpdf->cell($table['header'][6]['width'], 
                                      $table['header'][6]['height'], 
                                      $row->pendidikan_terakhir,1,0,'C');
                    
                    $this->fpdf->ln();
                }
            // pemilihan
            }else if ( $type == 3 ){
                $this->fpdf->setY(35);
                $this->fpdf->setX($table['x']);
                $this->fpdf->cell(65, 5, $data['belum_memilih'] + $data['sudah_memilih'],1,0,'C');
                $this->fpdf->cell(65, 5, $data['belum_memilih'],1,0,'C');
                $this->fpdf->cell(65, 5, $data['sudah_memilih'],1,0,'C');
    
                $this->fpdf->ln(20);
                foreach($data['data'] as $key =>$row) {
                    $this->fpdf->setX($table['x']);
                    $this->fpdf->cell($table['header'][0]['width'], 
                                      $table['header'][0]['height'], 
                                      $row->id,1,0,'C');
                    
                    $this->fpdf->cell($table['header'][1]['width'], 
                                      $table['header'][1]['height'], 
                                      $row->nik,1,0);
                    
                    $this->fpdf->cell($table['header'][2]['width'], 
                                      $table['header'][2]['height'], 
                                      $row->nama,1,0);
                    
                    $this->fpdf->cell($table['header'][3]['width'], 
                                      $table['header'][3]['height'], 
                                      number_format($row->total_suara),1,0,'C');
    
                    $this->fpdf->ln();
                }


            $this->fpdf->Ln(5);
            $this->fpdf->SetFillColor(255, 255, 255);
            $this->fpdf->SetTextColor(0, 0, 0);
            $this->fpdf->setfont('Arial','B',10);
            $this->fpdf->cell(65, 5, 'Data Saksi',0,1,'',1);

            $this->fpdf->SetFillColor(52, 152, 219);
            $this->fpdf->SetTextColor(255, 255, 255);
            
            $this->fpdf->cell(10, 5, 'No',1,0,'C',1);
            $this->fpdf->cell(45, 5, 'NIK',1,0,'C',1);
            $this->fpdf->cell(50, 5, 'Nama Saksi',1,0,'C',1);
            $this->fpdf->cell(50, 5, 'Saksi Dari Calon ',1,0,'C',1);
            $this->fpdf->cell(40, 5, 'TTD',1,0,'C',1);
            $this->fpdf->Ln(5);

            // loop saksi
            $this->fpdf->setfont('Arial','',10);
            $this->fpdf->SetTextColor(0, 0, 0);
            foreach($data['saksi'] as $key =>$row) {
                $this->fpdf->cell(10, 5, $key+1,1,0,'C');
                $this->fpdf->cell(45, 5, $row->nik,1,0);
                $this->fpdf->cell(50, 5, $row->nama_saksi,1,0);
                $this->fpdf->cell(50, 5, $row->nama_calon,1,0);
                $this->fpdf->cell(40, 5, '',1,0,'C');

                $this->fpdf->ln();
            }
            //rt
            }else if ( $type == 4 ){
                foreach($data['data'] as $key =>$row) {
                    $this->fpdf->setX($table['x']);
                    $this->fpdf->cell($table['header'][0]['width'], 
                                      $table['header'][0]['height'], 
                                      $key+1,1,0,'C');
                    
                    $this->fpdf->cell($table['header'][1]['width'], 
                                      $table['header'][1]['height'], 
                                      $row->rt,1,0);
                    
                    $this->fpdf->ln();
                }
            //bilik suara
            }else if ( $type == 5 ){
                foreach($data['data'] as $key =>$row) {
                    $this->fpdf->setX($table['x']);
                    $this->fpdf->cell($table['header'][0]['width'], 
                                      $table['header'][0]['height'], 
                                      $key+1,1,0,'C');
                    
                    $this->fpdf->cell($table['header'][1]['width'], 
                                      $table['header'][1]['height'], 
                                      $row->bilik_suara,1,0);
                    
                    $this->fpdf->ln();
                }
            }
            
            
        }
        $this->fpdf->Output();
        exit;
    }

    public function get_table($type = 1) {
        //warga
        if ($type == 1) {

            $table = array("title" => "Data Warga",
                            "x" =>3,
                            "header" => 
                                array(
                                    0 => array(
                                        "title" => "No",
                                        "width" => 8,
                                        "height" => 5,
                                    ),
                                    1 => array(
                                        "title" => "NIK",
                                        "width" => 40,
                                        "height" => 5,
                                    ),
                                    2 => array(
                                        "title" => "Nama",
                                        "width" => 70,
                                        "height" => 5,
                                    ),
                                    3 => array(
                                        "title" => "Tempat Lahir",
                                        "width" => 35,
                                        "height" => 5,
                                    ),
                                    4 => array(
                                        "title" => "Tanggal Lahir",
                                        "width" => 30,
                                        "height" => 5,
                                    ),
                                    5 => array(
                                        "title" => "RT",
                                        "width" => 15,
                                        "height" => 5,
                                    ),
                            ),

                        );
        //calon
        }else if ($type == 2) {
            $table = array("title" => "Data Calon Ketua RW 004",
                            "x" =>3,
                            "header" => 
                                    array(
                                        0 => array(
                                            "title" => "No",
                                            "width" => 8,
                                            "height" => 5,
                                        ),
                                        1 => array(
                                            "title" => "NIK",
                                            "width" => 40,
                                            "height" => 5,
                                        ),
                                        2 => array(
                                            "title" => "Nama",
                                            "width" => 50,
                                            "height" => 5,
                                        ),
                                        3 => array(
                                            "title" => "Tempat Lahir",
                                            "width" => 35,
                                            "height" => 5,
                                        ),
                                        4 => array(
                                            "title" => "Tanggal Lahir",
                                            "width" => 30,
                                            "height" => 5,
                                        ),
                                        5 => array(
                                            "title" => "RT",
                                            "width" => 15,
                                            "height" => 5,
                                        ),
                                        6 => array(
                                            "title" => "Pendidikan",
                                            "width" => 25,
                                            "height" => 5,
                                        ),
                                ),

                        );   
        //pemilihan
        }else if ($type == 3) {
            $table = array("title" => "Data Hasil Pemilihan Ketua RW 004",
                            "x" =>10,
                            "header" => 
                    array(
                        0 => array(
                            "title" => "No Urut",
                            "width" => 18,
                            "height" => 5,
                        ),
                        1 => array(
                            "title" => "NIK",
                            "width" => 45,
                            "height" => 5,
                        ),
                        2 => array(
                            "title" => "Nama",
                            "width" => 80,
                            "height" => 5,
                        ),
                        3 => array(
                            "title" => "Total Perolehan Suara",
                            "width" => 52,
                            "height" => 5,
                        ),
                ),

            ); 
        // rt
        }else if ($type == 4) {
            $table = array("title" => "Data RT",
                            "x" =>10,
                            "header" => 
                    array(
                        0 => array(
                            "title" => "No",
                            "width" => 10,
                            "height" => 5,
                        ),
                        1 => array(
                            "title" => "RT",
                            "width" => 180,
                            "height" => 5,
                        ),
                ),

            ); 
        
        //bilik suara
        }else if ($type == 5) {
            $table = array("title" => "Data Bilik Suara",
                            "x" =>10,
                            "header" => 
                    array(
                        0 => array(
                            "title" => "No",
                            "width" => 10,
                            "height" => 5,
                        ),
                        1 => array(
                            "title" => "Bilik",
                            "width" => 180,
                            "height" => 5,
                        ),
                ),

            ); 
        }

        return $table;
    }
    public function get_data($type = 1) {
        //warga
        if ($type == 1 ) {
            $data['data'] = DB::table("warga")
                    ->join("rt", "rt.id", "warga.id_rt")
                    ->select("*","rt.rt")
                    ->orderBy("nama")
                    ->get();
        //calon
        }else if ( $type == 2) {
            $data['data'] = DB::table("calon")
                    ->join("warga", "warga.id", "calon.id_warga")
                    ->join("jenis_pendidikan", "jenis_pendidikan.id","warga.id_pendidikan_terakhir")
                    ->join("rt", "rt.id", "warga.id_rt")
                    ->select("warga.*","rt.rt","jenis_pendidikan.nama as pendidikan_terakhir")->get();
        //pemilihan
        }else if ( $type == 3) {
            $data['belum_memilih'] = DB::table("warga")
                                    ->leftJoin("pemilihan", "pemilihan.id_warga", "warga.id") 
                                    ->whereRaw("pemilihan.id_warga is null")
                                    ->select("*")
                                    ->get()->count();

            $data['sudah_memilih'] = DB::table("warga")
                                    ->join("pemilihan", "pemilihan.id_warga", "warga.id") 
                                    ->select("*")
                                    ->get()->count();
            
            $data['saksi']  = DB::table("saksi")
                            ->leftJoin("warga", "warga.id","saksi.id_saksi")
                            ->leftJoin("calon","calon.id","saksi.id_calon")
                            ->leftJoin("warga as warga_", "warga_.id","calon.id_warga")
                            ->select("saksi.*","calon.id as no_urut","warga.nik","warga.nama as nama_saksi","warga_.nama as nama_calon")
                            ->get();

            $data['data'] = DB::table("pemilihan")
                            ->leftJoin("warga","warga.id","pemilihan.id_calon")
                            ->leftJoin("calon","calon.id_warga","warga.id")
                            ->selectRaw("count(*) total_suara, calon.id, id_calon,warga.nik,warga.nama,warga.foto")
                            ->where("counting",1)
                            ->groupBy("pemilihan.id_calon")
                            ->orderBy("calon.id")
                            ->get();
        // rt
        }else if ( $type == 4) {
            $data['data'] = DB::table("rt")
                    ->select("*")->get();

        //bilik suara
        }else if ( $type == 5) {
            $data['data'] = DB::table("bilik_suara")
                    ->select("*")->get();
        }else {
            return null;
        }


        return $data;
    }
}
