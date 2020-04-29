<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GrafikPenjualanController extends Controller
{
    public function index(){
    	return view('pages.grafikmenusby');
    }

    public function indexGsk(){
    	return view('pages.grafikmenugsk');
    }

    public function sumPenjualanMakananSby1(){

        $array_tahun = array();
        $array_bulan = array();
        $array_data = array();

        $bulan = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
            '11',
            '12'
        ];

        $data_category = DB::table('lapormenusby')
                ->select(DB::raw('lapormenu_sby, YEAR(laportgl_sby) AS tahun'))
                ->where(DB::raw('laporkategori_sby'), '=',  'Makanan')
                ->whereYear(DB::raw('laportgl_sby'), '=',  date('Y'))
                ->get();

        foreach ($data_category as $c) {

            $bulan = [
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                '10',
                '11',
                '12'
            ];

            $data_bulan = DB::table('lapormenusby')
                ->select(DB::raw("lapormenu_sby, YEAR(laportgl_sby) as tahun,
                        SUM(IF(MONTH(laportgl_sby) = '1', laporterjual_sby, 0)) AS Januari,
                        SUM(IF(MONTH(laportgl_sby) = '2', laporterjual_sby, 0)) AS Februari,
                        SUM(IF(MONTH(laportgl_sby) = '3', laporterjual_sby, 0)) AS Maret,
                        SUM(IF(MONTH(laportgl_sby) = '4', laporterjual_sby, 0)) AS April,
                        SUM(IF(MONTH(laportgl_sby) = '5', laporterjual_sby, 0)) AS Mei,
                        SUM(IF(MONTH(laportgl_sby) = '6', laporterjual_sby, 0)) AS Juni,
                        SUM(IF(MONTH(laportgl_sby) = '7', laporterjual_sby, 0)) AS Juli,
                        SUM(IF(MONTH(laportgl_sby) = '8', laporterjual_sby, 0)) AS Agustus,
                        SUM(IF(MONTH(laportgl_sby) = '9', laporterjual_sby, 0)) AS September,
                        SUM(IF(MONTH(laportgl_sby) = '10', laporterjual_sby, 0)) AS Oktober,
                        SUM(IF(MONTH(laportgl_sby) = '11', laporterjual_sby, 0)) AS Nopember,
                        SUM(IF(MONTH(laportgl_sby) = '12', laporterjual_sby, 0)) AS Desember"))
                ->where(DB::raw('lapormenu_sby'), '=',  $c->lapormenu_sby)
                ->whereYear(DB::raw('laportgl_sby'), '=',  date('Y'))
                ->whereIn(DB::raw('MONTH(laportgl_sby)'), $bulan)
                ->groupBy(['tahun', 'lapormenu_sby'])
                ->get();

            $data_month_h['name'] = $c->lapormenu_sby;
            $data_month_h['data'] = array();

            foreach($data_bulan as $dm){
                $data_month_h['data'] = [
                    intval($dm->Januari),
                    intval($dm->Februari),
                    intval($dm->Maret),
                    intval($dm->April),
                    intval($dm->Mei),
                    intval($dm->Juni),
                    intval($dm->Juli),
                    intval($dm->Agustus),
                    intval($dm->September),
                    intval($dm->Oktober),
                    intval($dm->Nopember),
                    intval($dm->Desember),
                ];
            }

            array_push($array_bulan, $data_month_h);

        }

        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'Nopember',
            'Desember',
        ];        

        $response = array(
            'kategori_barang' => $array_bulan,
            'bulan' => $bulan
        );
        
        echo json_encode($response);

    }

    public function sumPenjualanMinumanSby1(){

        $array_tahun = array();
        $array_bulan = array();
        $array_data = array();

        $bulan = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
            '11',
            '12'
        ];

        $data_category = DB::table('lapormenusby')
                ->select(DB::raw('lapormenu_sby, YEAR(laportgl_sby) AS tahun'))
                ->where(DB::raw('laporkategori_sby'), '=',  'Minuman')
                ->whereYear(DB::raw('laportgl_sby'), '=',  date('Y'))
                ->get();

        foreach ($data_category as $c) {

            $bulan = [
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                '10',
                '11',
                '12'
            ];

            $data_bulan = DB::table('lapormenusby')
                ->select(DB::raw("lapormenu_sby, YEAR(laportgl_sby) as tahun,
                        SUM(IF(MONTH(laportgl_sby) = '1', laporterjual_sby, 0)) AS Januari,
                        SUM(IF(MONTH(laportgl_sby) = '2', laporterjual_sby, 0)) AS Februari,
                        SUM(IF(MONTH(laportgl_sby) = '3', laporterjual_sby, 0)) AS Maret,
                        SUM(IF(MONTH(laportgl_sby) = '4', laporterjual_sby, 0)) AS April,
                        SUM(IF(MONTH(laportgl_sby) = '5', laporterjual_sby, 0)) AS Mei,
                        SUM(IF(MONTH(laportgl_sby) = '6', laporterjual_sby, 0)) AS Juni,
                        SUM(IF(MONTH(laportgl_sby) = '7', laporterjual_sby, 0)) AS Juli,
                        SUM(IF(MONTH(laportgl_sby) = '8', laporterjual_sby, 0)) AS Agustus,
                        SUM(IF(MONTH(laportgl_sby) = '9', laporterjual_sby, 0)) AS September,
                        SUM(IF(MONTH(laportgl_sby) = '10', laporterjual_sby, 0)) AS Oktober,
                        SUM(IF(MONTH(laportgl_sby) = '11', laporterjual_sby, 0)) AS Nopember,
                        SUM(IF(MONTH(laportgl_sby) = '12', laporterjual_sby, 0)) AS Desember"))
                ->where(DB::raw('lapormenu_sby'), '=',  $c->lapormenu_sby)
                ->whereYear(DB::raw('laportgl_sby'), '=',  date('Y'))
                ->whereIn(DB::raw('MONTH(laportgl_sby)'), $bulan)
                ->groupBy(['tahun', 'lapormenu_sby'])
                ->get();

            $data_month_h['name'] = $c->lapormenu_sby;
            $data_month_h['data'] = array();

            foreach($data_bulan as $dm){
                $data_month_h['data'] = [
                    intval($dm->Januari),
                    intval($dm->Februari),
                    intval($dm->Maret),
                    intval($dm->April),
                    intval($dm->Mei),
                    intval($dm->Juni),
                    intval($dm->Juli),
                    intval($dm->Agustus),
                    intval($dm->September),
                    intval($dm->Oktober),
                    intval($dm->Nopember),
                    intval($dm->Desember),
                ];
            }

            array_push($array_bulan, $data_month_h);

        }

        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'Nopember',
            'Desember',
        ];        

        $response = array(
            'kategori_barang' => $array_bulan,
            'bulan' => $bulan
        );
        
        echo json_encode($response);

    }
    public function sumPenjualanMakananGsk1(){

        $array_tahun = array();
        $array_bulan = array();
        $array_data = array();

        $bulan = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
            '11',
            '12'
        ];

        $data_category = DB::table('lapormenugsk')
                ->select(DB::raw('lapormenu_gsk, YEAR(laportgl_gsk) AS tahun'))
                ->where(DB::raw('laporkategori_gsk'), '=',  'Makanan')
                ->whereYear(DB::raw('laportgl_gsk'), '=',  date('Y'))
                ->get();

        foreach ($data_category as $c) {

            $bulan = [
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                '10',
                '11',
                '12'
            ];

            $data_bulan = DB::table('lapormenugsk')
                ->select(DB::raw("lapormenu_gsk, YEAR(laportgl_gsk) as tahun,
                        SUM(IF(MONTH(laportgl_gsk) = '1', laporterjual_gsk, 0)) AS Januari,
                        SUM(IF(MONTH(laportgl_gsk) = '2', laporterjual_gsk, 0)) AS Februari,
                        SUM(IF(MONTH(laportgl_gsk) = '3', laporterjual_gsk, 0)) AS Maret,
                        SUM(IF(MONTH(laportgl_gsk) = '4', laporterjual_gsk, 0)) AS April,
                        SUM(IF(MONTH(laportgl_gsk) = '5', laporterjual_gsk, 0)) AS Mei,
                        SUM(IF(MONTH(laportgl_gsk) = '6', laporterjual_gsk, 0)) AS Juni,
                        SUM(IF(MONTH(laportgl_gsk) = '7', laporterjual_gsk, 0)) AS Juli,
                        SUM(IF(MONTH(laportgl_gsk) = '8', laporterjual_gsk, 0)) AS Agustus,
                        SUM(IF(MONTH(laportgl_gsk) = '9', laporterjual_gsk, 0)) AS September,
                        SUM(IF(MONTH(laportgl_gsk) = '10', laporterjual_gsk, 0)) AS Oktober,
                        SUM(IF(MONTH(laportgl_gsk) = '11', laporterjual_gsk, 0)) AS Nopember,
                        SUM(IF(MONTH(laportgl_gsk) = '12', laporterjual_gsk, 0)) AS Desember"))
                ->where(DB::raw('lapormenu_gsk'), '=',  $c->lapormenu_gsk)
                ->whereYear(DB::raw('laportgl_gsk'), '=',  date('Y'))
                ->whereIn(DB::raw('MONTH(laportgl_gsk)'), $bulan)
                ->groupBy(['tahun', 'lapormenu_gsk'])
                ->get();

            $data_month_h['name'] = $c->lapormenu_gsk;
            $data_month_h['data'] = array();

            foreach($data_bulan as $dm){
                $data_month_h['data'] = [
                    intval($dm->Januari),
                    intval($dm->Februari),
                    intval($dm->Maret),
                    intval($dm->April),
                    intval($dm->Mei),
                    intval($dm->Juni),
                    intval($dm->Juli),
                    intval($dm->Agustus),
                    intval($dm->September),
                    intval($dm->Oktober),
                    intval($dm->Nopember),
                    intval($dm->Desember),
                ];
            }

            array_push($array_bulan, $data_month_h);

        }

        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'Nopember',
            'Desember',
        ];        

        $response = array(
            'kategori_barang' => $array_bulan,
            'bulan' => $bulan
        );
        
        echo json_encode($response);

    }
    public function sumPenjualanMinumanGsk1(){

        $array_tahun = array();
        $array_bulan = array();
        $array_data = array();

        $bulan = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
            '11',
            '12'
        ];

        $data_category = DB::table('lapormenugsk')
                ->select(DB::raw('lapormenu_gsk, YEAR(laportgl_gsk) AS tahun'))
                ->where(DB::raw('laporkategori_gsk'), '=',  'Minuman')
                ->whereYear(DB::raw('laportgl_gsk'), '=',  date('Y'))
                ->get();

        foreach ($data_category as $c) {

            $bulan = [
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                '10',
                '11',
                '12'
            ];

            $data_bulan = DB::table('lapormenugsk')
                ->select(DB::raw("lapormenu_gsk, YEAR(laportgl_gsk) as tahun,
                        SUM(IF(MONTH(laportgl_gsk) = '1', laporterjual_gsk, 0)) AS Januari,
                        SUM(IF(MONTH(laportgl_gsk) = '2', laporterjual_gsk, 0)) AS Februari,
                        SUM(IF(MONTH(laportgl_gsk) = '3', laporterjual_gsk, 0)) AS Maret,
                        SUM(IF(MONTH(laportgl_gsk) = '4', laporterjual_gsk, 0)) AS April,
                        SUM(IF(MONTH(laportgl_gsk) = '5', laporterjual_gsk, 0)) AS Mei,
                        SUM(IF(MONTH(laportgl_gsk) = '6', laporterjual_gsk, 0)) AS Juni,
                        SUM(IF(MONTH(laportgl_gsk) = '7', laporterjual_gsk, 0)) AS Juli,
                        SUM(IF(MONTH(laportgl_gsk) = '8', laporterjual_gsk, 0)) AS Agustus,
                        SUM(IF(MONTH(laportgl_gsk) = '9', laporterjual_gsk, 0)) AS September,
                        SUM(IF(MONTH(laportgl_gsk) = '10', laporterjual_gsk, 0)) AS Oktober,
                        SUM(IF(MONTH(laportgl_gsk) = '11', laporterjual_gsk, 0)) AS Nopember,
                        SUM(IF(MONTH(laportgl_gsk) = '12', laporterjual_gsk, 0)) AS Desember"))
                ->where(DB::raw('lapormenu_gsk'), '=',  $c->lapormenu_gsk)
                ->whereYear(DB::raw('laportgl_gsk'), '=',  date('Y'))
                ->whereIn(DB::raw('MONTH(laportgl_gsk)'), $bulan)
                ->groupBy(['tahun', 'lapormenu_gsk'])
                ->get();

            $data_month_h['name'] = $c->lapormenu_gsk;
            $data_month_h['data'] = array();

            foreach($data_bulan as $dm){
                $data_month_h['data'] = [
                    intval($dm->Januari),
                    intval($dm->Februari),
                    intval($dm->Maret),
                    intval($dm->April),
                    intval($dm->Mei),
                    intval($dm->Juni),
                    intval($dm->Juli),
                    intval($dm->Agustus),
                    intval($dm->September),
                    intval($dm->Oktober),
                    intval($dm->Nopember),
                    intval($dm->Desember),
                ];
            }

            array_push($array_bulan, $data_month_h);

        }

        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'Nopember',
            'Desember',
        ];        

        $response = array(
            'kategori_barang' => $array_bulan,
            'bulan' => $bulan
        );
        
        echo json_encode($response);

    }
    public function sumPenjualanMakananSby(){
        $array_tahun = array();
        $array_bulan = array();
        $array_data = array();
        $data_tahun = DB::table('lapormenusby')
            ->select(DB::raw('SUM(laporterjual_sby) AS sum, MONTH(laportgl_sby) AS bulan'))
            ->where('laporkategori_sby', '=', 'Makanan')
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
            $data_bulan = DB::table('lapormenusby')
                    ->select(DB::raw('SUM(laporterjual_sby) as sum, DAY(laportgl_sby) AS tanggal'))
                    ->where('laporkategori_sby', '=', 'Makanan')
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

    public function sumPenjualanMinumanSby(){
        $array_tahun = array();
        $array_bulan = array();
        $array_data = array();
        $data_tahun = DB::table('lapormenusby')
            ->select(DB::raw('SUM(laporterjual_sby) AS sum, MONTH(laportgl_sby) AS bulan'))
            ->where('laporkategori_sby', '=', 'Minuman')
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
            $data_bulan = DB::table('lapormenusby')
                    ->select(DB::raw('SUM(laporterjual_sby) as sum, DAY(laportgl_sby) AS tanggal'))
                    ->where('laporkategori_sby', '=', 'Minuman')
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

    public function sumPenjualanMakananGsk(){
        $array_tahun = array();
        $array_bulan = array();
        $array_data = array();
        $data_tahun = DB::table('lapormenugsk')
            ->select(DB::raw('SUM(laporterjual_gsk) AS sum, MONTH(laportgl_gsk) AS bulan'))
            ->where('laporkategori_gsk', '=', 'Makanan')
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
            $data_bulan = DB::table('lapormenugsk')
                    ->select(DB::raw('SUM(laporterjual_gsk) as sum, DAY(laportgl_gsk) AS tanggal'))
                    ->where('laporkategori_gsk', '=', 'Makanan')
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

    public function sumPenjualanMinumanGsk(){
        $array_tahun = array();
        $array_bulan = array();
        $array_data = array();
        $data_tahun = DB::table('lapormenugsk')
            ->select(DB::raw('SUM(laporterjual_gsk) AS sum, MONTH(laportgl_gsk) AS bulan'))
            ->where('laporkategori_gsk', '=', 'Minuman')
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
            $data_bulan = DB::table('lapormenugsk')
                    ->select(DB::raw('SUM(laporterjual_gsk) as sum, DAY(laportgl_gsk) AS tanggal'))
                    ->where('laporkategori_gsk', '=', 'Minuman')
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
