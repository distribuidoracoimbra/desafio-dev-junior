@extends('layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Contrato</h1>
                    <a href="{{route('contrato.index')}}" class="btn btn-default float-right"><i class="fa fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                            <h3 class="card-title">EDITAR CONTRATO  - <strong>TIPO: {{$contrato->Objeto->nome}}</strong> STATUS: </h3> {!!\App\Models\Contrato\StatusContrato::status($contrato->fk_status)!!}
                    </div>
                    <form method="post" action="{{route('contrato.update')}}">
                        <input type="hidden" name="id" value="{{$contrato->id}}">
                        <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label> Contratante :</label>
                                            <select name="fk_contratante" class="form-control m-2">
                                                <option value="0">SELECIONE</option>
                                                @foreach($empresas as $empresa)
                                                    @if($empresa->id == $contrato->fk_contratante)
                                                        <option value="{{$empresa->id}}" selected="selected">{{$empresa->razao_social}}</option>
                                                    @else
                                                        <option value="{{$empresa->id}}">{{$empresa->razao_social}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label> Contratado </label>

                                            <select name="fk_contratado" class="form-control m-2">
                                                <option value="0">SELECIONE</option>
                                                @foreach($empresas as $empresa)
                                                    @if($empresa->id == $contrato->fk_contratado)
                                                        <option value="{{$empresa->id}}" selected="selected">{{$empresa->razao_social}}</option>
                                                    @else
                                                        <option value="{{$empresa->id}}" >{{$empresa->razao_social}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label> Tipo do contrato </label>
                                            <select name="fk_objeto" class="form-control m-2">
                                                <option value="0">SELECIONE</option>
                                                @foreach($objetos as $objeto)
                                                    @if($objeto->id == $contrato->fk_objeto)
                                                        <option value="{{$objeto->id}}" selected="selected">{{$objeto->nome}}</option>
                                                    @else
                                                        <option value="{{$objeto->id}}">{{$objeto->nome}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label> Status contrato </label>
                                            <select name="fk_status" class="form-control m-2">
                                                <option value="0">SELECIONE</option>
                                                @foreach($status as $status_contrato)
                                                    @if($status_contrato->id == $contrato->fk_status)
                                                        <option value="{{$status_contrato->id}}" selected="selected">{{$status_contrato->nome}}</option>
                                                    @else
                                                        <option value="{{$status_contrato->id}}">{{$status_contrato->nome}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <h4>Condições financeiras</h4>
                                        <hr>
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <label for="carencia">Carência</label>
                                        <input type="date" id="carencia" name="carencia" class="form-control" value="{{($contrato->carencia)}}">
                                    </div>
                                    <div class="col-md-3  mt-2">
                                        <label for="vigencia">Vigência</label>
                                        <input type="date" id="vigencia" name="vigencia" class="form-control" value="{{($contrato->vigencia)}}">
                                    </div>
                                    <div class="col-md-3  mt-2">
                                        <label for="prazo">Prazo</label>
                                        <input type="date" id="prazo" name="prazo" class="form-control" value="{{($contrato->prazo)}}">
                                    </div>
                                    <div class="col-md-3  mt-2">
                                        <label for="valor">Valor</label>
                                        <input type="text" id="valor" name="valor" class="form-control" value="{{$contrato->valor}}">
                                    </div>
                                </div>

                        </div>
                        <div class="card-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success float-right"><i class="fa fa-check"></i> Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
@section('scripts')
    <script>
        $('#valor').mask('#.##0,00', {reverse: true});
    </script>
@stop
