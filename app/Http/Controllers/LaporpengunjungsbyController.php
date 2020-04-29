<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Laporpengunjungsby;
use Illuminate\Http\Request;

class LaporpengunjungsbyController extends Controller
{
    public function index()
    {
    	$laporpengunjungsby = Laporpengunjungsby::all();
    	return view('pages.laporpengunjungsby', ['laporpengunjungsby' => $laporpengunjungsby]);
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'laportgl_sby' => 'required',
			'laporjumlah_sby' => 'required',
    	]);
 
        laporpengunjungsby::create([
    		'laportgl_sby' => $request->laportgl_sby,
			'laporjumlah_sby' => $request->laporjumlah_sby
    	]);
 
    	return redirect('laporpengunjungsby');
	}
	
public function delete($id)
{
    $laporpengunjungsby = Laporpengunjungsby::find($id);
    $laporpengunjungsby->delete();
    return redirect('/laporpengunjungsby');
}


public function edit($id)
{
	$laporpengunjungsby = DB::table('laporpengunjungsby')->where('id',$id)->get();
	return view('pages.laporpengunjungeditsby',['laporpengunjungsby' => $laporpengunjungsby]);

}


public function update(Request $request)
{
	DB::table('laporpengunjungsby')->where('id',$request->id)->update([
        'laportgl_sby' => $request->laportgl_sby,
        'laporjumlah_sby' => $request->laporjumlah_sby
	]);
	return redirect('/laporpengunjungsby');
}
}
