<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Karyawansby;

class KaryawansbyController extends Controller
{
    public function index()
    {
    	$karyawansby = Karyawansby::all();
    	return view('pages.karyawansby', ['karyawansby' => $karyawansby]);
    }
    
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'karyawan_sby' => 'required',
			'gender_sby' => 'required',
            'nohp_sby' => 'required',
            'jobdesk_sby' => 'required',
            'alamat_sby' => 'required'
    	]);
 
        Karyawansby::create([
    		'karyawan_sby' => $request->karyawan_sby,
			'gender_sby' => $request->gender_sby,
            'nohp_sby' => $request->nohp_sby,
            'jobdesk_sby' => $request->jobdesk_sby,
            'alamat_sby' => $request->alamat_sby
    	]);
 
    	return redirect('karyawansby');
	}
	
public function delete($id)
{
    $karyawansby = Karyawansby::find($id);
    $karyawansby->delete();
    return redirect('/karyawansby');
}


public function edit($id)
{
	$karyawansby = DB::table('karyawansby')->where('id',$id)->get();
	return view('pages.karyawaneditsby',['karyawansby' => $karyawansby]);

}


public function update(Request $request)
{
	DB::table('karyawansby')->where('id',$request->id)->update([
        'karyawan_sby' => $request->karyawan_sby,
        'gender_sby' => $request->gender_sby,
        'nohp_sby' => $request->nohp_sby,
        'jobdesk_sby' => $request->jobdesk_sby,
        'alamat_sby' => $request->alamat_sby
	]);
	return redirect('/karyawansby');
}

}
