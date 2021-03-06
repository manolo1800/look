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
                            <h3 class="gris"><strong> Operaciones internas</strong></h3>
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
                                        <li class="breadcrumb-item active" aria-current="page">Operaciones internas</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Central <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <!-- <input type="text" id="Central" name="Central" required="required" placeholder="Ej.: 12345678" class="form-control tip" maxlength="9" title="Ingresa el n??mero sin puntos" /> -->
                                        <select id="central_id" name="central_id" class="form-control required">
                                            <option value="">-</option>
                                            @foreach($central as $centrals)
                                            <option value="{{$centrals->id}}">{{$centrals->name_central}}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('central_id','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <!--<label class="control-label col-xs-6 required" for="form_name_destino">Destino <label class="rojo">*</label></label>-->
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <!--<input type="text" id="destino" name="destino" placeholder="Destino" class="form-control tip" maxlength="10" title="Ingresa el n??mero sin puntos" />-->
                                        {!! $errors->first('destino','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <!--<label class="control-label col-xs-6 required" for="form_name_Urbanizaci??n / Sector">Urbanizaci??n / Sector <label class="rojo">*</label></label>-->
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <!--<input type="text" id="Urbanizaci??n_Sector" name="Urbanizaci??n_Sector" placeholder="Urbanizaci??n / Sector" class="form-control tip" maxlength="25" title="Ingresa el n??mero sin puntos" />-->
                                        {!! $errors->first('Urbanizaci??n_Sector','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                            </div>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>

                                <div class="panel-body table-responsive" id="listadoregistros">
                                    <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                                        <thead>
                                            <th>Nro. Aptp./ Casa</th>
                                            <th>Nombre </th>
                                            <th>Puerto </th>
                                            <th>Acometida Interna</th>
                                            <!-- <th>Tecnico CCO </th> -->
                                            <!-- <th>Fecha de instalaci??n acometida </th> -->
                                        </thead>
                                        <tbody>
                                            @foreach($aptonombre as $aptonombres)
                                            <tr>
                                                <!-- <td>{{$loop->iteration}}</td> -->
                                                <td>{{ $aptonombres->aptoCas}}</td>
                                                <td>{{ $aptonombres->nombre}}</td>
                                                <td><input type="text" id="puerto" name="puerto" required="required" placeholder="puerto" class="form-control tip" maxlength="2" title="Ingresa el n??mero sin puntos" /></td>
                                                <td><input type="checkbox" id="status" required="required" name="status" class="form-control tip" /></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
