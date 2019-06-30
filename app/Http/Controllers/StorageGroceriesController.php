<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storage;
use App\Grocery;

class StorageGroceriesController extends Controller
{
    public function store(Request $request, Storage $storage)
    {
        $storage->groceries()->attach([$request->get('grocery_id')]);
        $storage->save();

        return redirect(route('storage.show', ['storage' => $storage]));
    }

    public function update(Request $request, Storage $storage, Grocery $grocery)
    {
        $storage->groceries()->updateExistingPivot($grocery->id, [
            'quantity_in_stock' => $request->get('quantity_in_stock'),
            'quantity_required' => $request->get('quantity_required'),
        ]);

        return redirect(route('storage.show', ['storage' => $storage]));
    }
}
