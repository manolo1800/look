@extends('layouts.app')

@section('content')
{{$errors->first('ipolt')}}
@inject('estados', 'App\Services\estados')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="POST" class="form-horizontal" action="{{url('/traffic_config/'.$traffic_config->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PATCH')}}

                    <div id="formulario_registro">
                        <!-- datos personales-->
                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                            <h3 class="gris"><strong> Configuracion </strong></h3>
                            <hr />
                            <p class="label-inf">Completa todos los campos del formulario con los datos solicitados.</p>
                            <hr />
                        </div>
                        <div class="aside">
                            @include('layouts.menu_left')
                        </div>
                        <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8 col-xs-offset-1 col-md-offset-1 col-sm-offset-1'>
                            <div class='class="form-group col-xs-12"'>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Configuracion</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">trafico</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="nombre">Nombre<label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="nombre" name="nombre" required="required" value="{{$traffic_config->nombre}}" class="form-control tip" maxlength="9" title="Ingresa el nombre" />
                                        {!! $errors->first('nombre','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="cir">Cir<label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="number" id="cir" name="cir" required="required" value="{{$traffic_config->cir}}" class="form-control tip" maxlength="9" title="ingrese un numero sin puntos" />
                                        {!! $errors->first('cir','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="pir">Pir<label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="number" id="pir" name="pir" required="required" value="{{$traffic_config->pir}}" class="form-control tip" maxlength="9" title="ingrese un numero sin puntos" />
                                        {!! $errors->first('pir','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="prioridad">Prioridad <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-1'>
                                       
                                        <input type="checkbox" id="prioridad"  name="prioridad" class="form-control tip" />
                                        {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <hr />
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-xl-4  form-group">
                            <p>(*)Campo obligatorio.</p>
                            <div class="form-group  pull-right">
                                <button type="submit" class="btn btn-primary" onClick="">Editar</button>

                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                
                </form>
            </div>
        </div>
    </div>
</body>
@endsection