@extends('layouts.app')

@section('content')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <div class="panel panel-primary " id="caja_error">
                    <div class="panel-heading error">
                        <h4 class="panel-title"> {{$respuesta['title']}}</h4>
                    </div>
                    <div class="panel-body">
                        <!-- <h3>Estimado(a) <h3>  -->
                    </div>
                    <br>
                    <h3> {{$respuesta['msg']}} </h3>
                    <br><small></small>
                    <div class="panel-footer">
                        <!-- <form method="post" action="{{--$respuesta['ruta']--}}"> -->
                        <a href="{{url($respuesta['ruta'])}}">
                            <button type="button" id="btn-error" class="btn btn-segun" onclick="">
                                <h4 class="panel-title"> Aceptar</h4>
                            </button>
                        </a><!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
