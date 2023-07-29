<?php

namespace App\Repository;

use Illuminate\Http\Request;
interface CarRepositoryInterface
{
    public function readAll();
    public function read($id);
    public function create(Request $request);
    public function update($id, Request $request);
    public function delete($id);

}
