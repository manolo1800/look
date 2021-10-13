@extends('layouts.app')

@section('content')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/ont/'.$ont->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH')}}
                    <div id="formulario_registro">

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                            <h3 class="gris"> ONT </h3>
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
                                        <li class="breadcrumb-item"><a href="#">Aprovisionador</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">ONT</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Tipo <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="tipo" name="tipo" class="form-control required">
                                            <option value="{{ $ont_tipo_actu->id}}">{{$ont_tipo_actu->Clasificacion}}</option>
                                            @foreach($ont_tipo as $ont_tipos)
                                            <option value="{{$ont_tipos->id}}">{{$ont_tipos->Clasificacion}}</option>
                                            @endforeach

                                        </select>
                                        {!! $errors->first('tipo','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Serial <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="serial" name="serial" placeholder="Serial ONT" value="{{ $ont->serial}}" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('serial','<span class="alert-danger fade in">:message</span>')!!}
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
