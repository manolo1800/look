@extends('layouts.app')

@section('content')
@inject('estados', 'App\Services\estados')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/central/'.$central->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PATCH')}}
                    <div id="formulario_registro">

                        <!-- datos personales-->

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                            <h3 class="gris"><strong> Central </strong></h3>
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
                                        <li class="breadcrumb-item active" aria-current="page">Central</li>
                                    </ol>
                                </nav>
                            </div>




                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_codigo_central">Código de la central <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="form_codigo_central" name="codigo_central" placeholder="xxxxC" value="{{ $central->codigo_central}}" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('codigo_central','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_name_central">Nombre de la central <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="form_name_central" name="name_central" placeholder="Central" value="{{ $central->name_central}}" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('name_central','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>



                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_producto_1">Activa <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-1'>
                                        <!-- <input type="checkbox" id="producto_1" name="producto_1" required="required" placeholder="Fibra Empresarial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /> -->
                                        @if($central->status ==true)
                                        <input type="checkbox" id="status" checked="" name="status" class="form-control tip" />
                                        @else
                                        <input type="checkbox" id="status" name="status" class="form-control tip" />
                                        @endif
                                        {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>


                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <label class="control-label col-xs-4 required" for="form_cedula">
                                    <h5 class="gris"><strong> Ubicación</strong></h5>
                                </label>
                            </div>
                            <div class="form-group col-xs-12  ">
                                <label class="control-label col-xs-6 required" for="form_estado">Estado <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="form_estado_id" id="estado_id" name="estado_id" required="required" class="form-control {{-- $errors->has('estado_id') ? 'has-error' : '' --}}">
                                            <!-- <option> Selecciona</option> -->

                                            <option value="{{$estado->id}}">{{$estado->estado}}</option>
                                            @foreach($estados->getEstados() as $index => $estado)
                                            <option value="{{$index}}">{{$estado}}</option>
                                            @endforeach

                                        </select>
                                        {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12 ">
                                <label class="control-label col-xs-6 required" for="form_ciudad">Ciudad <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="form_ciudad_id" id="ciudad_id" name="ciudad_id" required="required" class="form-control">

                                            <option value="{{$ciudad->id}}">{{$ciudad->ciudad}}</option>
                                        </select>
                                        {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_municipio">Municipio <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="form_municipio_id" id="municipio_id" name="municipio_id" required="required" class="form-control">
                                            <option value="{{$municipio->id}}">{{$municipio->municipio}}</option>

                                        </select>
                                        {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_parroquia">Parroquia <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="form_parroquia_id" id="parroquia_id" name="parroquia_id" required="required" class="form-control">
                                            <option value="{{$parroquia->id}}">{{$parroquia->parroquia}}</option>

                                        </select>
                                        {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_urbanizacion">Urbanización / Sector <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="urbanizacion" value="{{ $central->urbanizacion}}" name="urbanizacion" required="required" placeholder="Urbanización / Sector" class="form-control tip" maxlength="25" title="Ingresa solo caracteres alfabéticos" />
                                        <!-- <select for="form_urbanizacion_id" id="urbanizacion" name="urbanizacion" required="required" class="form-control">
                                        </select> -->
                                        {!! $errors->first('urbanizacion','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_zona_p_central">Zona Postal <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'><input type="text" id="zona_p_central" name="zona_p_central" value="{{ $central->zona_p_central}}" required="required" placeholder="Zona Postal" class="form-control tip" maxlength="5" title="Ingresa solo caracteres alfabéticos" /></div>
                                    {!! $errors->first('zona_p_central','<span class="alert-danger fade in">:message</span>')!!}
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_direcc">Dirección <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class="col-xs-6"><input type="text" id="direcc" name="direcc" value="{{ $central->direcc}}" required="required" placeholder="Dirección" class="form-control tip" maxlength="25" title="Ingresa solo caracteres alfabéticos" /></div>
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
                                <!-- <a href="{{ url('/centrals') }}">
                                            <button type="button" class="btn btn-primary" onClick="">Mostrar Todos</button></a> -->

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
