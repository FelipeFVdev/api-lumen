<?php

namespace App\Repository;

use App\Repository\CarRepositoryInterface;
use Illuminate\Http\Request;

class CarRepositoryEloquent implements CarRepositoryInterface
{
    private $model;

    public function __construct(Cars $cars)
    {
        $this->model = $cars;
    }

    public function readAll()
    {
        // TODO: Implement readAll() method.
        return $this->model->all();
    }

    public function read($id)
    {
        // TODO: Implement read() method.
        return $this->model->find($id);
    }

    public function create(Request $request)
    {
        // TODO: Implement create() method.
        return $this->model->create($request->all());
    }

    public function update($id, Request $request)
    {
        // TODO: Implement update() method.
        return $this->model->find($id->update($request->all()));
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        return $this->model->find($id)->delete();
    }

}
