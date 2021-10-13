@extends('layouts.app')

@section('content')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                <h3 class="gris"> Configuracion de Tarjeta de Puertos </h3>
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
                            <li class="breadcrumb-item"><a href="#">Configuracio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">targeta</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8 col-xs-offset-1 col-md-offset-1 col-sm-offset-1'>
                <div class="panel-body table-responsive" id="listadoregistros">
                    <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                        <thead class = "titulo">
                            <th class = "titulo">#</th>
                            <th class = "titulo">Nombre de la tarjeta</th>
                            <th class = "titulo">Tipo de tarjeta</th>
                            <th class = "titulo">Cantidad de Puertos</th>
                            <th class = "titulo">Opciones</th>
                        </thead>
                        <tbody>
                            @foreach($config_card as $config_cards)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $config_cards->nombre_tarjeta}}</td>
                                <td>{{ $config_cards->tipo_target}}</td>
                                <td>{{ $config_cards->cant_puertos}}</td>
                                <td>

                                    <a href="{{ url('/config_card/'.$config_cards->id.'/edit')}}">
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