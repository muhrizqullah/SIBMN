<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome', [
            'users_count' => User::all()->count(),
            'places_count' => Place::all()->count(),
            'inventories_count' => Inventory::all()->count(),
        ]);
    }

}
