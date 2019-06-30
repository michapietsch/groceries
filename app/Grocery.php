<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grocery extends Model
{
    protected $guarded = [];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }

    public function storages()
    {
        return $this->belongsToMany(Storage::class);
    }

    public function scopeNotIn($query, Storage $storage)
    {
        return $query->whereDoesntHave('storages', function ($query) use ($storage) {
            $query->where('storage_id', $storage->id);
        })->get();
    }

    public function scopeNotUsedFor($query, Recipe $recipe)
    {
        return $query->whereDoesntHave('recipes', function ($query) use ($recipe) {
            $query->where('recipe_id', $recipe->id);
        })->get();
    }
}
