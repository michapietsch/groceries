<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = [];

    public function groceries()
    {
        return $this->belongsToMany(Grocery::class);
    }
}
