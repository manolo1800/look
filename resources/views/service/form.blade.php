@extends('layouts.app')

@section('content')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                <h3 class="gris"> Perfil de servicio </h3>
                <hr />
                <!-- <p class="label-inf">Completa todos los campos del formulario con los datos solicitados.</p> -->
                <!-- <hr /> -->

            </div>

            <div class="aside">
                @include('layouts.menu_left')
            </div>

            <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8 col-xs-offset-1 col-md-offset-1 col-sm-offset-1'>
                <div class="panel-body table-responsive" id="listadoregistros">
                    <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <th>#</th>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Modelo</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            @foreach($service_Profile as $serviceProfiles)
                            <tr>
                                <td>{{$loop->iteration}}</td>

                                <td>{{ $serviceProfiles->id}}</td>
                                <td>{{ $serviceProfiles->name_servicio}}</td>
                                <td>{{ $serviceProfiles->modelo_ont}}</td>
                                <td>

                                    <a href="{{ url('/service/'.$serviceProfiles->id.'/edit')}}">
                                        <button class="btn btn-warning" onclick="">Editar<i class="fa fa-pencil"></i></button>
                                    </a>
                                    <!-- <form method="post" action="{{--url('/service/'.$serviceProfiles->id)--}}">
                                            {{--csrf_field()--}}
                                            {{--method_field('DELETE')--}}
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿borrar?');"> Borrar<i class="fa fa-close"></i></button>

                                        </form> -->
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
        </div>
</body>
@endsection
