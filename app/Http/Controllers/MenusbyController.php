<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Menusby;

class MenusbyController extends Controller
{
    public function index()
    {
    	$menusby = Menusby::all();
    	return view('pages.menusby', ['menusby' => $menusby]);
    }
    
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'menu_sby' => 'required',
			'kategori_sby' => 'required',
			'harga_sby' => 'required'
    	]);
 
        Menusby::create([
    		'menu_sby' => $request->menu_sby,
			'kategori_sby' => $request->kategori_sby,
			'harga_sby' => $request->harga_sby
    	]);
 
    	return redirect('menusby');
	}
	
	public function delete($id)
	{
		$menusby = Menusby::find($id);
		$menusby->delete();
		return redirect('/menusby');
	}

	public function edit($id)
	{
		$menusby = DB::table('menusby')->where('id',$id)->get();
		return view('pages.menueditsby', ['menusby' => $menusby]);
	}

	public function update(Request $request)
	{
		DB::table('menusby')->where('id',$request->id)->update([
			'menu_sby' => $request->menu_sby,
			'kategori_sby' => $request->kategori_sby,
			'harga_sby' => $request->harga_sby
		]);
		return redirect('/menusby');
	}

}