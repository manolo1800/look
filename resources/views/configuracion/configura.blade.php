@extends('layouts.app')

@section('content')
{{$errors->first('ipolt')}}

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/comic')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div id="formulario_registro">

                        <!-- datos personales-->

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                            <h3 class="gris"><strong> Configuración </strong></h3>
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
                                        <li class="breadcrumb-item active" aria-current="page">Configuración</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6" for="form_cedula">Proveedor <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="proveedor" name="proveedor" class="form-control required">
                                            <option value="">-</option>
                                            <option value="Haawei">Hawei</option>
                                            <option value="ZTE">ZTE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Conexión <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <!-- <input type="text" id="ip_olt" name="ip_olt" required="required" placeholder="Ej.: 111.111.111.111" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /> -->
                                        <select id="conexion" name="conexion" class="form-control required">
                                            <option value="">-</option>
                                            <option value="SSH">SSH</option>
                                            <option value="HTTP">HTTP</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Ruta / Comandos <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <!-- <input type="text" id="comandos" name="comandos" required="required" placeholder="XX" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /> -->
                                        <textarea name="comandos" id="comandos" cols="30" rows="10" class="form-control tip"></textarea>
                                        {!! $errors->first('comandos','<span class="alert-danger fade in">:message</span>')!!}
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
                                <a href="{{ url('/comic') }}">
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
