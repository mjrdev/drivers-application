<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'password', 'cnh', 'car_id', 'active'
    ];
    protected $hidden = ['password'];

    public function car()
    {
        return $this->hasOne(Car::class, 'id', 'car_id');
    }
}
