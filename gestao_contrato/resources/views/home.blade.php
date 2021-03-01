@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <h3>Dados</h3>
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-gradient-blue">
                    <div class="inner">
                        <h3>{{$contratos}}</h3>
                        <p>Contratos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('contrato.index')}}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-cyan">
                    <div class="inner">
                        <h3>{{$contratosEmEdicao}}</h3>

                        <p>Contratos em edição</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('contrato.index',['fk_status'=>1])}}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$contratosAtivo}}</h3>

                        <p>Contratos ativos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('contrato.index',['fk_status'=>2])}}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$contratosCancelado}}</h3>

                        <p>Contratos cancelados</p>

                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('contrato.index',['fk_status'=>3])}}" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    </div>
@stop
