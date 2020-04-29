<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GrafikKaryawanController extends Controller
{
    public function index(){
    	return view('pages.grafikkaryawansby');
    }

    public function indexGsk(){
    	return view('pages.grafikkaryawangsk');
    }

    public function sumKaryawanSby(){

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

        $data_bulan = DB::table('laporkaryawansby')
            ->select(DB::raw("YEAR(laportgl_sby) as tahun,
                    SUM(IF(MONTH(laportgl_sby) = '1', lapormasuk_sby, 0)) AS Januari,
                    SUM(IF(MONTH(laportgl_sby) = '2', lapormasuk_sby, 0)) AS Februari,
                    SUM(IF(MONTH(laportgl_sby) = '3', lapormasuk_sby, 0)) AS Maret,
                    SUM(IF(MONTH(laportgl_sby) = '4', lapormasuk_sby, 0)) AS April,
                    SUM(IF(MONTH(laportgl_sby) = '5', lapormasuk_sby, 0)) AS Mei,
                    SUM(IF(MONTH(laportgl_sby) = '6', lapormasuk_sby, 0)) AS Juni,
                    SUM(IF(MONTH(laportgl_sby) = '7', lapormasuk_sby, 0)) AS Juli,
                    SUM(IF(MONTH(laportgl_sby) = '8', lapormasuk_sby, 0)) AS Agustus,
                    SUM(IF(MONTH(laportgl_sby) = '9', lapormasuk_sby, 0)) AS September,
                    SUM(IF(MONTH(laportgl_sby) = '10', lapormasuk_sby, 0)) AS Oktober,
                    SUM(IF(MONTH(laportgl_sby) = '11', lapormasuk_sby, 0)) AS Nopember,
                    SUM(IF(MONTH(laportgl_sby) = '12', lapormasuk_sby, 0)) AS Desember"))
            ->whereYear(DB::raw('laportgl_sby'), '=',  date('Y'))
            ->whereIn(DB::raw('MONTH(laportgl_sby)'), $bulan)
            ->groupBy('tahun')
            ->get();

        $data_month_h['name'] = 'Masuk';
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

        $data_bulanA = DB::table('laporkaryawansby')
            ->select(DB::raw("YEAR(laportgl_sby) as tahun,
                    SUM(IF(MONTH(laportgl_sby) = '1', laporabsen_sby, 0)) AS Januari,
                    SUM(IF(MONTH(laportgl_sby) = '2', laporabsen_sby, 0)) AS Februari,
                    SUM(IF(MONTH(laportgl_sby) = '3', laporabsen_sby, 0)) AS Maret,
                    SUM(IF(MONTH(laportgl_sby) = '4', laporabsen_sby, 0)) AS April,
                    SUM(IF(MONTH(laportgl_sby) = '5', laporabsen_sby, 0)) AS Mei,
                    SUM(IF(MONTH(laportgl_sby) = '6', laporabsen_sby, 0)) AS Juni,
                    SUM(IF(MONTH(laportgl_sby) = '7', laporabsen_sby, 0)) AS Juli,
                    SUM(IF(MONTH(laportgl_sby) = '8', laporabsen_sby, 0)) AS Agustus,
                    SUM(IF(MONTH(laportgl_sby) = '9', laporabsen_sby, 0)) AS September,
                    SUM(IF(MONTH(laportgl_sby) = '10', laporabsen_sby, 0)) AS Oktober,
                    SUM(IF(MONTH(laportgl_sby) = '11', laporabsen_sby, 0)) AS Nopember,
                    SUM(IF(MONTH(laportgl_sby) = '12', laporabsen_sby, 0)) AS Desember"))
            ->whereYear(DB::raw('laportgl_sby'), '=',  date('Y'))
            ->whereIn(DB::raw('MONTH(laportgl_sby)'), $bulan)
            ->groupBy('tahun')
            ->get();

        $data_month_k['name'] = 'Absen';
        $data_month_k['data'] = array();

        foreach($data_bulanA as $dm){
            $data_month_k['data'] = [
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

        $array_bulan = [
            $data_month_h,
            $data_month_k
        ];

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

    public function sumKaryawanGsk(){

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

        $data_bulan = DB::table('laporkaryawangsk')
            ->select(DB::raw("YEAR(laportgl_gsk) as tahun,
                    SUM(IF(MONTH(laportgl_gsk) = '1', lapormasuk_gsk, 0)) AS Januari,
                    SUM(IF(MONTH(laportgl_gsk) = '2', lapormasuk_gsk, 0)) AS Februari,
                    SUM(IF(MONTH(laportgl_gsk) = '3', lapormasuk_gsk, 0)) AS Maret,
                    SUM(IF(MONTH(laportgl_gsk) = '4', lapormasuk_gsk, 0)) AS April,
                    SUM(IF(MONTH(laportgl_gsk) = '5', lapormasuk_gsk, 0)) AS Mei,
                    SUM(IF(MONTH(laportgl_gsk) = '6', lapormasuk_gsk, 0)) AS Juni,
                    SUM(IF(MONTH(laportgl_gsk) = '7', lapormasuk_gsk, 0)) AS Juli,
                    SUM(IF(MONTH(laportgl_gsk) = '8', lapormasuk_gsk, 0)) AS Agustus,
                    SUM(IF(MONTH(laportgl_gsk) = '9', lapormasuk_gsk, 0)) AS September,
                    SUM(IF(MONTH(laportgl_gsk) = '10', lapormasuk_gsk, 0)) AS Oktober,
                    SUM(IF(MONTH(laportgl_gsk) = '11', lapormasuk_gsk, 0)) AS Nopember,
                    SUM(IF(MONTH(laportgl_gsk) = '12', lapormasuk_gsk, 0)) AS Desember"))
            ->whereYear(DB::raw('laportgl_gsk'), '=',  date('Y'))
            ->whereIn(DB::raw('MONTH(laportgl_gsk)'), $bulan)
            ->groupBy('tahun')
            ->get();

        $data_month_h['name'] = 'Masuk';
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

        $data_bulanA = DB::table('laporkaryawangsk')
            ->select(DB::raw("YEAR(laportgl_gsk) as tahun,
                    SUM(IF(MONTH(laportgl_gsk) = '1', laporabsen_gsk, 0)) AS Januari,
                    SUM(IF(MONTH(laportgl_gsk) = '2', laporabsen_gsk, 0)) AS Februari,
                    SUM(IF(MONTH(laportgl_gsk) = '3', laporabsen_gsk, 0)) AS Maret,
                    SUM(IF(MONTH(laportgl_gsk) = '4', laporabsen_gsk, 0)) AS April,
                    SUM(IF(MONTH(laportgl_gsk) = '5', laporabsen_gsk, 0)) AS Mei,
                    SUM(IF(MONTH(laportgl_gsk) = '6', laporabsen_gsk, 0)) AS Juni,
                    SUM(IF(MONTH(laportgl_gsk) = '7', laporabsen_gsk, 0)) AS Juli,
                    SUM(IF(MONTH(laportgl_gsk) = '8', laporabsen_gsk, 0)) AS Agustus,
                    SUM(IF(MONTH(laportgl_gsk) = '9', laporabsen_gsk, 0)) AS September,
                    SUM(IF(MONTH(laportgl_gsk) = '10', laporabsen_gsk, 0)) AS Oktober,
                    SUM(IF(MONTH(laportgl_gsk) = '11', laporabsen_gsk, 0)) AS Nopember,
                    SUM(IF(MONTH(laportgl_gsk) = '12', laporabsen_gsk, 0)) AS Desember"))
            ->whereYear(DB::raw('laportgl_gsk'), '=',  date('Y'))
            ->whereIn(DB::raw('MONTH(laportgl_gsk)'), $bulan)
            ->groupBy('tahun')
            ->get();

        $data_month_k['name'] = 'Absen';
        $data_month_k['data'] = array();

        foreach($data_bulanA as $dm){
            $data_month_k['data'] = [
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

        $array_bulan = [
            $data_month_h,
            $data_month_k
        ];

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

    public function sumKaryawanMasukSby(){
        $array_tahun = array();
        $array_bulan = array();
        $array_data = array();
        $data_tahun = DB::table('laporkaryawansby')
            ->select(DB::raw('SUM(lapormasuk_sby) AS sum, MONTH(laportgl_sby) AS bulan'))
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
            if($jumlah != 0){
                $data_year['name'] = $bb;
                $data_year['y'] = $jumlah;
                $data_year['drilldown'] = $bb;
                array_push($array_tahun, $data_year);
            }
        }
        $data_y = [
            [
                'colorByPoint' => true,
                'name' => 'Bulan',
                'data' => $array_tahun
            ]
        ];
        foreach($data_tahun as $dt){
            $data_bulan = DB::table('laporkaryawansby')
                    ->select(DB::raw('SUM(lapormasuk_sby) as sum, DAY(laportgl_sby) AS tanggal'))
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
                if($jumlah != 0){
                    $data_month = $dm->tanggal;
                    $data_month = $dm->sum;
                    $data_month_h['data'][] = [$dm->tanggal, $jumlah];
                }
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

    public function sumKaryawanAbsenSby(){
        $array_tahun = array();
        $array_bulan = array();
        $array_data = array();
        $data_tahun = DB::table('laporkaryawansby')
            ->select(DB::raw('SUM(laporabsen_sby) AS sum, MONTH(laportgl_sby) AS bulan'))
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
            if($jumlah != 0){
                $data_year['name'] = $bb;
                $data_year['y'] = $jumlah;
                $data_year['drilldown'] = $bb;
                array_push($array_tahun, $data_year);
            }
        }
        $data_y = [
            [
                'colorByPoint' => true,
                'name' => 'Bulan',
                'data' => $array_tahun
            ]
        ];
        foreach($data_tahun as $dt){
            $data_bulan = DB::table('laporkaryawansby')
                    ->select(DB::raw('SUM(laporabsen_sby) as sum, DAY(laportgl_sby) AS tanggal'))
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
                if($jumlah != 0){
                    $data_month = $dm->tanggal;
                    $data_month = $dm->sum;
                    $data_month_h['data'][] = [$dm->tanggal, $jumlah];
                }
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

    public function sumKaryawanMasukGsk(){
        $array_tahun = array();
        $array_bulan = array();
        $array_data = array();
        $data_tahun = DB::table('laporkaryawangsk')
            ->select(DB::raw('SUM(lapormasuk_gsk) AS sum, MONTH(laportgl_gsk) AS bulan'))
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
            if($jumlah != 0){
                $data_year['name'] = $bb;
                $data_year['y'] = $jumlah;
                $data_year['drilldown'] = $bb;
                array_push($array_tahun, $data_year);
            }
        }
        $data_y = [
            [
                'colorByPoint' => true,
                'name' => 'Bulan',
                'data' => $array_tahun
            ]
        ];
        foreach($data_tahun as $dt){
            $data_bulan = DB::table('laporkaryawangsk')
                    ->select(DB::raw('SUM(lapormasuk_gsk) as sum, DAY(laportgl_gsk) AS tanggal'))
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
                if($jumlah != 0){
                    $data_month = $dm->tanggal;
                    $data_month = $dm->sum;
                    $data_month_h['data'][] = [$dm->tanggal, $jumlah];
                }
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

    public function sumKaryawanAbsenGsk(){
        $array_tahun = array();
        $array_bulan = array();
        $array_data = array();
        $data_tahun = DB::table('laporkaryawangsk')
            ->select(DB::raw('SUM(laporabsen_gsk) AS sum, MONTH(laportgl_gsk) AS bulan'))
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
            if($jumlah != 0){
                $data_year['name'] = $bb;
                $data_year['y'] = $jumlah;
                $data_year['drilldown'] = $bb;
                array_push($array_tahun, $data_year);
            }
        }
        $data_y = [
            [
                'colorByPoint' => true,
                'name' => 'Bulan',
                'data' => $array_tahun
            ]
        ];
        foreach($data_tahun as $dt){
            $data_bulan = DB::table('laporkaryawangsk')
                    ->select(DB::raw('SUM(laporabsen_gsk) as sum, DAY(laportgl_gsk) AS tanggal'))
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
                if($jumlah != 0){
                    $data_month = $dm->tanggal;
                    $data_month = $dm->sum;
                    $data_month_h['data'][] = [$dm->tanggal, $jumlah];
                }
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
