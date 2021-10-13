@extends('layouts.app')

@section('content')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/product')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div id="formulario_registro">

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                            <h3 class="gris"> Producto </h3>
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
                                        <li class="breadcrumb-item"><a href="#"> Planes y Productos</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Productos</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Nombre<label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="name_product" name="name_product" value="{{$product->name_product}}" placeholder="Nombre del Producto" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('name_product','<span class="alert-danger fade in">:message</span>')!!}

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Perfil de servicio <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="perfil_id" name="perfil_id" class="form-control required">
                                            <option value="{{$service_profileactu->id}}">{{$service_profileactu->name_servicio}}</option>
                                            @foreach($service_profile as $service_Profiles)
                                            <option value="{{$service_Profiles->id}}">{{$service_Profiles->name_servicio}}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('perfil_id','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Estado <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select id="status" name="status" class="form-control required">
                                            <option value="">-</option>
                                            <option value="true">Activo</option>
                                            <option value="false">Inactivo</option>
                                        </select>
                                        {!! $errors->first('central_id','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_plan">planes <label class="rojo">*</label></label>
                                <!-- <div> -->
                                <div class='col-xs-2'>
                                    <select id="firstlist" name="select1[]" class="form-control" multiple="multiple">
                                        <option>Item 1</option>
                                        <option>Item 2</option>
                                        <option>Item 3</option>
                                        <option>Item 4</option>
                                    </select>
                                </div>
                                <div class='col-xs-2'>
                                    <button type="button" class="btn btn-primary" onclick="AddToSecondList();">></button>
                                    <button type="button" class="btn btn-primary" onclick="DeleteSecondListItem();">
                                        < </button>
                                </div>
                                <!-- </div> -->
                                <div class='col-xs-2'>
                                    <select id="secondlist" name="select2[]" class="form-control" multiple="multiple">
                                    </select>
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
                                <a href="{{ url('/products') }}">
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
