<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\Empresa;
use App\Models\Empresa\Endereco;
use App\Models\Flash;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(){
        $v['empresas'] = Empresa::all();

        return view('empresa.index',$v);
    }

    public function store(Request $request){
        try{
            $validator  = validator($request->all(), [
                'razao_social'=>'required',
                'cnpj'=>'required',
                'telefone'=>'required',
                'logradouro'=>'required',
                'bairro'=>'required',
                'numero'=>'required',
                'estado'=>'required',
                'cidade'=>'required'
            ]);
            if($validator->fails()){
                return response()->json(['error'=>'falta dados'],400);
            }

            \DB::beginTransaction();
                $endereco = new Endereco();
                $endereco->fill($request->all());
                $endereco->save();

                $empresa = new Empresa();
                $empresa->fill($request->all());
                $empresa->fk_endereco = $endereco->id;
                $empresa->save();
            \DB::commit();

            return response()->json($empresa,200);
        }catch (\Exception $e){
            \DB::rollBack();
            return response()->json($e->getMessage(),$e->getCode());
        }
    }

    public function show($id){
        try{
            $v['empresa'] = Empresa::find($id);

            return view('empresa.show',$v);
        }catch (\Exception $e){
            return $e;
        }
    }

    public function edit($id){
        try{
            $v['empresa'] = Empresa::find($id);

            return view('empresa.edit',$v);
        }catch (\Exception $e){
            return $e;
        }
    }

    public function update(Request $request){
        try{
            $validator  = validator($request->all(), [
                'id'=>'required',
                'razao_social'=>'required',
                'cnpj'=>'required',
                'telefone'=>'required',
                'cep'=>'required',
                'logradouro'=>'required',
                'numero'=>'required',
                'estado'=>'required',
                'cidade'=>'required'
            ]);
            if($validator->fails()){
                Flash::warning('Preencha todos os campos');
                return redirect()->back();
            }

            \DB::beginTransaction();
                $empresa = Empresa::find($request->input('id'));
                $empresa->fill($request->all());
                $empresa->cnpj =  preg_replace('/\D/', '', $request->input('cnpj'));
                $empresa->telefone =  preg_replace('/\D/', '', $request->input('telefone'));
                $empresa->save();

                $endereco = Endereco::find($empresa->fk_endereco);
                $endereco->fill($request->all());
                $endereco->cep =  preg_replace('/\D/', '', $request->input('cep'));
                $endereco->save();
            \DB::commit();

            Flash::success('Atualizado com sucesso');
            return redirect()->route('empresa.index');
        }catch (\Exception $e){
            \DB::rollBack();
            Flash::error('Ops! houve algum erro.');
            return redirect()->back();
        }
    }
}
