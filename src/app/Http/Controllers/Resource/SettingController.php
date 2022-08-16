<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Setting.index', [
            'settings' => Setting::first()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        if(auth()->user()->is_admin) {
            return view('Setting.edit', [
                'settings' => $setting
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        if(auth()->user()->is_admin) {
            $validatedData = $request->validate([
                'perwakilan' => 'required',
                'lokasi' => 'required',
                'kode_upb' => 'required',
                'kepala_perwakilan' => 'required'
            ]);
    
            Setting::where('id', $setting->id)->update($validatedData);
            return redirect('/setting')->with('success', 'Berhasil diperbaharui!');
        }
        else {
            return redirect('/')->with('failed', 'Akses Ditolak!');
        }
    }
}
