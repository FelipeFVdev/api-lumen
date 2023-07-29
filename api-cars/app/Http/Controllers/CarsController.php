<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    private $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function readAll()
    {
        return $this->carService->readAll();
    }

    public function read($id)
    {
        return $this->carService->read($id);
    }

    public function create(Request $request)
    {
        return $this->carService->create($request);
    }

    public function update($id, Request $request)
    {
        return $this->carService->update($id, $request);
    }

    public function delete($id)
    {
        return $this->carService->delete($id);
    }

}
