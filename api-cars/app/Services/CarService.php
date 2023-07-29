<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

use App\Models\ValidationCar;
use App\Repository\CarRepositoryInterface;

class CarService
{
    private $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function readAll()
    {
        $cars = $this->carRepository->readAll();

        try {
            if(count($cars) > 0)
            {
                return response()->json($cars, Response::HTTP_OK);
            }
            else
            {
                return response()->json($cars, Response::HTTP_OK);
            }
        }catch (QueryException $exception){
            return response()->json(['error' => 'Erro de conexão com o banco de dados!'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }


    }

    public function read($id)
    {
        $cars = $this->carRepository->read($id);

        if(count($cars) > 0)
        {
            return response()->json($cars, Response::HTTP_OK);
        }
        else
        {
            return response()->json(null, Response::HTTP_OK);
        }

    }

    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ValidationCar::RULE_CAR
        );

        if($validator->fails()){
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }
        else
        {
            $cars = $this->carRepository->create($request->all());

            return response()->json($cars, Response::HTTP_CREATED);
        }


    }

    public function update($id, Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            ValidationCar::RULE_CAR
        );

        if($validator->fails())
        {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }
        else
        {
            $cars = $this->carRepository->update($id, $request);

            return response()->json($cars, Response::HTTP_OK);
        }

    }

    public function delete($id)
    {
        $cars = $this->carRepository->delete($id);

        return response()->json(null, Response::HTTP_OK);
    }

}
