<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestão de contratos</title>
    <link rel="icon" type="imagem/png" href="{{url('coimbra_icon.png')}}" />
    <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{url('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/sweetalert2/sweetalert2.min.css')}}">

    <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
</head>
<body>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('home')}}" class="nav-link">Início</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('contrato.index')}}" class="nav-link">Contratos</a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-light-blue elevation-4">

            <a href="{{route('home')}}" class="brand-link">
                <img src="{{url('logo_dc.png')}}" alt="" class="" style="opacity: .8">
                <span class="brand-text font-weight-light"></span>
            </a>


            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('contrato.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Contratos
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('empresa.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Empresas
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    @include('flash.message')
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li><h5>{{ $error }} </h5></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</body>
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{url('dist/js/adminlte.js')}}"></script>
    <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('plugins/moment/moment.min.js')}}"></script>
    <script src="{{url('plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{url('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{url('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{url('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{url('plugins/inputmask/inputmask.min.js')}}"></script>
    <script src="{{url('js/jquery.mask.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
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
{{--    <script src="https://cdn.es.gov.br/scripts/jquery/jquery-maskedinput/1.4.1/jquery.maskedinput-1.4.1.min.js"></script>--}}
    @yield('scripts')
</html>
