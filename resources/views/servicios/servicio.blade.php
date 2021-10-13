@extends('layouts.app')

@section('content')
@inject('estados', 'App\Services\estados')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/servicio')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div id="formulario_registro">

                        <!-- datos personales-->

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <h3 class="gris"><strong> Servicio </strong></h3>
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
                                        <li class="breadcrumb-item active" aria-current="page">Servcio</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_name_VLAN"> VLAN <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="VLAN" name="VLAN" placeholder="VLAN" class="form-control tip" maxlength="2" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('VLAN','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_name_Servicio">Nombre del Servicio <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="Servicio" name="Servicio" placeholder="Servicio" class="form-control tip" maxlength="50" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('Servicio','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_name_Regla">Regla </label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="Regla" name="Regla" placeholder="Regla" class="form-control tip" maxlength="40" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('Regla','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_name_GEMPORT">GEMPORT </label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="GEMPORT" name="GEMPORT" placeholder="GEMPORT" class="form-control tip" maxlength="40" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('GEMPORT','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Estado <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="status" name="status" class="form-control required">
                                            <option value="">-</option>
                                            <option value="Abierto">Abierto</option>
                                            <option value="Cerrado">Cerrado</option>
                                            <option value="Proceso">En Proceso</option>
                                            <option value="Asignado">Asignado</option>
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
                                <button type="submit" class="btn btn-primary" onClick="">Crear</button>
                                <a href="{{ url('/servicio/all') }}">
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
