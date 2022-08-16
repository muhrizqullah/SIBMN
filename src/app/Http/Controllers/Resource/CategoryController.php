<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Category.index', [
            'categories' => Category::latest()->filter(request(['search']))->get(),
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
            return view('Category.create');
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
                'name' => 'required|unique:categories',
                'code' => 'required|unique:categories|digits:10'
            ]);
            $pattern='%.%%.%%.%%.%%%';
            $validatedData['code'] = vsprintf(str_replace('%', '%s', $pattern), str_split($validatedData['code']));
            Category::create($validatedData);
    
            return redirect('/category')->with('success', 'Berhasil disimpan!');
        }
        else {
            return redirect('/')->with('failed', 'Akses Ditolak!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if(auth()->user()->is_admin) {
            return view('Category.edit', [
                'category' => $category
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
     * @param  \App\Models\Category     $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if(auth()->user()->is_admin) {
            if($request->name != $category->name){
                $rules['name'] = 'required|unique:categories';
            }
    
            else if($request->code != $category->code){
                $rules['code'] = 'required|unique:categories';
            }
    
            $validatedData = $request->validate($rules);
    
            Category::where('id', $category->id)->update($validatedData);
    
            return redirect('/category')->with('success', 'Berhasil diperbaharui!');
        }
        else {
            return redirect('/')->with('failed', 'Akses Ditolak!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(auth()->user()->is_admin) {
            Category::destroy($category->id);

            return redirect('/category')->with('success', 'Berhasil dihapus!');
        }
        else {
            return redirect('/')->with('failed', 'Akses Ditolak!');
        }
    }
}
