<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Grocery;

class RecipeController extends Controller
{
    public function index()
    {
        return view('recipes.index', ['recipes' => Recipe::all()]);
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        Recipe::create(['name' => $request->get('name')]);

        return redirect('/recipes');
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', ['recipe' => $recipe, 'groceriesNotYetInRecipe' => Grocery::notUsedFor($recipe)->all()]);
    }
}
