<?php

namespace App\Models;

use App\Models\Place;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'brand',
        'place_id',
        'description',
        'quantity',
        'unit',
        'price',
        'item_code',
        'nup_code',
        'qr_code',
        'penguasaan_item',
        'tahun_perolehan',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('place_id', 'LIKE', '%' . $search . '%');
        });
    }

    public function Place()
    {
        return $this->belongsTo(Place::class);
    }
}
