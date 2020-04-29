<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GrafikPengunjungController extends Controller
{

    public function index(){
    	return view('pages.grafikpengunjungsby');
    }

    public function indexGsk(){
    	return view('pages.grafikpengunjunggsk');
    }

    public function sumPengunjungSby(){

        $array_tahun = array();
        $array_bulan = array();
        $array_data = array();

        $data_tahun = DB::table('laporpengunjungsby')
            ->select(DB::raw('SUM(laporjumlah_sby) AS sum, MONTH(laportgl_sby) AS bulan'))
            ->whereYear('laportgl_sby', '=', date('Y'))
            ->groupBy(DB::raw('MONTH(laportgl_sby)'))
            ->get();
        
        foreach($data_tahun as $dt){
            if($dt->bulan == '1'){
                $bb = 'January';
            }else if($dt->bulan == '2'){
                $bb = 'February';
            }else if($dt->bulan == '3'){
                $bb = 'Maret';
            }else if($dt->bulan == '4'){
                $bb = 'April';
            }else if($dt->bulan == '5'){
                $bb = 'Mei';
            }else if($dt->bulan == '6'){
                $bb = 'Juni';
            }else if($dt->bulan == '7'){
                $bb = 'Juli';
            }else if($dt->bulan == '8'){
                $bb = 'Agustus';
            }else if($dt->bulan == '9'){
                $bb = 'September';
            }else if($dt->bulan == '10'){
                $bb = 'Oktober';
            }else if($dt->bulan == '11'){
                $bb = 'Nopember';
            }else{
                $bb = 'Desember';
            }
            $jumlah = intval($dt->sum);
            $data_year['name'] = $bb;
            $data_year['y'] = $jumlah;
            $data_year['drilldown'] = $bb;

            array_push($array_tahun, $data_year);
        }

        $data_y = [
            [
                'colorByPoint' => true,
                'name' => 'Bulan',
                'data' => $array_tahun
            ]
        ];
            
        foreach($data_tahun as $dt){

            $data_bulan = DB::table('laporpengunjungsby')
                    ->select(DB::raw('SUM(laporjumlah_sby) as sum, DAY(laportgl_sby) AS tanggal'))
                    ->whereMonth('laportgl_sby', '=', $dt->bulan)
                    ->groupBy(DB::raw('DAY(laportgl_sby)'))
                    ->get();
            if($dt->bulan == '1'){
                $bb = 'January';
            }else if($dt->bulan == '2'){
                $bb = 'February';
            }else if($dt->bulan == '3'){
                $bb = 'Maret';
            }else if($dt->bulan == '4'){
                $bb = 'April';
            }else if($dt->bulan == '5'){
                $bb = 'Mei';
            }else if($dt->bulan == '6'){
                $bb = 'Juni';
            }else if($dt->bulan == '7'){
                $bb = 'Juli';
            }else if($dt->bulan == '8'){
                $bb = 'Agustus';
            }else if($dt->bulan == '9'){
                $bb = 'September';
            }else if($dt->bulan == '10'){
                $bb = 'Oktober';
            }else if($dt->bulan == '11'){
                $bb = 'Nopember';
            }else{
                $bb = 'Desember';
            }

            $data_month_h['colorByPoint'] = true;
            $data_month_h['name'] = $bb;
            $data_month_h['id'] = $bb;
            $data_month_h['data'] = array();
    
            foreach($data_bulan as $dm){
                $jumlah = intval($dm->sum);
                $data_month = $dm->tanggal;
                $data_month = $dm->sum;
                $data_month_h['data'][] = [$dm->tanggal, $jumlah];

            }

            array_push($array_bulan, $data_month_h);
        }

        $array_hm['barang'] = $array_bulan;

        array_push($array_data, $array_hm);

        $response = array(
            'kategori' => $data_y,
            'barang' => $array_bulan,
        );

        echo json_encode($response);
        
    }

    public function sumPengunjungGsk(){

        $array_tahun = array();
        $array_bulan = array();
        $array_data = array();

        $data_tahun = DB::table('laporpengunjunggsk')
            ->select(DB::raw('SUM(laporjumlah_gsk) AS sum, MONTH(laportgl_gsk) AS bulan'))
            ->whereYear('laportgl_gsk', '=', date('Y'))
            ->groupBy(DB::raw('MONTH(laportgl_gsk)'))
            ->get();
        
        foreach($data_tahun as $dt){
            if($dt->bulan == '1'){
                $bb = 'January';
            }else if($dt->bulan == '2'){
                $bb = 'February';
            }else if($dt->bulan == '3'){
                $bb = 'Maret';
            }else if($dt->bulan == '4'){
                $bb = 'April';
            }else if($dt->bulan == '5'){
                $bb = 'Mei';
            }else if($dt->bulan == '6'){
                $bb = 'Juni';
            }else if($dt->bulan == '7'){
                $bb = 'Juli';
            }else if($dt->bulan == '8'){
                $bb = 'Agustus';
            }else if($dt->bulan == '9'){
                $bb = 'September';
            }else if($dt->bulan == '10'){
                $bb = 'Oktober';
            }else if($dt->bulan == '11'){
                $bb = 'Nopember';
            }else{
                $bb = 'Desember';
            }
            $jumlah = intval($dt->sum);
            $data_year['name'] = $bb;
            $data_year['y'] = $jumlah;
            $data_year['drilldown'] = $bb;

            array_push($array_tahun, $data_year);
        }

        $data_y = [
            [
                'colorByPoint' => true,
                'name' => 'Bulan',
                'data' => $array_tahun
            ]
        ];
            
        foreach($data_tahun as $dt){

            $data_bulan = DB::table('laporpengunjunggsk')
                    ->select(DB::raw('SUM(laporjumlah_gsk) as sum, DAY(laportgl_gsk) AS tanggal'))
                    ->whereMonth('laportgl_gsk', '=', $dt->bulan)
                    ->groupBy(DB::raw('DAY(laportgl_gsk)'))
                    ->get();
            if($dt->bulan == '1'){
                $bb = 'January';
            }else if($dt->bulan == '2'){
                $bb = 'February';
            }else if($dt->bulan == '3'){
                $bb = 'Maret';
            }else if($dt->bulan == '4'){
                $bb = 'April';
            }else if($dt->bulan == '5'){
                $bb = 'Mei';
            }else if($dt->bulan == '6'){
                $bb = 'Juni';
            }else if($dt->bulan == '7'){
                $bb = 'Juli';
            }else if($dt->bulan == '8'){
                $bb = 'Agustus';
            }else if($dt->bulan == '9'){
                $bb = 'September';
            }else if($dt->bulan == '10'){
                $bb = 'Oktober';
            }else if($dt->bulan == '11'){
                $bb = 'Nopember';
            }else{
                $bb = 'Desember';
            }

            $data_month_h['colorByPoint'] = true;
            $data_month_h['name'] = $bb;
            $data_month_h['id'] = $bb;
            $data_month_h['data'] = array();
    
            foreach($data_bulan as $dm){
                $jumlah = intval($dm->sum);
                $data_month = $dm->tanggal;
                $data_month = $dm->sum;
                $data_month_h['data'][] = [$dm->tanggal, $jumlah];

            }

            array_push($array_bulan, $data_month_h);
        }

        $array_hm['barang'] = $array_bulan;

        array_push($array_data, $array_hm);

        $response = array(
            'kategori' => $data_y,
            'barang' => $array_bulan,
        );

        echo json_encode($response);
        
    }

}
