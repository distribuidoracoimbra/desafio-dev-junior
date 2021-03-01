<?php

namespace App\Models\Contrato;

use Illuminate\Database\Eloquent\Model;

class StatusContrato extends Model
{
    protected $table = 'status_contrato';
    protected $fillable = ['nome'];

    public static function status($idStatus){
        if($idStatus == 1){
            return '<span class="badge bg-primary">Em edição</span>';
        }elseif ($idStatus == 2){
            return '<span class="badge bg-success">Ativo</span>';
        }elseif ($idStatus == 3){
            return '<span class="badge bg-danger">Cancelado</span>';
        }else{
            return '<span class="badge bg-dark">Sem status válido</span>';
        }
    }
}

