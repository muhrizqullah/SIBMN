<?php

namespace App\Http\Controllers\Resource;

use App\Models\Place;
use App\Models\Setting;
use PDF;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Place.index', [
            'places' => Place::orderBy('id')->filter(request(['search']))->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->is_admin) {
            return view('Place.create');
        }
        else {
            return redirect('/')->with('failed', 'Akses Ditolak!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->is_admin) {
            $validatedData = $request->validate([
                'name' => 'required|unique:places',
                'code' => 'required|unique:places|digits_between:1,4',
                'description' => 'required|max:260',
                'person_in_charge' => 'required'
            ]);
            $validatedData['code'] = sprintf("%04s", $validatedData['code']); 
            Place::create($validatedData);
    
            return redirect('/place')->with('success', 'Berhasil disimpan!');
        }
        else {
            return redirect('/')->with('failed', 'Akses Ditolak!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
    	$pdf = PDF::loadView('Place.show',[
            'place' => $place,
            'inventories' => Inventory::where('place_id', $place->id)->get(),
            'setting' => Setting::first()
        ]);
        $pdf->set_paper('A4', 'landscape');
    	return $pdf->download('Daftar Barang Ruangan' . ' ' . $place->name);
    }

    /**
     * Print QR Label the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print(int $id)
    {
        $place = Place::where('id', $id)->first();
        $pdf = PDF::loadView('Place.print',[
            'inventories' => Inventory::where('place_id', $id)->get(),
            'setting' => Setting::first()
        ]);
        $pdf->set_paper('A4', 'potrait');
    	return $pdf->download('Label QR Lokasi' . ' ' . $place->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        if(auth()->user()->is_admin) {
            return view('Place.edit', [
                'place' => $place
            ]);
        }
        else {
            return redirect('/')->with('failed', 'Akses Ditolak!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        if(auth()->user()->is_admin) {
            $rules = [
                'description' => 'required',
                'person_in_charge'=> 'required'
            ];

            if($request->name != $place->name){
                $rules['name'] = 'required|unique:places';
            }
            else if($request->code != $place->code){
                $rules['code'] = 'required|unique:places|digits_between:1,4';
            }
    
    
            $validatedData = $request->validate($rules);
            
            Place::where('id', $place->id)->update($validatedData);
    
            return redirect('/place')->with('success', 'Berhasil diperbaharui!');
        }
        else {
            return redirect('/')->with('failed', 'Akses Ditolak!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        if(auth()->user()->is_admin) {
            Place::destroy($place->id);
    
            return redirect('/place')->with('success', 'Berhasil dihapus!');
        }
        else {
            return redirect('/')->with('failed', 'Akses Ditolak!');
        }
    }
}
