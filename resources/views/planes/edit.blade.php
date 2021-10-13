@extends('layouts.app')

@section('content')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/planes/'.$plan->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH')}}
                    <div id="formulario_registro">

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                            <h3 class="gris"> Planes </h3>
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
                                        <li class="breadcrumb-item"><a href="#">Planes y Productos</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Planes</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Nombre<label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="Nombre_plan" name="Nombre_plan" placeholder="Nombre del plan" value="{{ $plan->Nombre_plan}}" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('Nombre_plan','<span class="alert-danger fade in">:message</span>')!!}

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Velocidad de subida <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="Stream_up" name="Stream_up" placeholder="xxxx" value="{{ $plan->Stream_up}}" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('Stream_up','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Velocidad de bajada <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="Stream_down" name="Stream_down" placeholder="xxxx" value="{{ $plan->Stream_down}}" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('Stream_down','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Perfil de línea <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="perfil_id" name="perfil_id" class="form-control required">
                                            <option value="{{ $onlineProfile->id}}">{{$onlineProfile->name_online}}</option>
                                            @foreach($onlineProfiles as $onlineProfiless)
                                            <option value="{{$onlineProfiless->id}}">{{$onlineProfiless->name_online}}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('perfil_id','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Estado <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="status" name="status" class="form-control required">
                                            @if($plan->status ==true)
                                            <option value="true">Activo</option>
                                            <option value="false">Inactivo</option>
                                            @else
                                            <option value="false">Inactivo</option>
                                            <option value="true">Activo</option>

                                            @endif
                                        </select>
                                        {!! $errors->first('central_id','<span class="alert-danger fade in">:message</span>')!!}
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
                                <button type="submit" class="btn btn-primary" onClick="">Editar</button>
                            </div>
                        </div>
                    </div>
                    <!-- fin de la primera parte del formulario-->
                </form>
            </div>
        </div>
    </div>
</body>
@endsection
