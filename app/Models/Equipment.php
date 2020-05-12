<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'equipment_category_id',
        'active'
    ];

    public function equipment_category()
    {
        return $this->belongsTo(EquipmentCategory::class);
    }
}
