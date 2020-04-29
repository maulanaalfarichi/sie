<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Menusby;
use App\Lapormenusby;

class LapormenusbyController extends Controller
{
    public function index()
    {
        $lapormenusby = Lapormenusby::all();
        $menusby = Menusby::all();
        return view('pages.lapormenusby', ['menusby' => $menusby, 'lapormenusby' => $lapormenusby]);
    }

    public function add()
    {
        $lapormenusby = Lapormenusby::all();
        $menusby = Menusby::all();
        return view('pages.lapormenusbyadd', ['menusby' => $menusby, 'lapormenusby' => $lapormenusby]);
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'lapormenu_sby' => 'required',
			'laporkategori_sby' => 'required',
            'laportgl_sby' => 'required',
            'laporterjual_sby' => 'required'
    	]);
 
        Lapormenusby::create([
    		'lapormenu_sby' => $request->lapormenu_sby,
			'laporkategori_sby' => $request->laporkategori_sby,
            'laportgl_sby' => $request->laportgl_sby,
            'laporterjual_sby' => $request->laporterjual_sby
    	]);
 
    	return redirect('lapormenusby');
	}

    public function delete($id)
    {
        $lapormenusby = Lapormenusby::find($id);
        $lapormenusby->delete();
        return redirect('/lapormenusby');
    }

}
