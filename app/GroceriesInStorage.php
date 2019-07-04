<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GroceriesInStorage extends Pivot
{
    protected $table = 'grocery_storage';

    public function grocery()
    {
        return $this->belongsTo(Grocery::class);
    }

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

    public function scopeNeedRefill($query)
    {
        return $query->whereRaw('quantity_required > quantity_in_stock')
            ->with('grocery', 'storage')
            ->get();
    }
}
