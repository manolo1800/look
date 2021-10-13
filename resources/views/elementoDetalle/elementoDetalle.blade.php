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
                            <h3 class="gris"><strong> Elemento Detalle </strong></h3>
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
                                        <li class="breadcrumb-item active" aria-current="page">Elemento Detalle </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_ID_elementod"> ID_elementod <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="ID_elementod" name="ID_elementod" placeholder="ID_elementod" class="form-control tip" maxlength="10" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('ID_elementod','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_Slot">Slot </label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="Slot" name="Slot" placeholder="Slot" class="form-control tip" maxlength="2" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('Slot','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_Puerto">Puerto </label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="Puerto" name="Puerto" placeholder="Puerto" class="form-control tip" maxlength="3" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('Puerto','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_ID_puerto">ID_puerto<label class="rojo">*</label> </label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="ID_puerto" name="ID_puerto" placeholder="ID_puerto" class="form-control tip" maxlength="40" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('ID_puerto','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_SVLAN">SVLAN<label class="rojo">*</label> </label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="SVLAN" name="SVLAN" placeholder="SVLAN" class="form-control tip" maxlength="4" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('SVLAN','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_CVLAN">CVLAN<label class="rojo">*</label> </label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="CVLAN" name="CVLAN" placeholder="CVLAN" class="form-control tip" maxlength="4" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('CVLAN','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_ID_elemento_post">ID_elemento_post<label class="rojo">*</label> </label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="ID_elemento_post" name="ID_elemento_post" placeholder="ID_elemento_post" class="form-control tip" maxlength="10" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('ID_elemento_post','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_ID_estatus">ID_estatus <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="ID_estatus" name="ID_estatus" class="form-control required">
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
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_ID_estatus">ID_elemento <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="ID_elemento" name="ID_elemento" class="form-control required">
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
