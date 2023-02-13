<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Driver;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'color', 'year', 'plate', 'driver_id'];

    public function driver()
    {
        return $this->hasOne(Driver::class, 'id', 'driver_id');
    }
}
