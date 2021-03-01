<?php

namespace App\Http\Controllers\Contrato;

use App\Http\Controllers\Controller;
use App\Models\Contrato\Contrato;
use App\Models\Contrato\Objeto;
use App\Models\Contrato\StatusContrato;
use App\Models\Empresa\Empresa;
use Illuminate\Http\Request;
use DB;

class ContratoController extends Controller
{
    public function index(Request $request){
        try {
            $v['contratados'] = Empresa::join('contrato as c','c.fk_contratado','empresa.id')
                ->select('empresa.*')->groupBy('empresa.id')->get();
            $v['status'] = StatusContrato::all();
            $v['objetos'] = Objeto::all();
            if($request->has('fk_contratado') or $request->has('fk_objeto') or $request->has('fk_status')){
                $contratado = $request->input('fk_contratado');
                $objeto = $request->input('fk_objeto');
                $status = $request->input('fk_status');
                $dataInicio = $request->has('data_range') ? dataFormatMysql(explode(' - ', $request->input('data_range'))[0]) : null;
                $dataFim = $request->has('data_range') ?  dataFormatMysql(explode(' - ', $request->input('data_range'))[1]) : null;

                $v['contratos'] = $this->filtraContrato($contratado,$objeto,$status,$dataInicio,$dataFim);
            }else{
                $v['contratos'] = Contrato::with(['Contratado','Contratante','Objeto','Status'])->get();
            }

            return view('contrato.index',$v);
        }catch (\Exception $e){
            return $e;
        }
    }

    public function filtraContrato($contratado,$objeto,$status,$dataInicio = null,$dataFim = null){
        $contrato = Contrato::with(['Contratado','Contratante','Objeto','Status']);

        if($dataInicio and $dataFim){
            $contrato = $contrato
                ->where(function($query) use($dataInicio,$dataFim){
                    $query->whereBetween('vigencia',[$dataInicio,$dataFim])
                        ->orWhereBetween('created_at',[$dataInicio,$dataFim]);
                });
        }

        if($contratado != 0){
            $contrato = $contrato->where('fk_contratado',$contratado);
        }

        if($objeto != 0){
            $contrato = $contrato->where('fk_objeto',$objeto);
        }

        if($status != 0){
            $contrato = $contrato->where('fk_status',$status);
        }

        return $contrato->get();
    }

    public function show($id){
        $v['contrato'] = Contrato::where('id',$id)->with(['Contratado','Contratante','Objeto','Status'])->first();
        return view('contrato.show',$v);
    }

    public function create(){
        try{
            $v['empresas'] = Empresa::all();
            $v['objetos'] = Objeto::all();


            return view('contrato.create',$v);
        }catch (\Exception $e){
            return $e;
        }
    }

    public function store(Request $request){
        try{
            $validator  = validator($request->all(), [
                'fk_contratante'=>'required',
                'fk_contratado'=>'required',
                'carencia'=>'required',
                'vigencia'=>'required',
                'valor'=>'required',
                'prazo'=>'required',
                'fk_objeto'=>'required'
            ]);
            if($validator->fails()){
                return redirect()->back();
            }
            if($request->input('fk_contratante') == 0){
                return redirect()->back();
            }

            if($request->input('fk_contratado') == 0){
                return redirect()->back();
            }
            if($request->input('fk_objeto') == 0) {
                return redirect()->back();
            }


            \DB::beginTransaction();
            $contrato = new Contrato();
                $contrato->fill($request->all());
                $contrato->fk_status = 1;
                $contrato->valor =  preg_replace('/\D/', '', $request->input('valor'));
                $contrato->save();
            \DB::commit();

            return redirect()->route('contrato.index');
        }catch (\Exception $e){
            \DB::rollBack();
            return $e;
        }
    }

    public function edit($id){
        try{
            $v['contrato'] = Contrato::find($id);
            $v['empresas'] = Empresa::all();
            $v['objetos'] = Objeto::all();
            $v['status'] = StatusContrato::all();

            return view('contrato.edit',$v);
        }catch (\Exception $e){
            return $e;
        }
    }

    public function update(Request $request){
        try{
            $validator  = validator($request->all(), [
                'id'=>'required',
                'fk_contratante'=>'required',
                'fk_contratado'=>'required',
                'carencia'=>'required',
                'vigencia'=>'required',
                'valor'=>'required',
                'prazo'=>'required',
                'fk_objeto'=>'required',
                'fk_status'=>'required'
            ]);
            if($validator->fails()){
                return redirect()->back();
            }
            if($request->input('fk_contratante') == 0){
                return redirect()->back();
            }

            if($request->input('fk_contratado') == 0){
                return redirect()->back();
            }
            if($request->input('fk_objeto') == 0) {
                return redirect()->back();
            }
            if($request->input('fk_status') == 0){
                return redirect()->back();
            }

            \DB::beginTransaction();
                $contrato = Contrato::find($request->input('id'));
                $contrato->fill($request->all());
                $contrato->valor =  preg_replace('/\D/', '', $request->input('valor'));
                $contrato->save();
            \DB::commit();

            return redirect()->route('contrato.index');
        }catch (\Exception $e){
            \DB::rollBack();
            return $e;
        }
    }

    public function delete($id){
        try{
            \DB::beginTransaction();
                $contrato = Contrato::destroy($id);
            \DB::commit();

            return redirect()->back();
        }catch (\Exception $e){
            \DB::rollBack();
            return $e;
        }
    }
}

