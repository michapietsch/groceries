<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storage;
use App\Recipe;

class RecipeGroceriesController extends Controller
{
    public function store(Request $request, Recipe $recipe)
    {
        $recipe->groceries()->attach([$request->get('grocery_id')]);
        $recipe->save();

        return redirect(route('recipe.show', ['recipe' => $recipe]));
    }
}
