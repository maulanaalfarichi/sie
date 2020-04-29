<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Karyawangsk;

class KaryawangskController extends Controller
{
    public function index()
    {
    	$karyawangsk = Karyawangsk::all();
    	return view('pages.karyawangsk', ['karyawangsk' => $karyawangsk]);
    }
    
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'karyawan_gsk' => 'required',
			'gender_gsk' => 'required',
            'nohp_gsk' => 'required',
            'jobdesk_gsk' => 'required',
            'alamat_gsk' => 'required'
    	]);
 
        Karyawangsk::create([
    		'karyawan_gsk' => $request->karyawan_gsk,
			'gender_gsk' => $request->gender_gsk,
            'nohp_gsk' => $request->nohp_gsk,
            'jobdesk_gsk' => $request->jobdesk_gsk,
            'alamat_gsk' => $request->alamat_gsk
    	]);
 
    	return redirect('karyawangsk');
	}
	
public function delete($id)
{
    $karyawangsk = Karyawangsk::find($id);
    $karyawangsk->delete();
    return redirect('/karyawangsk');
}


public function edit($id)
{
	$karyawangsk = DB::table('karyawangsk')->where('id',$id)->get();
	return view('pages.karyawaneditgsk',['karyawangsk' => $karyawangsk]);

}


public function update(Request $request)
{
	DB::table('karyawangsk')->where('id',$request->id)->update([
        'karyawan_gsk' => $request->karyawan_gsk,
        'gender_gsk' => $request->gender_gsk,
        'nohp_gsk' => $request->nohp_gsk,
        'jobdesk_gsk' => $request->jobdesk_gsk,
        'alamat_gsk' => $request->alamat_gsk
	]);
	return redirect('/karyawangsk');
}

}
