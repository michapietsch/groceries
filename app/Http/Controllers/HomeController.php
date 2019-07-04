<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroceriesInStorage;
use App\GroceryStorage;
use App\Grocery;
use App\Storage;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['missingInStorage' => GroceriesInStorage::needRefill()->groupBy('storage_id')]);
    }
}
