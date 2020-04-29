<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Laporpengunjunggsk;
use Illuminate\Http\Request;

class LaporpengunjunggskController extends Controller
{
    public function index()
    {
    	$laporpengunjunggsk = Laporpengunjunggsk::all();
    	return view('pages.laporpengunjunggsk', ['laporpengunjunggsk' => $laporpengunjunggsk]);
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'laportgl_gsk' => 'required',
			'laporjumlah_gsk' => 'required',
    	]);
 
        laporpengunjunggsk::create([
    		'laportgl_gsk' => $request->laportgl_gsk,
			'laporjumlah_gsk' => $request->laporjumlah_gsk
    	]);
 
    	return redirect('laporpengunjunggsk');
	}
	
public function delete($id)
{
    $laporpengunjunggsk = Laporpengunjunggsk::find($id);
    $laporpengunjunggsk->delete();
    return redirect('/laporpengunjunggsk');
}


public function edit($id)
{
	$laporpengunjunggsk = DB::table('laporpengunjunggsk')->where('id',$id)->get();
	return view('pages.laporpengunjungeditgsk',['laporpengunjunggsk' => $laporpengunjunggsk]);

}


public function update(Request $request)
{
	DB::table('laporpengunjunggsk')->where('id',$request->id)->update([
        'laportgl_gsk' => $request->laportgl_gsk,
        'laporjumlah_gsk' => $request->laporjumlah_gsk
	]);
	return redirect('/laporpengunjunggsk');
}
}
