@extends('layouts.app')

@section('content')
@inject('estados', 'App\Services\estados')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/Tipo')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div id="formulario_registro">

                        <!-- datos personales-->

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <h3 class="gris"><strong> Elemento Red </strong></h3>
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
                                        <li class="breadcrumb-item active" aria-current="page">Elemento de red</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_name_ID_elementod">ID_elementod <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="ID_elementod" name="ID_elementod" placeholder="ID_elementod" class="form-control tip" maxlength="10" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('ID_elementod','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_name_Nombre_elemento">Nombre_elemento <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="Nombre_elemento" name="Nombre_elemento" placeholder="Nombre_elemento" class="form-control tip" maxlength="25" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('Nombre_elemento','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_name_Slot">Slot </label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="Slot" name="Slot" placeholder="Slot" class="form-control tip" maxlength="2" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('Slot','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_name_Puertos">Puertos </label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="Puertos" name="Puertos" placeholder="Puertos" class="form-control tip" maxlength="3" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('Puertos','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_proveedor">Proveedor <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="proveedor" name="proveedor" class="form-control required">
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
                                <label class="control-label col-xs-6 required" for="form_tipo">Tipo <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="tipo" name="tipo" class="form-control required">
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
                                <label class="control-label col-xs-6 required" for="form_name_Despliegue">Despliegue <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="Despliegue" name="Despliegue" placeholder="Despliegue" class="form-control tip" maxlength="1" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('Despliegue','<span class="alert-danger fade in">:message</span>')!!}
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
                                <a href="{{ url('/Tipo/all') }}">
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
