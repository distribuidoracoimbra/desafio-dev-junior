@extends('layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Empresa</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Novo</h3>

                    </div>
                    <form action="{{route('contrato.store')}}" method="post">
                    <div class="card-body">
                            <div class="row">
                            @csrf
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label> Contratante </label>
                                        <a href="#" name="contratante" type="button" class="btn btn-primary white">Novo contratante</a>
                                        <select id="fk_contratante" name="fk_contratante" class="form-control m-2">
                                            <option value="0">SELECIONE</option>
                                            @foreach($empresas as $empresa)
                                                <option value="{{$empresa->id}}">{{$empresa->razao_social}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label> Contratado </label>
                                        <a href="#" name="contratante" type="button" class="btn btn-primary white">Novo contratado</a>
                                        <select id="fk_contratado" name="fk_contratado" class="form-control m-2">
                                            <option value="0">SELECIONE</option>
                                            @foreach($empresas as $empresa)
                                                <option value="{{$empresa->id}}">{{$empresa->razao_social}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label> Tipo do contrato </label>
                                        <select name="fk_objeto" class="form-control m-2">
                                            <option value="0">SELECIONE</option>
                                            @foreach($objetos as $objeto)
                                                <option value="{{$objeto->id}}">{{$objeto->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Carência</label>
                                        <input name="carencia" type="date" class="form-control" id="carencia" placeholder="carência">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vigência</label>
                                        <input name="vigencia" type="date" class="form-control" id="vigencia" placeholder="vigência">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">

                                        <label for="exampleInputEmail1">Prazo</label>
                                        <input name="prazo" type="date" class="form-control" id="prazo" placeholder="valor">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Valor</label>
                                        <input name="valor" type="text" class="form-control " id="valor" placeholder="valor">
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="card-footer">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success float-right"><i class="fa fa-check"></i>  Salvar</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@include('modals.createEmpresa')
@stop
@section('scripts')
    <script>
        $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('#telefone').mask('(00) 00000-0000');
        $('#valor').mask('#.##0,00', {reverse: true});
        $('a[name=contratante]').click(function(){
            $("#myModalEmpresa").modal({backdrop: "static"});
        });

        $('form[id=createEmpresa]').on('submit',async function (event){
            event.preventDefault();
            if(
                $('#cnpj').val() !== "" &&
                $('#razao_social').val() !== "" &&
                $('#telefone').val() !== "" &&
                $('#cep').val() !== "" &&
                $('#logradouro').val() !== "" &&
                $('#bairro').val() !== "" &&
                $('#estado').val() !== "" &&
                $('#cidade').val() !== "" &&
                $('#numero').val() !== ""
            ){
                let form = new FormData();

                form.append('cnpj',$('#cnpj').val().replace(/[^A-Z0-9]+/ig, ""))
                form.append('razao_social',$('#razao_social').val())
                form.append('telefone',$('#telefone').val().replace(/[^A-Z0-9]+/ig, ""))
                form.append('cep',$('#cep').val())
                form.append('logradouro',$('#logradouro').val())
                form.append('bairro',$('#bairro').val())
                form.append('estado',$('#estado').val())
                form.append('cidade',$('#cidade').val())
                form.append('numero',$('#numero').val())

                fetch("/api/empresa/store", {
                    method: "POST",
                    body: form
                }).then(async (response)=>{
                    let status = response.status;
                    if(status === 500 || status === 400 || status === 402 ){
                        throw Exception('error');
                    }

                    let dados = await response.json();
                    console.log(dados);
                    if(dados.razao_social && dados.id){
                        $('#fk_contratante').append(`<option value="${dados.id}">${dados.razao_social}</option>`)
                        $('#fk_contratado').append(`<option value="${dados.id}">${dados.razao_social}</option>`)

                        limpa_formulario()
                        $('#sair').click()
                    }
                }).catch((err)=>{
                    Swal.fire({
                        title: 'Error!',
                        text: 'Ops! Houve algum erro ao cadastrar.',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                });
            }else{
                Swal.fire({
                    title: 'Error!',
                    text: 'Preencha todo o formulário',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }
        })

        function limpa_formulario() {
            $("#cnpj").val("");
            $("#razao_social").val("");
            $("#telefone").val("");
            $("#cep").val("");
            $("#logradouro").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#estado").val("");
            $("#numero").val("");
        }

        $(document).ready(function() {
            function limpa_formulario_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#estado").val("");
            }
            $("#cep").change(function() {
                var cep = $(this).val().replace(/\D/g, '');
                if (cep != "") {
                    var validacep = /^[0-9]{8}$/;
                    if(validacep.test(cep)) {
                        $("#logradouro").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#estado").val("...");
                        $("#numero").val("");

                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                            if (!("erro" in dados)) {
                                $("#logradouro").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                                $("input[name=numero]").focus();
                            }
                            else {
                                limpa_formulario_cep();
                                return false;
                            }
                        });
                    }
                    else {
                        limpa_formulario_cep();

                        return false;
                    }
                }
                else {
                    limpa_formulario_cep();
                }
            });
        })
    </script>
@stop
