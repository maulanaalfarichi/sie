<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Menugsk;
use App\Lapormenugsk;

class LapormenugskController extends Controller
{
    public function index()
    {
        $lapormenugsk = Lapormenugsk::all();
        $menugsk = Menugsk::all();
        $menugsk = Menugsk::pluck('menu_gsk','id');
        return view('pages.lapormenugsk', compact('menugsk', 'lapormenugsk'));
    }

    public function add()
    {
        $lapormenugsk = Lapormenugsk::all();
        $menugsk = Menugsk::all();
        return view('pages.lapormenugskadd', ['menugsk' => $menugsk, 'lapormenugsk' => $lapormenugsk]);
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'lapormenu_gsk' => 'required',
			'laporkategori_gsk' => 'required',
            'laportgl_gsk' => 'required',
            'laporterjual_gsk' => 'required'
        ]);
        
        //dd($request->all());
 
        Lapormenugsk::create($request->all());
 
    	return redirect('lapormenugsk');
	}

    public function delete($id)
    {
        $lapormenugsk = Lapormenugsk::find($id);
        $lapormenugsk->delete();
        return redirect('lapormenugsk');
    }
}
