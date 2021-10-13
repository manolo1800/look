@extends('layouts.app')

@section('content')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                <h3 class="gris"> Tarjetas y Puertos </h3>
                <hr />
                <!-- <p class="label-inf">Completa todos los campos del formulario con los datos solicitados.</p> -->
                <!-- <hr /> -->

            </div>

            <div class="aside">
                @include('layouts.menu_left')
            </div>

            <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8 col-xs-offset-1 col-md-offset-1 col-sm-offset-1'>


                <div class='class="form-group col-xs-12"'>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Aprovisionamiento</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tarjetas y Puertos</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8 col-xs-offset-1 col-md-offset-1 col-sm-offset-1'>
                <div class="panel-body table-responsive" id="listadoregistros">
                    <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <th class="titulo">#</th>
                            <th class="titulo">Nombre de la tarjeta</th>
                            <th class="titulo">Tipo de tarjeta</th>
                            <th class="titulo">VPI</th>
                            <th class="titulo">Opciones</th>
                        </thead>
                        <tbody>
                            @foreach($target_port as $target_ports)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $target_ports->nombre_tarjeta}}</td>
                                <td>{{ $target_ports->tipo_target}}</td>
                                <td>{{ $target_ports->VPI}}</td>
                                <td>

                                    <a href="{{ url('/TargetPort/'.$target_ports->id.'/edit')}}">
                                        <button class="btn btn-warning" onclick="">Editar<i class="fa fa-pencil"></i></button>

                                    </a>

                                </td>

                                <!-- '<button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-pencil"></i></button>
 					' <button class="btn btn-primary" onclick=""><i class="fa fa-check"></i></button></td> -->
                                <!-- <td>
                                </td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- </div> -->
        </div>
</body>
<style>
     .titulo{
    color: white;
    text-align: center;
    font-size: 14px;
    }
</style>
@endsection
