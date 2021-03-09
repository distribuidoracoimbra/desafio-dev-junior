<?php

namespace App\Models\Contrato;

use App\Models\Empresa\Empresa;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contrato';
    protected $fillable = [
        'fk_contratante',
        'fk_contratado',
        'carencia',
        'vigencia',
        'valor',
        'prazo',
        'fk_status',
        'fk_objeto'
    ];

    public function Contratante(){
        return $this->belongsTo(Empresa::class,'fk_contratante');
    }

    public function Contratado(){
        return $this->belongsTo(Empresa::class,'fk_contratado');
    }

    public function Status(){
        return $this->belongsTo(StatusContrato::class,'fk_status');
    }

    public function Objeto(){
        return $this->belongsTo(Objeto::class,'fk_objeto');
    }

}
