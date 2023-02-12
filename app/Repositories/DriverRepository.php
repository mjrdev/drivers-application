<?php

namespace App\Repositories;

use App\Http\Requests\DriverRequestCreate;
use App\Http\Requests\DriverRequestUpdate;
use App\Models\Driver;

class DriverRepository
{
    public function create(DriverRequestCreate $request) {
        $driver = new Driver([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'cnh' => $request->cnh
        ]);
        $driver->save();

        return $driver;
    }

    public function findById(int $id) {
        $driver = Driver::find($id);
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
        return;
    }
}
