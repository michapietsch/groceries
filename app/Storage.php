<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    public function groceries()
    {
        return $this->belongsToMany(Grocery::class)->withPivot('quantity_in_stock', 'quantity_required');
    }
}
