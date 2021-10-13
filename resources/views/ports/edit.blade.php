@extends('layouts.app')

@section('content')
{{$errors->first('ipolt')}}

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/TargetPort/'.$target_port->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PATCH')}}
                    <div id="formulario_registro">

                        <!-- datos personales-->

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                            <h3 class="gris"><strong> Tarjetas y puertos </strong></h3>
                            <!-- <hr />
                            <p class="label-inf">Completa todos los campos del formulario con los datos solicitados.</p>
                            <hr /> -->

                        </div>
                        <div class="aside">
                            @include('layouts.menu_left')
                        </div>
                        <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8 col-xs-offset-1 col-md-offset-1 col-sm-offset-1'>

                            <div class='class="form-group col-xs-12"'>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Aprovisionamiento</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Tarjetas y Puertos</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Ip del OLT *</label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <!-- <input type="text" id="ip_olt" name="ip_olt" required="required" placeholder="Ej.: 111.111.111.111" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /> -->
                                        <select id="olt_id" name="olt_id" class="form-control required">
                                            <option value="{{ $olt->id}}">{{ $olt->ip_olt}}</option>
                                            @foreach($olts as $oltss)
                                            <option value="{{$oltss->id}}">{{$oltss->ip_olt}}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('olt_id','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Ranura de la tarjeta *</label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="ranura_tarjeta" name="ranura_tarjeta" value="{{ $target_port->ranura_tarjeta}}" required="required" placeholder="XX" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('ranura_tarjeta','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Nombre de la tarjeta *</label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="nombre_tarjeta" name="nombre_tarjeta" value="{{ $target_port->nombre_tarjeta}}" required="required" placeholder="Nombre de la tarjeta" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('nombre_tarjeta','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6" for="form_cedula">Tipo de tarjeta <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="tipo_target" name="tipo_target" value="{{ $target_port->tipo_target}}" placeholder="Tipo" class="form-control tip" maxlength="15" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('tipo_target','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">VPI *</label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="VPI" name="VPI" value="{{ $target_port->VPI}}" required="required" placeholder="XXXX" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('VPI','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">S-VLAN *</label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="S_VLAN" name="S_VLAN" value="{{ $target_port->S_VLAN}}" required="required" placeholder="XXX" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('S-VLAN','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Puerto inicial *</label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="puerto_inicial" name="puerto_inicial" value="{{ $target_port->puerto_inicial}}" required="required" placeholder="Nombre de la tarjeta" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('puerto_inicial','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Cantidad de puertos *</label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="cant_puertos" name="cant_puertos" value="{{ $target_port->cant_puertos}}" required="required" placeholder="Cantidad de puertos" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('cant_puertos','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Cantidad de ONTs *</label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="cant_ont" name="cant_ont" value="{{ $target_port->cant_ont}}" required="required" placeholder="Cantidad de ONTs" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('cant_ont','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">C-LAN inicial *</label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="C_lan_ini" name="C_lan_ini" value="{{ $target_port->C_lan_ini}}" required="required" placeholder="Inner V-LAN inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('C_lan_ini','<span class="alert-danger fade in">:message</span>')!!}
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
