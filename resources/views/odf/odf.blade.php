@extends('layouts.app')

@section('content')
@inject('estados', 'App\Services\estados')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form id="centalForm" name="form" method="post" class="form-horizontal" action="{{route('Odf.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div id="formulario_registro">

                        <!-- datos personales-->

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <h3 class="gris"><strong> ODF </strong></h3>
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
                                        <li class="breadcrumb-item active" aria-current="page">ODF</li>
                                    </ol>
                                </nav>
                            </div>
                           
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_codigo_central">Central <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="" id="id_central" name="id_central"  class="form-control" >
                                        <option value="">Seleccione</option>
                                        @foreach ($central as $centrals)
                                        <option value="<?php echo $centrals->id?>">{{$centrals->name_central}}</option> ;
                                        @endforeach   
                                        <!-- <option value="">Seleccione una central</option>

                                            @foreach($central as $central)
                                            <option value="">{{$central->name_central}}</option>
                                            @endforeach -->

                                        </select>
                                        {!! $errors->first('central','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_codigo_central">ODF <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="odf" name="odf"  placeholder="odf" class="form-control tip" maxlength="50"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('odf','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_codigo_central">Sala <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="sala" name="sala"  placeholder="Sala" class="form-control tip" maxlength="50"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('sala','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                          <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_codigo_central">Piso <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="piso" name="piso"  placeholder="Piso" class="form-control tip" maxlength="50"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('piso','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_codigo_central">Bastidor <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="bastidor" name="bastidor"  placeholder="Bastidor" class="form-control tip" maxlength="50"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('bastidor','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_codigo_central">Frame <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="frame" name="frame"  placeholder="Frame" class="form-control tip" maxlength="50"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('frame','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_codigo_central">Bandeja <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="bandeja" name="bandeja"  placeholder="Bandeja" class="form-control tip" maxlength="50"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('bandeja','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_codigo_central">Posición <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="posicion" name="posicion"  placeholder="Posición" class="form-control tip" maxlength="50"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('posicion','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>


                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                             <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <label class="control-label col-xs-4 required" for="form_cedula">
                                    <h5 class="gris"><strong> Cable</strong></h5>
                                </label>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_codigo_central">Tipo de cable <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="tipo_cable" name="tipo_cable" value = '<?php echo $fijo ?>'  protected readonly placeholder="" class="form-control tip" maxlength="50"  title="Ingresa el número sin puntos" />

                                        {{-- <select for="" id="central" name="central"  class="form-control" onchange>
                                            <option value="">Seleccione una Cable</option>
                                            <option value="">Fibra Central</option>
                                            <option value="">Distribución</option>
                                            <option value="">Buffer</option>

                                            {{-- @foreach($central as $central)
                                            <option value="{{$central->id}}">{{$central->name_central}}</option>
                                            @endforeach 

                                        </select> --}}
                                        {!! $errors->first('tipo_cable','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_codigo_central">Capacidad <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="capacidad" name="capacidad"  placeholder="Capacidad" class="form-control tip" maxlength="50"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('capacidad','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_codigo_central">Distancía <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="distancia" name="distancia"  placeholder="Distancia" class="form-control tip" maxlength="50"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('distancia','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_codigo_central">Ruta <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="ruta" name="ruta"  placeholder="Ruta" class="form-control tip" maxlength="50"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('posicion','<span class="alert-danger fade in">:message</span>')!!}
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
                                <a href="{{ url('/centrals') }}">
                                    <button type="button" class="btn btn-primary" onClick="">Mostrar Todos</button>
                                </a>

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
