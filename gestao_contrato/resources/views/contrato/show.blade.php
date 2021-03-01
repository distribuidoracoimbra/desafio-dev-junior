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
                            <h3 class="card-title">DETALHE CONTRATO  - <strong>TIPO: {{$contrato->Objeto->nome}}</strong> STATUS: </h3> {!!\App\Models\Contrato\StatusContrato::status($contrato->fk_status)!!}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{--contratante--}}
                            <div class="col-md-12">
                                <h4>Contratante</h4>
                                <hr>
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="razao_social_contratante">Razão social</label>
                                <input type="text" id="razao_social_contratante" name="fk_contratante" class="form-control" disabled value="{{$contrato->Contratante->razao_social}}" >
                            </div>
                            <div class="col-md-4  mt-2">
                                <label for="cnpj_contratante">CNPJ</label>
                                <input type="text" id="cnpj_contratante" name="cnpj_contratante" class="form-control" disabled value="{{$contrato->Contratante->cnpj}}">
                            </div>
                            <div class="col-md-4  mt-2">
                                <label for="telefone_contratante">Telefone</label>
                                <input type="text" id="telefone_contratante" name="telefone_contratante" class="form-control" disabled value="{{$contrato->Contratante->telefone}}">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="cep_contratante">CEP</label>
                                <input type="text" id="cep_contratante" name="cep_contratante" class="form-control" disabled value="{{$contrato->Contratante->Endereco->cep}}">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="logradouro_contratante">Logradouro</label>
                                <input type="text" id="logradouro_contratante" name="logradouro_contratante" class="form-control" disabled value="{{$contrato->Contratante->Endereco->logradouro}}">
                            </div>
                            <div class="col-md-4  mt-2">
                                <label for="bairro_contratante">Bairro</label>
                                <input type="text" id="bairro_contratante" name="bairro_contratante" class="form-control" disabled value="{{$contrato->Contratante->Endereco->bairro}}">
                            </div>
                            <div class="col-md-4  mt-2">
                                <label for="numero_contratante">Número</label>
                                <input type="text" id="numero_contratante" name="numero_contratante" class="form-control" disabled value="{{$contrato->Contratante->Endereco->numero}}">
                            </div>
                            <div class="col-md-4  mt-2">
                                <label for="estado_contratante">Estado</label>
                                <input type="text" id="estado_contratante" name="estado_contratante" class="form-control" disabled value="{{$contrato->Contratante->Endereco->estado}}">
                            </div>
                            <div class="col-md-4  mt-2">
                                <label for="cidade_contratante">Cidade</label>
                                <input type="text" id="cidade_contratante" name="cidade_contratante" class="form-control" disabled value="{{$contrato->Contratante->Endereco->cidade}}">
                            </div>
                            {{--fim contratante--}}


                            {{--contratado--}}
                            <div class="col-md-12 mt-4">
                                <h4>Contratado</h4>
                                <hr>
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="razao_social_contratado">Razão social</label>
                                <input type="text" id="razao_social_contratado" name="fk_contratado" class="form-control" disabled value="{{$contrato->Contratado->razao_social}}">
                            </div>
                            <div class="col-md-4  mt-2">
                                <label for="cnpj_contratado">CNPJ</label>
                                <input type="text" id="cnpj_contratado" name="cnpj_contratado" class="form-control" disabled value="{{$contrato->Contratado->cnpj}}">
                            </div>
                            <div class="col-md-4  mt-2">
                                <label for="telefone_contratado">Telefone</label>
                                <input type="text" id="telefone_contratado" name="telefone_contratado" class="form-control" disabled value="{{$contrato->Contratado->telefone}}">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="cep_contratado">CEP</label>
                                <input type="text" id="cep_contratado" name="cep_contratado" class="form-control" disabled value="{{$contrato->Contratado->Endereco->cep}}">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label for="logradouro_contratado">Logradouro</label>
                                <input type="text" id="logradouro_contratado" name="logradouro_contratado" class="form-control" disabled value="{{$contrato->Contratado->Endereco->logradouro}}">
                            </div>
                            <div class="col-md-4  mt-2">
                                <label for="bairro_contratado">Bairro</label>
                                <input type="text" id="bairro_contratado" name="bairro_contratado" class="form-control" disabled value="{{$contrato->Contratado->Endereco->bairro}}">
                            </div>
                            <div class="col-md-4  mt-2">
                                <label for="numero_contratado">Número</label>
                                <input type="text" id="numero_contratado" name="numero_contratado" class="form-control" disabled value="{{$contrato->Contratado->Endereco->numero}}">
                            </div>
                            <div class="col-md-4  mt-2">
                                <label for="estado_contratado">Estado</label>
                                <input type="text" id="estado_contratado" name="estado_contratado" class="form-control" disabled value="{{$contrato->Contratado->Endereco->estado}}">
                            </div>
                            <div class="col-md-4  mt-2">
                                <label for="cidade_contratado">Cidade</label>
                                <input type="text" id="cidade_contratado" name="cidade_contratado" class="form-control" disabled value="{{$contrato->Contratado->Endereco->cidade}}">
                            </div>
                            {{--fim contratado--}}

                            <div class="col-md-12 mt-4">
                                <h4>Condições financeiras</h4>
                                <hr>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label for="carencia">Carência</label>
                                <input type="text" id="carencia" name="carencia" class="form-control" disabled value="{{dataFormat($contrato->carencia)}}">
                            </div>
                            <div class="col-md-3  mt-2">
                                <label for="vigencia">Vigência</label>
                                <input type="text" id="vigencia" name="vigencia" class="form-control" disabled value="{{dataFormat($contrato->vigencia)}}">
                            </div>
                            <div class="col-md-3  mt-2">
                                <label for="prazo">Prazo</label>
                                <input type="text" id="prazo" name="prazo" class="form-control" disabled value="{{dataFormat($contrato->prazo)}}">
                            </div>
                            <div class="col-md-3  mt-2">
                                <label for="valor">Valor</label>
                                <input type="text" id="valor" name="valor" class="form-control" disabled value="{{$contrato->valor}}">
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">

                    </div>

                </div>
            </div>
        </div>
    </section>
@stop
@section('scripts')
    <script>
        $('#cnpj_contratante').mask('00.000.000/0000-00', {reverse: true});
        $('#cnpj_contratado').mask('00.000.000/0000-00', {reverse: true});
        $('#telefone_contratado').mask('(00) 00000-0000');
        $('#telefone_contratante').mask('(00) 00000-0000');
        $('#valor').mask('#.##0,00', {reverse: true});
    </script>
@stop
