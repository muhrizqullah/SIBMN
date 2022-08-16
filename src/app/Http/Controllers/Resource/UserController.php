<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->is_admin) {
            return view('User.index', [
                'users' => User::latest()->filter(request(['search']))->where('id', '!=', auth()->user()->id)->get()
            ]);
        }
        else {
            return redirect('/')->with('failed', 'Akses Ditolak!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(auth()->user()->is_admin) {
            return view('User.edit', [
                'user' => $user
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(auth()->user()->is_admin) {
            $validatedData = $request->validate([
                'is_admin' => 'required'
            ]);
            
            $user = User::findOrFail($user->id);
            $user->is_admin = $validatedData['is_admin'];
            $user->save();
    
            return redirect('/user')->with('success', 'Berhasil diperbaharui!');
        }
        else {
            return redirect('/')->with('failed', 'Akses Ditolak!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(auth()->user()->is_admin) {
            User::destroy($user->id);
    
            return redirect('/user')->with('success', 'Berhasil dihapus!');
        }
        else {
            return redirect('/')->with('failed', 'Akses Ditolak!');
        }
    }
}
