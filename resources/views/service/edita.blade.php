@extends('layouts.app')

@section('content')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/service/'.$service_Profile->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PATCH')}}
                    <div id="formulario_registro">

                        <!-- datos personales-->
                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                            <h3 class="gris"> Perfil de servicio </h3>
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
                                        <li class="breadcrumb-item"><a href="#">Aprovisionamiento</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Servicios</li>
                                    </ol>
                                </nav>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">ID del perfil de servicio <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="id" name="id" placeholder="xxxx" value="{{ $service_Profile->id}}" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('id','<span class="alert-danger fade in">:message</span>')!!}

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Nombre del Perfil de servicio <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="name_servicio" name="name_servicio" placeholder="Nombre del Perfil de servicio" value="{{ $service_Profile->name_servicio}}" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('name_servicio','<span class="alert-danger fade in">:message</span>')!!}

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Proveedor ONT <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="ont_id" name="ont_id" class="form-control required">
                                            <option value="{{$ontactu->id}}">{{$ontactu->serial}}</option>
                                            @foreach($ont as $onts)
                                            <option value="{{$onts->id}}">{{$onts->serial}}</option>
                                            @endforeach

                                        </select>
                                        {!! $errors->first('ont_id','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Modelo ONT <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="modelo_ont" name="modelo_ont" value="{{ $service_Profile->modelo_ont}}" placeholder="Modelo ONT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('modelo_ont','<span class="alert-danger fade in">:message</span>')!!}

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Estado del OLT <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="ID_estatus" name="ID_estatus" class="form-control required">
                                            @foreach($estatusactu as $statuses)
                                            <option value="{{$statuses->Estatus}}">{{$statuses->descripcion}}</option>
                                            @endforeach
                                            @foreach($estatusall as $statuses)
                                            <option value="{{$statuses->Estatus}}">{{$statuses->descripcion}}</option>
                                            @endforeach

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

                                <!-- </form> -->
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
