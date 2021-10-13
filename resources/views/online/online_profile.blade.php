@extends('layouts.app')

@section('content')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/online')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div id="formulario_registro">

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                            <h3 class="gris"> Perfil de linea </h3>
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
                                        <li class="breadcrumb-item active" aria-current="page">Perfil en linea</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">ID del perfil de linea <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="id" name="id" placeholder="xxxx" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('id','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Nombre del Perfil de linea <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="name_online" name="name_online" placeholder="Nombre del Perfil de linea" class="form-control tip" maxlength="50" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('name_online','<span class="alert-danger fade in">:message</span>')!!}

                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Tipo producto <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="tipo_producto" name="tipo_producto" class="form-control required">
                                            <option value="">-</option>
                                            @foreach($product as $products)
                                            <option value="{{$products->id}}">{{$products->name_product}}</option>
                                            @endforeach

                                        </select>
                                        {!! $errors->first('ont_id','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Tipo usuario <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="ont_usuarios_id" name="ont_usuarios_id" class="form-control required">
                                            <option value="">-</option>
                                            @foreach($ont_tipo_srv as $ont_tipo_srvs)
                                            <option value="{{$ont_tipo_srvs->id}}">{{$ont_tipo_srvs->tipos_user}}</option>
                                            @endforeach

                                        </select>
                                        {!! $errors->first('ont_id','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_Stream_up">Velocidad de subida <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="Stream_up" name="Stream_up" placeholder="xxxx" class="form-control tip" maxlength="4" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('Stream_up','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_Stream_down">Velocidad de bajada <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="Stream_down" name="Stream_down" placeholder="xxxx" class="form-control tip" maxlength="4" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('Stream_down','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Estado <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="ID_estatus" name="ID_estatus" class="form-control required">
                                            <option value="">-</option>
                                            @foreach($status as $statuses)
                                            <option value="{{$statuses->Estatus}}">{{$statuses->descripcion}}</option>
                                            @endforeach

                                        </select>
                                        {!! $errors->first('ID_estatus','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <hr />
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-xl-4  form-group">
                            <p>(*)Campo obligatorio.</p>
                            <div class="form-group  pull-right">
                                <button type="submit" class="btn btn-primary" onClick="">Crear</button>
                                <a href="{{ url('/onlines') }}">
                                    <button type="button" class="btn btn-primary" onClick="">Mostrar Todos</button></a>
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
