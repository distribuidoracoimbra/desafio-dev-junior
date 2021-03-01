<?php

namespace App\Http\Controllers;

use App\Models\Contrato\Contrato;
use App\Models\Empresa\Empresa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $v['contratos'] = Contrato::count();
        $v['empresas'] = Empresa::count();
        $v['contratosEmEdicao'] = Contrato::where('fk_status',1)->count();
        $v['contratosAtivo'] = Contrato::where('fk_status',2)->count();
        $v['contratosCancelado'] = Contrato::where('fk_status',3)->count();

        return view('home',$v);
    }
}
