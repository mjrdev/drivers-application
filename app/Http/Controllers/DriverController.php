<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DriverRequestCreate;
use App\Http\Requests\DriverRequestUpdate;
use App\Repositories\DriverRepository;
use App\Models\Driver;
use App\Models\Car;
use App\Repositories\CarRepository;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    private DriverRepository $driverRepository;
    private CarRepository $CarRepository;

    public function __construct()
    {
        $this->CarRepository = new CarRepository();
        $this->driverRepository = new DriverRepository();
    }
    
    public function store(DriverRequestCreate $request)
    {
        $car = $this->CarRepository->create($request);
        $driver = $this->driverRepository->create($request, $car->id);

        $driver->car = $car;
        return $driver;
    }

    public function index()
    {
        return Driver::with('car')->get();
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
        $driver = $this->driverRepository->deleteById($id);
        $this->CarRepository->deleteById($driver->id);
        return;
    }

    public function search(string $content) {
        $resultSearchName = DB::select("select * from drivers where name like '%$content%'");
        $resultSearchDoc = DB::select("select * from drivers where cnh like '%$content%'");
        $resultSearchPlate = DB::select("select * from cars where plate like '%$content%'");

        $result = array_merge($resultSearchDoc, $resultSearchName, $resultSearchPlate);
        return $result;
    }
}
