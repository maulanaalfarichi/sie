<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Karyawangsk;
use App\Laporkaryawangsk;

class LaporkaryawangskController extends Controller
{

    public function index()
    {
        $laporkaryawangsk = Laporkaryawangsk::all();
        $karyawangsk = Karyawangsk::all();
        $karyawangsk = Karyawangsk::pluck('karyawan_gsk','id');
        return view('pages.laporkaryawangsk', compact('karyawangsk', 'laporkaryawangsk'));
    }

    public function store(Request $request)
    {
        Laporkaryawangsk::create($request->all());
        return redirect('laporkaryawangsk');
    }

    public function delete($id)
    {
        $laporkaryawangsk = Laporkaryawangsk::find($id);
        $laporkaryawangsk->delete();
        return redirect('laporkaryawangsk');
    }

}
