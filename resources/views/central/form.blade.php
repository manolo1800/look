@extends('layouts.app')

@section('content')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">

                {{ csrf_field() }}


                <!-- datos personales-->

                <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                    <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                    <h3 class="gris"><strong> Central </strong></h3>
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
                                <!-- <th>Ip del agregador</th> -->
                                <th>Código de la central</th>
                                <th>Nombre de la central</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>

                                @foreach($central as $centrals)
                                <tr>
                                    <td>{{$loop->iteration}}</td>

                                    <!-- <td>{{ $centrals->ip_agregador}}</td> -->
                                    <td>{{ $centrals->codigo_central}}</td>
                                    <td>{{ $centrals->name_central}}</td>
                                    <td>

                                        <a href="{{ url('/central/'.$centrals->id.'/edit')}}">
                                            <button class="btn btn-warning" onclick="">Editar<i class="fa fa-pencil"></i></button>
                                        </a>
                                        <!-- <form method="post" action="{{ url('/central/'.$centrals->id) }}"> -->
                                            {{--csrf_field()--}}
                                            {{--method_field('DELETE')--}}
                                            <!-- <button class="btn btn-danger" type="submit" onclick="return confirm('¿borrar?');"> Borrar<i class="fa fa-close"></i></button> -->

                                        <!-- </form> -->
                                    </td>

                                    <!-- '<button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-pencil"></i></button>
 					                ' <button class="btn btn-primary" onclick=""><i class="fa fa-check"></i></button></td> -->
                                    <!-- <td>
                                </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                            <!-- <tfoot> -->
                                <!-- <th>#</th> -->
                                <!-- <th>Ip del agregador</th> -->
                                <!-- <th>Código de la central</th> -->
                                <!-- <th>Nombre de la central</th> -->
                                <!-- <th>Opciones</th> -->
                            <!-- </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</body>
@endsection
