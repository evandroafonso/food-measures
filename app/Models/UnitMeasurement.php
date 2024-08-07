<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitMeasurement extends Model
{
    use HasFactory;

    protected $table = "unit_measurement";

    protected $fillable = [
        'name',
        'symbol',
        'equivalenceSI',
        'active',
        'user_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
