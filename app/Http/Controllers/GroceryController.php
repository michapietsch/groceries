<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grocery;

class GroceryController extends Controller
{
    public function index()
    {
        return view('groceries.index', ['groceries' => Grocery::all()]);
    }

    public function create()
    {
        return view('groceries.create');
    }

    public function store(Request $request)
    {
        Grocery::create(['name' => $request->get('name')]);

        return redirect('/groceries');
    }
}
