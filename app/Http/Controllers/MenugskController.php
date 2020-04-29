<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Menugsk;

class MenugskController extends Controller
{
    public function index()
    {
    	$menugsk = Menugsk::all();
    	return view('pages.menugsk', ['menugsk' => $menugsk]);
	}
	
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'menu_gsk' => 'required',
			'kategori_gsk' => 'required',
			'harga_gsk' => 'required'
    	]);
 
        Menugsk::create([
    		'menu_gsk' => $request->menu_gsk,
			'kategori_gsk' => $request->kategori_gsk,
			'harga_gsk' => $request->harga_gsk
    	]);
 
    	return redirect('menugsk');
	}
	
	public function delete($id)
	{
		$menugsk = Menugsk::find($id);
		$menugsk->delete();
		return redirect('/menugsk');
	}


public function edit($id)
{
	$menugsk = DB::table('menugsk')->where('id',$id)->get();
	return view('pages.menueditgsk',['menugsk' => $menugsk]);

}


public function update(Request $request)
{
	DB::table('menugsk')->where('id',$request->id)->update([
		'menu_gsk' => $request->menu_gsk,
			'kategori_gsk' => $request->kategori_gsk,
			'harga_gsk' => $request->harga_gsk
	]);
	return redirect('/menugsk');
}

}
