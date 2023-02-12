<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DriverRequestCreate;
use App\Http\Requests\DriverRequestUpdate;
use App\Repositories\DriverRepository;
use App\Models\Driver;


class DriverController extends Controller
{

    private DriverRepository $driverRepository;
    public function __construct()
    {
        $this->driverRepository = new DriverRepository();
    }
    
    public function store(DriverRequestCreate $request)
    {
        return $this->driverRepository->create($request);
    }

    public function index()
    {
        return Driver::all();
    }

    public function show(int $id)
    {
       return $this->driverRepository->findById($id);
    }

    public function update(DriverRequestUpdate $request, $id)
    {
        return $this->driverRepository->updateById($request, $id);
    }

    public function destroy(int $id)
    {
        return $this->driverRepository->deleteById($id);
    }
}
