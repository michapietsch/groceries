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
}
