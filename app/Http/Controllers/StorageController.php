<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storage;
use App\Grocery;

class StorageController extends Controller
{
    public function index()
    {
        return view('storages.index', ['storages' => Storage::all()]);
    }

    public function show(Storage $storage)
    {
        return view('storages.show', ['storage' => $storage, 'groceriesNotYetInStorage' => Grocery::notIn($storage)->all()]);
    }
}
