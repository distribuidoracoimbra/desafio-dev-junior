<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'endereco';
    protected $fillable = ['cep','logradouro','bairro','numero','estado','cidade'];

}
