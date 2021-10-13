@extends('layouts.app')

@section('content')


<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/ordenes')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div id="formulario_registro_orden">

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                            <h3 class="gris"> Órdenes </h3>
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
                                        <li class="breadcrumb-item active" aria-current="page">Órdenes</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Tipo</label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <!-- <input type="text" id="tipo" name="tipo" placeholder="Tipo ONT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /> -->
                                        <select id="tipo" name="tipo" class="form-control required">
                                            <option value="">-</option>
                                            <option value="servicio">Servicio</option>
                                            <option value="Trabajo">Trabajo</option>
                                        </select>
                                        {!!$errors->first('tipo','<span class="alert-danger fade in">:message</span>')!!}

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Cuenta Contrato </label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="cuent_contrac" name="cuent_contrac" placeholder="Cuenta Contrato" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('cuenta_contrato','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Rif/Cedula </label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="rif_cedula" name="rif_cedula" placeholder="Cuenta Contrato" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('rif_cedula','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">ID Servicio/Dispositivo </label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="IDServicio_Dispositivo" name="IDServicio_Dispositivo" placeholder="Cuenta Contrato" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('IDServicio_Dispositivo','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Fecha Creación </label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="date" id="fech_crea" name="fech_crea" class="form-control tip" step="1" min="2013-01-01" max="2021-07-14" />
                                        {!!$errors->first('fech_crea','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Estado </label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="estado" name="estado" class="form-control required">
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
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-xl-4  form-group">
                                <p>(*)Campo obligatorio.</p>
                                <div class="form-group  pull-right">
                                    <button type="submit" class="btn btn-primary" id="tabletDropdown" aria-expanded="false" onClick="">Consultar</button>
                                    <!-- <a href="{{ url('/onlines') }}">
                                    <button type="button" class="btn btn-primary" onClick="">Mostrar Todos</button></a> -->
                                </div>
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
