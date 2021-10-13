@extends('layouts.app')

@section('content')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/install')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div id="formulario_registro">

                        <!-- datos personales-->

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                            <h3 class="gris"><strong> Registrar instalación </strong></h3>
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
                                        <li class="breadcrumb-item active" aria-current="page">Registrar</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Central <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <!-- <input type="text" id="Central" name="Central" required="required" placeholder="Ej.: 12345678" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /> -->
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
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_urbanizacion">Urbanización / Sector <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="urbanizacion" name="urbanizacion" placeholder="Urbanizacion" class="form-control tip" maxlength="25" title="Ingresa solo caracteres alfabéticos" />
                                        {!! $errors->first('urbanizacion','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Destino <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="destino" name="destino" required="required" placeholder="Destino" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('destino','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Latitud <label class="rojo"><label class="rojo">*</label></label></label>

                                <div class=''>
                                    <div class='col-xs-2'>
                                        <input type="text" id="grados_la" name="grados_la" placeholder="XX" class="form-control tip" maxlength="2" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('grados_la','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                    <div class="col-xs-1">
                                        ;
                                    </div>


                                    <div class='col-xs-4'>
                                        <input type="text" id="dirección_la" name="dirección_la" placeholder="XX" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('dirección_la','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                    <div class="col-xs-1">
                                        º
                                    </div>

                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Longitud <label class="rojo"><label class="rojo">*</label></label></label>
                                <div class=''>
                                    <div class=''>
                                        <div class='col-xs-2'>
                                            <input type="text" id="grados_lo" name="grados_lo" placeholder="XX" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                            {!!$errors->first('grados_lo','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                        <div class="col-xs-1">
                                            ;
                                        </div>

                                        <div class='col-xs-4'>
                                            <input type="text" id="dirección_lo" name="dirección_lo" placeholder="XX" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                            {!!$errors->first('dirección_lo','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                        <div class="col-xs-1">
                                            º
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <label class="control-label col-xs-4 required" for="form_cedula">
                                <h5 class="gris"><strong>OLT </strong></h5>
                            </label>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Rack <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="ip" id="rack_olt" name="rack_olt" required="required" placeholder="Rack" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('rack_olt','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">OLT <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="olt" name="olt" required="required" placeholder="Nombre del OLT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('olt','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <label class="control-label col-xs-4 required" for="form_cedula">
                                <h5 class="gris"><strong> Puerto OLT</strong></h5>
                            </label>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Frame <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="frame_p_olt" name="frame_p_olt" required="required" placeholder="Frame" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('frame_p_olt','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Slot <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="slot_olt" name="slot_olt" required="required" placeholder="Slot" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('slot_olt','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Puerto <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="puerto_olt" name="puerto_olt" required="required" placeholder="Puerto" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('puerto_olt','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Fibra <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="fibra" name="fibra" required="required" placeholder="Fibra" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('fibra','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Hilo OSP <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="hilo" name="hilo" required="required" placeholder="Hilo OSP" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('hilo','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Buffer <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="buffer" name="buffer" required="required" placeholder="Buffer" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('buffer','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Manga principal <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="manga" name="manga" required="required" placeholder="Manga principal" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('manga','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4" for="form_cedula">GDP </label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="gdp" name="gdp" placeholder="GDP" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('gdp','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4" for="form_cedula">MFS </label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="mfs" name="mfs" placeholder="MFS" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('mfs','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4" for="form_cedula">GDS </label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="gds" name="gds" placeholder="GDS" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('gds','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">FXB / Terminal <label class="rojo">*</label></label>
                                <div class=''>
                                    {{--<div class='col-xs-4'>
                                        <input type="text" id="fxb_term" name="fxb_term" required="required" placeholder="FXB / Terminal " class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('fxb_term','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>--}}
                                    <div class='col-xs-4'>
                                        <select name="fxb_term" id="fxb_term" required="required"  class="form-control">
                                            <option value="">Seleccione</option>
                                            <option value="FXB">FXB</option>
                                            <option value="Terminal">Terminal</option>
                                        </select>
                                        {!!$errors->first('fxb_term','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>

                                    <div class='col-xs-4'>
                                        <input type="text" id="Cantidad_FXB" name="Cantidad_FXB" required="required" placeholder="FXB / Terminal " class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('Cantidad_FXB','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Cantidad MXB / Terminal <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="cant_mbx_terminal" name="cant_mbx_terminal" required="required" placeholder="Cantidad MXB / Terminal" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('cant_fxb_terminal','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>


                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">
                                    <button type="button" class="btn btn-adn" onClick="catastro()">
                                        <h5 class="gris"><strong>Catastro</strong></h5>
                                    </button> </label>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_producto_1">Centralizado <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-1'>
                                        <!-- <input type="checkbox" id="producto_1" name="producto_1" required="required" placeholder="Fibra Empresarial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /> -->
                                        <input type="checkbox" id="centralizado" onclick="def()" name="centralizado" class="form-control tip" />
                                        {!! $errors->first('centralizado','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                                <label class="control-label col-xs-4 required" for="form_producto_1">Descentralizado <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-1'>
                                        <!-- <input type="checkbox" id="producto_1" name="producto_1" required="required" placeholder="Fibra Empresarial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /> -->
                                        <input type="checkbox" id="descentralizado" onclick="defi()" name="descentralizado" class="form-control tip" />
                                        {!! $errors->first('descentralizado','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fin de la primera parte del formulario-->
                    </div>

                    <!-- inicio de la segunda parte del formulario-->
                    <div class='' id="formulario_registro_2">
                        <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8'>
                        </div>
                        <div class='col-xs-9 col-sm-9 col-md-9 col-xl-9 col-xs-offset-3 col-md-offset-3 col-sm-offset-3'>
                            <!-- Datos de seguridad-->
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <label class="control-label col-xs-4 required" for="form_cedula">
                                <h5 class="gris"><strong> Puerto ODF PI IN</strong></h5>
                            </label>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Rack <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="rack_odfin" name="rack_odfin" placeholder="Rack ODF PI IN" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('rack_odfin','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">ODF <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="odfin" name="odfin" placeholder="ODF" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('odfin','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Bandeja <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="bandeja_odfin" name="bandeja_odfin" placeholder="Bandeja ODF PI IN" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('bandeja_odfin','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Posición <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="pos_odfin" name="pos_odfin" placeholder="Posición ODF PI IN" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('pos_odfin','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <label class="control-label col-xs-4 required" for="form_cedula">
                                <h5 class="gris"><strong> Puerto ODF PI OUT</strong></h5>
                            </label>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Rack <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="rack_odfout" name="rack_odfout" placeholder="Rack ODF PI OUT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('rack_odfout','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">ODF <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="odfout" name="odfout" placeholder="ODF" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('odfout','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Bandeja <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="bandeja_odfout" name="bandeja_odfout" placeholder="Bandeja ODF PI OUT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('bandeja_odfout','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Posición <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="pos_odfout" name="pos_odfout" placeholder="Posición ODF PI OUT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('pos_odfout','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Feeder <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="feeder" name="feeder" placeholder="Feeder" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('feeder','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fin de la segunda parte del formulario-->
                    </div>

                    <!-- inicio de la segunda parte del formulario-->
                    <div class='' id="formulario_registro_3">
                        <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8'>
                        </div>
                        <div class='col-xs-9 col-sm-9 col-md-9 col-xl-9 col-xs-offset-3 col-md-offset-3 col-sm-offset-3'>
                            <!-- Datos de seguridad-->
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <label class="control-label col-xs-4 required" for="form_cedula">
                                <h5 class="gris"><strong> Puerto ODF PE</strong></h5>
                            </label>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Rack <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="rack_odfpe" name="rack_odfpe" placeholder="Rack ODF PE" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('rack_odfpe','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">ODF <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="odfpe" name="odfpe" placeholder="ODF" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('odfpe','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Bandeja <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="bandeja_odfpe" name="bandeja_odfpe" placeholder="Bandeja ODF PE" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('bandeja_odfpe','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Posición <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="pos_odfpe" name="pos_odfpe" placeholder="Posición ODF PE" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('pos_odfpe','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                        </div>
                        <!-- fin de la segunda parte del formulario-->
                    </div>
                    <!-- inicio de la segunda parte del formulario-->
                    <div class='' id="formulario_registro_4">
                        <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8'>
                        </div>
                        <div class='col-xs-9 col-sm-9 col-md-9 col-xl-9 col-xs-offset-3 col-md-offset-3 col-sm-offset-3'>
                            <!-- Datos de seguridad-->
                            <div class="panel-body table-responsive" id="listadoregistros">
                                <table class="table table-striped table-bordered table-condensed table-hover">
                                    <thead>
                                        <th>Nro. Casa/ Apto</th>
                                        <th>Nombre</th>

                                    </thead>
                                    <tbody id="tablaprueba">
                                    </tbody>
                                </table>
                            </div>
                            <!-- </div> -->
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                            <hr />
                        </div>
                    </div>

            </div>
            <!-- fin de la segunda parte del formulario-->


            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                <hr />
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-xl-4  form-group">
                <p>(*)Campo obligatorio.</p>
                <div class="form-group  pull-right">
                    <button type="submit" class="btn btn-primary" onClick="">Crear</button>
                    <a href="{{ url('/installs') }}"><button type="button" class="btn btn-primary" onClick="">Mostrar Todos</button></a>

                </div>
            </div>

            </form>
        </div>
    </div>
    </div>
</body>
@endsection

<script>
    // $(document).ready(function() {
    //     if ($('#centralizado').prop('checked')) {
    //         $('#descentralizado').remove('notchecked');
    //     }
    // });
</script>
