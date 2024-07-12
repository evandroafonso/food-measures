<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        'name',
        'active',
        'unit_measurement_id',
        'user_id',
    ];

    protected $hidden = [
        'unit_measurement_id',
    ];

    public function unitMeasurement()
    {
        return $this->belongsTo(UnitMeasurement::class);
    }

}
