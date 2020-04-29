<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawangsk;
use App\Karyawansby;
use DB;

class DashboardController extends Controller
{
    public function index(){

        $pengunjungsby = DB::table('laporpengunjungsby')
            ->select(DB::raw('SUM(laporjumlah_sby) AS sumsby'))
            ->whereYear('laportgl_sby', '=', date('Y'))
            ->groupBy(DB::raw('MONTH(laportgl_sby)'))
            ->first();
        $pengunjunggsk = DB::table('laporpengunjunggsk')
            ->select(DB::raw('SUM(laporjumlah_gsk) AS sumgsk'))
            ->whereYear('laportgl_gsk', '=', date('Y'))
            ->groupBy(DB::raw('MONTH(laportgl_gsk)'))
            ->first();
        $karyawangsk = Karyawangsk::all()->count();
        $karyawansby = Karyawansby::all()->count();

        if(auth()->user()->role == 'admin_gresik'){
            $karyawan = $karyawangsk;
            $pengunjung = $pengunjunggsk->sumgsk;
        }else if(auth()->user()->role == 'admin_surabaya'){
            $karyawan = $karyawansby;
            $pengunjung = $pengunjungsby->sumsby;
        }else{
            $karyawan = intval($karyawansby) + intval($karyawangsk);
            $pengunjung = $pengunjunggsk->sumgsk + $pengunjungsby->sumsby;
        }
        //dd(auth()->user()->role);
        return view('pages.dashboard', compact('karyawan', 'pengunjung'));
    }
}
