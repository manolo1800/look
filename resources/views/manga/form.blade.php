@extends('layouts.app')

@section('content')
@inject('estados', 'App\Services\estados')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                
                    {{ csrf_field() }}
                    <div id="formulario_registro">

                        <!-- datos personales-->

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <h3 class="gris"><strong> SPLITTER </strong></h3>
                            <hr />
                            

                        </div>


                        <div class="aside">
                            @include('layouts.menu_left')

                        </div>


                        <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8 col-xs-offset-1 col-md-offset-1 col-sm-offset-1'>

                            <div class='class="col-xs-12"'>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Aprovisionamiento</a></li>
                                        <li class="breadcrumb-item active" ><a href="{{url('splitter')}}">SPLITTER</a></li>
                                        <li class="breadcrumb-item">Todos</li>
                                    </ol>
                                </nav>
                            </div>

                

                            <div class="panel-body table-responsive" id="listadoregistros">
                            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>#</th>
                                    <th>nombre</th>
                                    <th>cable</th>
                                    <th>cantidad</th>
                                    <th>Opciones</th>
                                </thead>
                            <tbody>

                                @foreach($mangas as $manga)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$manga->mangas}}</td>
                                    <td>{{$manga->cable}}</td>
                                    <td>{{$splitter->cantidad}}</td>
                                    <td>
                                        <a href="{{ url('manga/'.manga->id.'/edit')}}">
                                            <button class="btn btn-warning" onclick="">Editar<i class="fa fa-pencil"></i></button>
                                        </a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</body>
@endsection
