@extends('layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Empresa</h1>
                    <a href="{{route('empresa.index')}}" class="btn btn-default float-right"><i class="fa fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">EDITAR EMPRESA</h3>
                    </div>
                    <form method="post" id="updateEmpresa" action="{{route('empresa.update')}}">
                        <input type="hidden" name="id" value="{{$empresa->id}}">
                        <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 mt-2">
                                        <label for="razao_social">Razão social</label>
                                        <input type="text" id="razao_social" name="razao_social" class="form-control" value="{{$empresa->razao_social}}">
                                    </div>
                                    <div class="col-md-4  mt-2">
                                        <label for="cnpj">CNPJ</label>
                                        <input type="text" id="cnpj" name="cnpj" class="form-control" value="{{$empresa->cnpj}}">
                                    </div>
                                    <div class="col-md-4  mt-2">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" id="telefone" name="telefone" class="form-control" value="{{$empresa->telefone}}">
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="cep">CEP</label>
                                        <input type="text" id="cep" name="cep" class="form-control" value="{{$empresa->Endereco->cep}}">
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="logradouro">Logradouro</label>
                                        <input type="text" id="logradouro" name="logradouro" class="form-control" value="{{$empresa->Endereco->logradouro}}">
                                    </div>
                                    <div class="col-md-4  mt-2">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" id="bairro" name="bairro" class="form-control" value="{{$empresa->Endereco->bairro}}">
                                    </div>

                                    <div class="col-md-4  mt-2">
                                        <label for="estado">Estado</label>
                                        <input type="text" id="estado" name="estado" class="form-control" value="{{$empresa->Endereco->estado}}">
                                    </div>
                                    <div class="col-md-4  mt-2">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" id="cidade" name="cidade" class="form-control" value="{{$empresa->Endereco->cidade}}">
                                    </div>
                                    <div class="col-md-4  mt-2">
                                        <label for="numero">Número</label>
                                        <input type="text" id="numero" name="numero" class="form-control" value="{{$empresa->Endereco->numero}}">
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
        $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('#telefone').mask('(00) 00000-0000');
        $('#cep').mask('00000-000');

        $('#updateEmpresa').on('submit',function(event){
            event.preventDefault();
            $('#cnpj').val().replace(/[^A-Z0-9]+/ig, "")
            $('#telefone').val().replace(/[^A-Z0-9]+/ig, "")
            $('#cep').val().replace(/[^A-Z0-9]+/ig, "")
            document.querySelector('#updateEmpresa').submit();
        })
    </script>
@stop
