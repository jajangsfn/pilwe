<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuickCountController extends Controller
{
    //


    public function index() {
        return view('quick/index');
    }

    public function quick_count() {
        $system = DB::table("system")->select("limit_quick_count")->first();
        return view('quick/quick' , ['system'=>$system]);
    }

    public function realtime_count() {

        //get limit from db
        $limit_counting      = DB::table("system")
                               ->select("limit_counting")
                               ->first();

        //get data with limitation
        $get_data_per_minute = DB::table("pemilihan")
                               ->select("id")
                               ->whereRaw("counting is null and id_calon is not null")
                               ->limit($limit_counting->limit_counting)
                               ->get();

        $chart_data = array();
        
        if (!$get_data_per_minute->isEmpty()) {
            // set continue;
            $continue = 1;
             // update data
            foreach($get_data_per_minute as $key => $row) {
                $update_counting = DB::table("pemilihan")
                                ->where("id", $row->id)->update(
                                    [
                                        "counting" => 1,
                                    ]
                                );           
            }

            // counting data 
            $count_data_per_minute = DB::table("pemilihan")
                                    ->leftJoin("warga","warga.id","pemilihan.id_calon")
                                    ->selectRaw("count(*) total_suara, id_calon,warga.nama")
                                    ->where("counting",1)
                                    ->groupBy("pemilihan.id_calon")
                                    ->orderBy("pemilihan.id_calon")
                                    ->get();

            foreach($count_data_per_minute as $key => $row) {
                $chart_data[$key]['y'] = $row->total_suara;
                $chart_data[$key]['name'] = '<span style="font-size:18px">'.$row->nama.'</span>';
                $chart_data[$key]['drilldown'] = '<span style="font-size:18px">'.$row->nama.'</span>';
            }
        }else {
            $continue = 0;
            $chart_data = array();
        }
       
        
        $data['continue'] = $continue;
        $data['chart']    = $chart_data;
        
        echo json_encode($data);
        
    }


    public function final_count() {

        $count_data = DB::table("pemilihan")
                      ->leftJoin("warga","warga.id","pemilihan.id_calon")
                      ->selectRaw("count(*) total_suara, id_calon,warga.nama,warga.foto")
                      ->where("counting",1)
                      ->groupBy("pemilihan.id_calon")
                      ->orderBy("pemilihan.id_calon")
                      ->get();
        
        $result = array();

        $max = $count_data[0]->total_suara;
        $temp = 0;
        foreach($count_data as $key => $row) {
                      
            
            $result[$key]['data'] = $row;
            if($row->total_suara > $max){
                $max = $row->total_suara;
                $result[$key]['data']->is_max = true;
            }else {
                $result[$key]['data']->is_max = false;
            }


            
        }
        
        echo json_encode($result);exit;
        return view('quick/final');


    }
}
