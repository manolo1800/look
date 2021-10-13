@extends('layouts.app')

@section('content')
@inject('estados', 'App\Services\estados')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form id="centalForm" name="form" method="post" class="form-horizontal" action="{{route('installggpm.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div id="formulario_registro">

                        <!-- datos personales-->

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <h3 class="gris"><strong> Instalación GGPM </strong></h3>
                            <hr />
                            <p class="label-inf">Completa todos los campos del formulario con los datos solicitados.</p>
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
                                        <li class="breadcrumb-item active" aria-current="page">Instalación GGPM</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_codigo_central">Central <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>

                                        <select name="central_id" id="central_id" onchange="pru(this)" class="form-control tip">
                                            @foreach($estados->getCentral() as $index => $estado)
                                            <option value="{{$index}}">{{$estado}}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('central','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_name_central">OLT <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="" id="olt_id" name="olt_id" required="required" class="form-control">
                                        </select>
                                        {!! $errors->first('olt','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_producto_1">Tarjeta <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="" id="id_targetPort" name="id_targetPort" required="required" class="form-control">

                                        </select>
                                        {!! $errors->first('tarjeta','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12  ">
                                <label class="control-label col-xs-6 required" for="form_estado">Puerto <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="form_estado_id" id="puerto_id" name="puerto_id" required="required" class="form-control">
                                        </select>
                                        {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12  ">
                                <label class="control-label col-xs-6 required" for="form_estado">ODF <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="form_estado_id" id="odf_id" name="odf_id" required="required" class="form-control">
                                        </select>
                                        {!! $errors->first('odf_id','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <hr />
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-xl-4  form-group">
                            <p>(*)Campo obligatorio.</p>
                            <div class="form-group  pull-right">
                                <button type="submit" class="btn btn-primary" onClick="">Crear</button>
                                <a href="{{ url('/centrals') }}">
                                    <button type="button" class="btn btn-primary" onClick="">Mostrar Todos</button>
                                </a>

                            </div>
                        </div>
                    </div>
                    <!-- fin de la primera parte del formulario-->
                </form>
            </div>
        </div>
    </div>
    <script>
        function pru() {
            var id = document.getElementById('central').value;
            alert(id);
            $.ajax({
                type: "get",
                url: "{{url('/odfs')}}",
                data: {
                    id: id
                },
                dataType: 'json',
                cache: false,
                success: function(data) {
                    console.log(data);
                    var datos = data[0];
                    //  console.log(datos[0]['Nombre_elemento']);

                    var loco = datos.length;
                    for (var i = 0; i < loco; i++) {
                        //console.log(datos[i]['nombre_permisos']);
                        document.getElementById("olt").innerHTML += "<select><option value>" + loco[i]['Nombre_elemento'] + "</option></select>";

                    }

                }
            });
        }
    </script>
</body>

@endsection