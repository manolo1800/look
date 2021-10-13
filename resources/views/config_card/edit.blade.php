@extends('layouts.app')

@section('content')
{{$errors->first('ipolt')}}

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/config_card/'.$config_card->id)}}" enctype="multipart/form-data">
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
                                        <li class="breadcrumb-item active" aria-current="page">Tarjeta</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="nombre_tarjeta">Nombre<label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="nombre_tarjeta" name="nombre_tarjeta" required="required" value="{{$config_card->nombre_tarjeta}}" class="form-control tip" maxlength="9" title="Ingresa el nombre de la tarjeta" />
                                        {!! $errors->first('name_card','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="tipo_target">Tipo de tarjeta<label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="tipo_target" name="tipo_target" required="required" value="{{$config_card->tipo_target}}" class="form-control tip" maxlength="9" title="Ingresa el nombre de la tarjeta" />
                                        {!! $errors->first('tipo_target','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="cant_ports">Cantidad de puertos <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <!--<input type="text" id="cant_puertos" name="cant_puertos" placeholder="Cantidad de puertos" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /-->
                                        <select name="cant_puertos" id="cant_puertos" class="form-control">
                                            <option value="{{$config_card->cant_puertos}}">{{$config_card->cant_puertos}}</option>
                                            <option value="4">4</option>
                                            <option value="8">8</option>
                                            <option value="16">16</option>
                                        </select>
                                        {!! $errors->first('cant_puertos','<span class="alert-danger fade in">:message</span>')!!}
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