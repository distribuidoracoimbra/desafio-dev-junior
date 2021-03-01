@extends('layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Contratos</h1>
                    <a href="{{route('contrato.create')}}" class="btn btn-success float-right"><i class="fa fa-star"></i> Novo contrato</a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Filtros</h3>
                    </div>
                    <form action="{{route('contrato.index')}}">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label> Contratado :</label>
                                    <select name="fk_contratado" id="fk_contratado" class="form-control m-2">
                                        <option value="0">SELECIONE</option>
                                        @if(Request::get('fk_contratado'))
                                            @foreach($contratados as $contratado)
                                                @if($contratado->id ==Request::get('fk_contratado'))
                                                    <option value="{{$contratado->id}}" selected>{{$contratado->razao_social}}</option>
                                                @else
                                                    <option value="{{$contratado->id}}">{{$contratado->razao_social}}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($contratados as $contratado)
                                                <option value="{{$contratado->id}}">{{$contratado->razao_social}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <input type="checkbox" id="filtrarData"> <label for="filtrarData" data-toggle="tooltip" data-placement="right" title="data de inserção e por virgência"> Filtrar data cadastro ou vigência</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                          </span>
                                        </div>
                                        <input name="data_range" type="text" class="form-control float-right" id="reservation" disabled>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="fk_status">Status</label>
                                    <select name="fk_status" id="fk_status" class="form-control">
                                        <option value="0">SELECIONE</option>
                                        @if(Request::get('fk_status'))
                                            @foreach($status as $status_contrato)
                                                 @if($status_contrato->id == Request::get('fk_status'))
                                                     <option value="{{$status_contrato->id}}" selected="selected">{{$status_contrato->nome}}</option>
                                                 @else
                                                    <option value="{{$status_contrato->id}}">{{$status_contrato->nome}}</option>
                                                 @endif
                                            @endforeach
                                        @else
                                            @foreach($status as $status_contrato)
                                                <option value="{{$status_contrato->id}}">{{$status_contrato->nome}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="fk_objeto">Tipo contrato</label>
                                    <select name="fk_objeto" id="fk_objeto" class="form-control">
                                        <option value="0">SELECIONE</option>
                                        @if(Request::get('fk_objeto'))
                                            @foreach($objetos as $objeto)
                                                @if($objeto->id == Request::get('fk_objeto'))
                                                    <option value="{{$objeto->id}}" selected="selected">{{$objeto->nome}}</option>
                                                @else
                                                    <option value="{{$objeto->id}}">{{$objeto->nome}}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($objetos as $objeto)
                                                <option value="{{$objeto->id}}">{{$objeto->nome}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary float-right"><i class="fa fa-search"></i>  FILTRAR</button>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>Tipo contrato</th>
                                <th>Contratante</th>
                                <th>Contratado</th>
                                <th>Carência</th>
                                <th>Vigência</th>
                                <th>Prazo</th>
                                <th>Criado</th>
                                <th>Status</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($contratos as $contrato)
                                    <tr>
                                        <td>{{$contrato->Objeto->nome}}</td>
                                        <td>{{$contrato->contratante->razao_social}}</td>
                                        <td>{{$contrato->contratado->razao_social}}</td>
                                        <td>{{dataFormat($contrato->carencia)}}</td>
                                        <td>{{dataFormat($contrato->vigencia)}}</td>
                                        <td>{{dataFormat($contrato->prazo)}}</td>
                                        <td>{{dataFormat($contrato->created_at)}}</td>
                                        <td>
                                            <span class="tag tag-success">{!!\App\Models\Contrato\StatusContrato::status($contrato->fk_status)!!}</span>
                                        </td>
                                        <td>
                                            <a href="{{route('contrato.show',$contrato->id)}}" class="btn btn-default"><i class="fa fa-eye">Detalhe</i></a>
                                            <a href="{{route('contrato.edit',$contrato->id)}}" class="btn btn-primary"><i class="fa fa-edit">Editar</i></a>
                                            <a href="{{route('contrato.delete',$contrato->id)}}" class="btn btn-danger"><i class="fa fa-trash">Excluir</i></a>
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
@stop
@section('scripts')
    <script>
        $('#fk_contratado').select2();
        $('#fk_status').select2();
        $('#fk_objeto').select2();
        $('#reservation').daterangepicker({
            timePicker:true,
            timePickerIncrement:20,
            locale:{
                direction: 'ltr',
                separator: ' - ',
                applyLabel: 'SELECIONAR',
                cancelLabel: 'CANCELAR',
                weekLabel: 'W',
                daysOfWeek: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
                monthNames:['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                format:'DD/MM/YYYY'
            },
        })
        let data = '{{($data = Request::get('data_range')) ? $data : 'null'}}'
        document.querySelector('#reservation').value = data === 'null' ? document.querySelector('#reservation').value : data;

        $('#filtrarData').on('change',function(){
            if(this.checked){
                document.querySelector("#reservation").disabled = false;
            }else{
                document.querySelector("#reservation").disabled = true;
            }
        })
    </script>
@stop
