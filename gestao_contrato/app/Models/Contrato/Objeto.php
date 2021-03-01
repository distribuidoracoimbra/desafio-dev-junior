<?php

namespace App\Models\Contrato;

use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    protected $table = 'objeto';
    protected $fillable = ['nome'];
}
