<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Karyawansby;
use App\Laporkaryawansby;

class LaporkaryawansbyController extends Controller
{
    public function index()
    {
        $laporkaryawansby = Laporkaryawansby::all();
        $karyawansby = Karyawansby::all();
        $karyawansby = Karyawansby::pluck('karyawan_sby','id');
        return view('pages.laporkaryawansby',compact('karyawansby','laporkaryawansby'));
    }

    public function store(Request $request)
    {
        Laporkaryawansby::create($request->all());
        return redirect('laporkaryawansby');
    }

    public function delete($id)
    {
    $laporkaryawansby = Laporkaryawansby::find($id);
    $laporkaryawansby->delete();
    return redirect('/laporkaryawansby');
    }
}
