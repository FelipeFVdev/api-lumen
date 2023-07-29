<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $table = 'cars';

    /*
     * Está função não permite sql injection,
     * determina os campos que serão inseridos no banco
     * */
    protected $fillable = [
        'name',
        'email',
        'model',
        'date'
    ];


    /*
     * Timestamp é um padrão em API
     * */
    protected $casts = [
        'date' => 'Timestamp'
    ];

    /*
     * timestamp cria uma coluna de historico
     * migration faz um controle de versão na base de dados
     * */
    public $timestamps = false;
    //create_at
    //update_at
    //deleted_at

}
