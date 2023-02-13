<?php

namespace App\Repositories;

use App\Http\Requests\DriverRequestCreate;
use App\Http\Requests\DriverRequestUpdate;
use App\Models\Driver;
use App\Models\Car;
use App\Repositories\CarRepository;

class DriverRepository
{
    public function create(DriverRequestCreate $request, $carId) {
        $driver = new Driver([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'cnh' => $request->cnh,
            'car_id' => $carId,
            'active' => 1
        ]);
        $driver->save();

        return $driver;
    }

    public function findById(int $id) {
        $driver = Driver::with('car')->find($id);
        if(!$driver) {
            return response()->json([
                'error' => 'Motorista não encontrado'
            ], 404);
        }
        return $driver;
    }

    public function updateById(DriverRequestUpdate $request, int $id) {
        $driver = Driver::find($id);

        if(!$driver) {
            return response()->json([
                'error' => 'Motorista não encontrado'
            ], 404);
        }

        $driver->update([
            'name' => $request->name ? $request->name : $driver->name,
            'email' => $request->email ? $request->email : $driver->email,
            'password' => $request->password ? $request->password : $driver->password,
            'cnh' => $request->cnh ? $request->cnh : $driver->cnh
        ]);
        return;
    }

    public function deleteById($id) {
        $driver = Driver::find($id);
        if(!$driver) {
            return response()->json([
                'error' => 'Motorista não encontrado'
            ], 404);
        }
        $driver->delete();
        return $driver;
    }
}
