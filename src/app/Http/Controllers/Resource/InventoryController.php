<?php

namespace App\Http\Controllers\Resource;

use App\Models\Place;
use App\Models\Setting;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\InventoriesImport;
use PDF;
use Excel;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Inventory.index', [
            'inventories' => Inventory::latest()->filter(request(['search']))->get(),
            'places' => Place::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Inventory.create', [
            'places' => Place::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'place_id' => 'required',
            'description' => 'max:260',
            'quantity' => 'required|numeric',
            'unit' => 'required',
            'price' => 'required|numeric',
            'item_code' => 'required|numeric|digits:10',
            'nup_code' => 'required|numeric|digits_between:1,6',
            'penguasaan_item' => 'required',
            'tahun_perolehan' => 'required|numeric|digits:4',
        ]);
        $validatedData['nup_code'] = sprintf("%06s", $validatedData['nup_code']); 
        $validatedData['item_code'] = vsprintf('%s.%s%s.%s%s.%s%s.%s%s%s', str_split($validatedData['item_code']));
        $validatedData['qr_code'] = $validatedData['item_code'] . '.' . $validatedData['nup_code'] . '.' . $validatedData['tahun_perolehan'];
        Inventory::create($validatedData);

        return redirect('/inventory')->with('success', 'Berhasil disimpan!');
    }

    /**
     * Show the form for creating a new resource with file input.
     *
     * @return \Illuminate\Http\Response
     */
    public function importFile()
    {
        return view('Inventory.create-file');
    }

    /**
     * Import resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $validatedData = $request->validate([
			'file' => 'required|mimes:csv,xlsx'
		]);

        $file = $request->file('file');
        $date = date('d.m.y-H:i:s');
		// membuat nama file unik
		$fileName = $date . $file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('import-file', $fileName);

        Excel::import(new InventoriesImport, public_path("/import-file/".$fileName));

        return redirect('/inventory')->with('success', 'Berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        return view('Inventory.show', [
            'inventory' => $inventory,
            'setting' => Setting::first()
        ]);
    }

    /**
     * Print the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print(int $id)
    {
        $inventory = Inventory::where('id', $id)->first();
        $pdf = PDF::loadView('Inventory.print',[
            'inventory' => $inventory,
            'setting' => Setting::first()
        ]);
        $pdf->set_paper('A4', 'landscape');
    	return $pdf->download('Label QR' . ' ' . $inventory->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return view('Inventory.edit', [
            'inventory' => $inventory,
            'places' => Place::latest()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'place_id' => 'required',
            'description' => 'max:260',
            'quantity' => 'required|numeric',
            'unit' => 'required',
            'price' => 'required|numeric',
            'item_code' => 'required|size:14',
            'nup_code' => 'required|numeric|digits:6',
            'penguasaan_item' => 'required',
            'tahun_perolehan' => 'required|numeric|digits:4',
        ]);
        $validatedData['qr_code'] = $validatedData['item_code'] . '.' . $validatedData['nup_code'] . '.' . $validatedData['tahun_perolehan'];
        Inventory::where('id', $inventory->id)->update($validatedData);
    
        return redirect('/inventory')->with('warning', 'Berhasil diperbaharui, Mohon lakukan pencetakan label QR ulang!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        if(auth()->user()->is_admin) {
            Inventory::destroy($inventory->id);

            return redirect('/inventory')->with('success', 'Berhasil dihapus!');
        }
        else {
            return redirect('/')->with('failed', 'Akses Ditolak!');
        }
    }
}
