@extends('layouts.app')

@section('content')

<body class="container">
    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/aprovision/'.$olt->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PATCH')}}
                    <div id="formulario_registro">

                        <!-- datos personales-->
                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <section id="breadcrum"> > Averias > Reporte </section> -->
                            <!-- <i class="fas fa-lg fa-chevron-down aria-toggle"></i> -->
                            <h3 class="gris"> <strong>OLT</strong> </h3>
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
                                        <li class="breadcrumb-item active" aria-current="page">OLT</li>
                                    </ol>
                                </nav>
                            </div>


                            <div class='col-xs-12 col-sm-12 col-md-6 col-xl-6'>
                                <div class="form-group col-xs-12">
                                    <label class="control-label col-xs-4 required" for="form_central_id">Central <label class="rojo">*</label></label>
                                </div>
                                <div class="form-group col-xs-12">
                                    <div class=''>
                                        <div class='col-xs-12'>
                                            <select id="central_id" name="central_id" onchange="prueba(this)" class="form-control required">
                                                <option value="{{$central->id}}">{{$central->name_central}}</option>
                                                @foreach($centrales as $centrals)
                                                <option value="{{$centrals->id}}">{{$centrals->name_central}}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('central_id','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12">
                                    <label class="control-label col-xs-4 required" for="form_fila">Fila <label class="rojo">*</label></label>
                                </div>
                                <div class="form-group col-xs-12">
                                    <div class=''>
                                        <div class='col-xs-12'>
                                            <input type="text" id="fila" name="fila" placeholder="Fila" class="form-control tip" value="{{$olt->fila}}" maxlength="4" title="Ingresa el número sin puntos" />
                                            {!! $errors->first('fila','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12">
                                    <label class="control-label col-xs-4 required" for="form_piso">Piso <label class="rojo">*</label></label>
                                </div>
                                <div class="form-group col-xs-12">
                                    <div class=''>
                                        <div class='col-xs-12'>
                                            <input type="text" id="piso" name="piso" placeholder="Piso" class="form-control tip" value="{{$olt->piso}}" maxlength="4" title="Ingresa el número sin puntos" />
                                            {!! $errors->first('piso','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12">
                                    <label class="control-label col-xs-4 required" for="form_sala">Sala <label class="rojo">*</label></label>
                                </div>
                                <div class="form-group col-xs-12">
                                    <div class=''>
                                        <div class='col-xs-12'>
                                            <input type="text" id="sala" name="sala" placeholder="Sala" class="form-control tip" value="{{$olt->sala}}" maxlength="4" title="Ingresa el número sin puntos" />
                                            {!! $errors->first('sala','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12">
                                    <label class="control-label col-xs-4 required" for="form_bastidor">Bastidor <label class="rojo">*</label></label>
                                </div>
                                <div class="form-group col-xs-12">
                                    <div class=''>
                                        <div class='col-xs-12'>
                                            <input type="text" id="bastidor" name="bastidor" placeholder="Bastidor" class="form-control tip" value="{{$olt->bastidor}}" maxlength="4" title="Ingresa el número sin puntos" />
                                            {!! $errors->first('bastidor','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12">
                                    <label class="control-label col-xs-4 required" for="form_subbastidor">Sub - Bastidor <label class="rojo">*</label></label>
                                </div>
                                <div class="form-group col-xs-12">
                                    <div class=''>
                                        <div class='col-xs-12'>
                                            <input type="text" id="subbastidor" name="subbastidor" placeholder="Sub - Bastidor" value="{{$olt->subbastidor}}" class="form-control tip" maxlength="4" title="Ingresa el número sin puntos" />
                                            {!! $errors->first('subbastidor','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12">
                                    <label class="control-label col-xs-4 required" for="form_ip_olt">Ip del OLT <label class="rojo">*</label></label>
                                </div>
                                <div class="form-group col-xs-12">
                                    <div class=''>
                                        <div class='col-xs-12'>
                                            <input type="ip" id="ip_olt" name="ip_olt" placeholder="Ej.: 111.111.111.111" value="{{$olt->ip_olt}}" class="form-control tip" maxlength="16" title="Ingresa el número sin puntos" />
                                            {!! $errors->first('ip_olt','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-12 col-md-6 col-xl-6'>
                                <div class="form-group col-xs-12">
                                    <label class="control-label col-xs-6 required" for="form_nombre_olt">Nombre del OLT <label class="rojo">*</label></label>
                                </div>
                                <div class="form-group col-xs-12">
                                    <div class=''>
                                        <div class='col-xs-12'>
                                            <input type="text" id="Nombre_elemento" name="Nombre_elemento" placeholder="Nombre del OLT" value="{{$olt->Nombre_elemento}}" class="form-control tip" maxlength="25" title="Ingresa el número sin puntos" />
                                            {!! $errors->first('Nombre_elemento','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12">
                                    <label class="control-label col-xs-6 required" for="form_cedula">Modelo del OLT <label class="rojo">*</label></label>
                                </div>
                                <div class="form-group col-xs-12">
                                    <div class=''>
                                        <div class='col-xs-12'>
                                            <input type="text" id="Tipo" name="Tipo" placeholder="Modelo del OLT" value="{{$olt->Tipo}}" class="form-control tip" maxlength="25" title="Ingresa el número sin puntos" />
                                            {!! $errors->first('Tipo','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12">
                                    <label class="control-label col-xs-6 required" for="form_cedula">Proveedor del OLT <label class="rojo">*</label></label>
                                </div>
                                <div class="form-group col-xs-12">
                                    <div class=''>
                                        <div class='col-xs-12'>
                                            <select id="proveedor" name="proveedor" onchange="puertoIni()" class="form-control required">
                                                <option value="">-</option>

                                            </select>
                                            {!! $errors->first('proveedor','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                {{--
                                <div class="form-group col-xs-12">
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <input type="text" id="proveedor" name="proveedor" placeholder="Proveedor del OLT"  class="form-control tip" maxlength="20" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('proveedor','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                                </div>
                                --}}
                                <div class="form-group col-xs-12">
                                    <label class="control-label col-xs-6 required" for="form_Puertos">Puerto de servicio inicial <label class="rojo">*</label></label>
                                </div>
                                <div class="form-group col-xs-12">
                                    <div class=''>
                                        <div class='col-xs-12'>
                                            <input type="text" id="puerto_serv_inicial" name="puerto_serv_inicial" placeholder="Puerto de servicio inicial" class="form-control tip" maxlength="4" title="Ingresa el número sin puntos" />
                                            {{--
                                 <select id="puerto_serv_inicial" name="puerto_serv_inicial"  class="form-control required">
                                    <option value="">--</option>
                                    <option value="4">4</option>
                                    <option value="8">8</option>
                                    <option value="16">16</option>
                                 </select>
                                 --}}
                                            {!! $errors->first('puerto_serv_inicial','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12">
                                    <label class="control-label col-xs-6 required" for="form_numero_ports">Núm. de puertos de servicio <label class="rojo">*</label></label>
                                </div>
                                <div class="form-group col-xs-12">
                                    <div class=''>
                                        <div class='col-xs-12'>
                                            <select id="numero_puertos" name="numero_puertos" onchange="puertoIni()" class="form-control required">
                                            </select>
                                            {!! $errors->first('proveedor','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                {{--
                                <div class="form-group col-xs-12">
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <input type="text" id="numero_puertos" name="numero_puertos"  placeholder="Número de puertos de servicio" class="form-control tip" maxlength="4" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('numero_puertos','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                                </div>
                                --}}
                                <div class="form-group col-xs-12">
                                    <label class="control-label col-xs-6 required" for="form_puerto_uplin">Núm. puerto UPLINK <label class="rojo">*</label></label>
                                </div>
                                <div class="form-group col-xs-12">
                                    <div class=''>
                                        <div class='col-xs-12'>
                                            <input type="text" id="puerto_uplin" name="puerto_uplin" value="{{$olt->puerto_uplin}}" placeholder="Núm. puerto UPLINK" class="form-control tip" maxlength="10" title="Ingresa el número sin puntos" />
                                            {!! $errors->first('puerto_uplin','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-xs-12">
                                    <label class="control-label col-xs-4 required" for="form_cedula">
                                        <button type="button" class="btn btn-adn" onClick="admiuplink()">
                                            <h5 class="gris"><strong>Adminitrar puertos UPLINK</strong></h5>
                                        </button>
                                    </label>
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
                                <!-- <a href="{{ url('/aprovicions') }}">
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