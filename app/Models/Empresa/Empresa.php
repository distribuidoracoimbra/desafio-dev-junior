<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $fillable =  ['razao_social','cnpj','telefone','fk_endereco'];

    public function Endereco(){
        return $this->belongsTo(Endereco::class,'fk_endereco');
    }
}
