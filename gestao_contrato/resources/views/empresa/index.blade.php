@extends('layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Empresas</h1>
                    <a href="#" name="novaEmpresa" class="btn btn-success float-right"><i class="fa fa-star"></i> Nova empresa</a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>Número empresa</th>
                                <th>CNPJ</th>
                                <th>Razão social</th>
                                <th>Telefone</th>
                                <th>CEP</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($empresas as $empresa)
                                    <tr>
                                        <td>{{$empresa->id}}</td>
                                        <td>{{$empresa->cnpj}}</td>
                                        <td>{{$empresa->razao_social}}</td>
                                        <td>{{$empresa->telefone}}</td>
                                        <td>{{$empresa->Endereco->cep}}</td>
                                        <td>
                                            <a href="{{route('empresa.show',$empresa->id)}}" class="btn btn-default"><i class="fa fa-eye">Detalhe</i></a>
                                            <a href="{{route('empresa.edit',$empresa->id)}}" class="btn btn-primary"><i class="fa fa-edit">Editar</i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="center">
                                            NÃO ENCONTRADO
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
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
        $('a[name=novaEmpresa]').click(function(){
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
                        Swal.fire({
                            title: 'Sucesso',
                            text: 'Cadastrado com sucesso.',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })
                        limpa_formulario()
                        $('#sair').click()
                        document.location.reload();
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
