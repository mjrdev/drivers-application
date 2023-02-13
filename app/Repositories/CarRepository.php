<?php

namespace App\Repositories;

use App\Http\Requests\DriverRequestCreate;
use App\Http\Requests\DriverRequestUpdate;
use App\Models\Car;

class CarRepository
{
    public function create(DriverRequestCreate $request) {
        $car = new Car([
            'name' => $request->carName,
            'color' => $request->color,
            'year' => $request->year,
            'plate' => $request->plate
        ]);
        $car->save();
        return $car;
    }

    public function deleteById($id) {
        return Car::destroy($id);
    }
}
