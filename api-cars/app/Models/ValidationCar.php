<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValidationCar extends Model
{

    const RULE_CAR = [
        'name' => 'required | max:80',
        'description' => 'required',
        'model' => 'required | max:10 | min:2',
        'date' => 'required | date_format: "Y-m-d"'
    ];

}
