@extends('layouts.app')

@section('content')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/install/'.$install->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PATCH')}}
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
                                <label class="control-label col-xs-4 required" for="form_cedula">Central *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <!-- <input type="text" id="Central" name="Central" required="required" placeholder="Ej.: 12345678" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /> -->
                                        <select id="central_id" name="central_id" class="form-control required">
                                            <option value="{{$central->id}}">{{$central->name_central}}</option>
                                            @foreach($centrales as $centrals)
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
                            <label class="control-label col-xs-4 required" for="form_cedula">
                                <h5 class="gris"><strong>OLT </strong></h5>
                            </label>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Rack *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="ip" id="rack_olt" name="rack_olt" required="required" value="{{ $install->rack_olt}}" placeholder="Ej.: 111.111.111.111" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('rack_olt','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">OLT *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="olt" name="olt" required="required" value="{{ $install->olt}}" placeholder="Nombre del OLT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
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
                                <label class="control-label col-xs-4 required" for="form_cedula">Frame *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="frame_p_olt" name="frame_p_olt" required="required" value="{{ $install->frame_p_olt}}" placeholder="Ej.: 111.111.111.111" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('frame_p_olt','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Slot *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="slot_olt" name="slot_olt" required="required" value="{{ $install->slot_olt}}" placeholder="Nombre del OLT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('slot_olt','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Puerto *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="puerto_olt" name="puerto_olt" required="required" value="{{ $install->puerto_olt}}" placeholder="Proveedor del OLT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('puerto_olt','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <label class="control-label col-xs-4 required" for="form_cedula">
                                <h5 class="gris"><strong> Puerto ODF PI IN</strong></h5>
                            </label>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Rack *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="rack_odfin" name="rack_odfin" required="required" value="{{ $install->rack_odfin}}" placeholder="Ej.: 111.111.111.111" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('rack_odfin','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">ODF *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="odfin" name="odfin" required="required" value="{{ $install->odfin}}" placeholder="Nombre del OLT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('odfin','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Bandeja *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="bandeja_odfin" name="bandeja_odfin" required="required" value="{{ $install->bandeja_odfin}}" placeholder="Proveedor del OLT" class=" form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('bandeja_odfin','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Posición *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="pos_odfin" name="pos_odfin" required="required" value="{{ $install->pos_odfin}}" placeholder="Puerto de servicio inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
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
                                <label class="control-label col-xs-4 required" for="form_cedula">Rack *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="rack_odfout" name="rack_odfout" required="required" value="{{ $install->rack_odfout}}" placeholder="Ej.: 111.111.111.111" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('rack_odfout','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">ODF *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="odfout" name="odfout" required="required" value="{{ $install->odfout}}" placeholder="Nombre del OLT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('odfout','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Bandeja *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="bandeja_odfout" name="bandeja_odfout" required="required" value="{{ $install->bandeja_odfout}}" placeholder="Proveedor del OLT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('bandeja_odfout','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Posición *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="pos_odfout" name="pos_odfout" required="required" value="{{ $install->pos_odfout}}" placeholder="Puerto de servicio inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('pos_odfout','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Feeder *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="feeder" name="feeder" required="required" value="{{ $install->feeder}}" placeholder="Puerto de servicio inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('feeder','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <label class="control-label col-xs-4 required" for="form_cedula">
                                <h5 class="gris"><strong> Puerto ODF PE</strong></h5>
                            </label>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Rack *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="rack_odfpe" name="rack_odfpe" required="required" value="{{ $install->rack_odfpe}}" placeholder="Ej.: 111.111.111.111" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('rack_odfpe','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">ODF *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="odfpe" name="odfpe" required="required" value="{{ $install->odfpe}}" placeholder="Nombre del OLT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('odfpe','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Bandeja *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="bandeja_odfpe" name="bandeja_odfpe" required="required" value="{{ $install->bandeja_odfpe}}" placeholder="Proveedor del OLT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('bandeja_odfpe','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Posición *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="pos_odfpe" name="pos_odfpe" required="required" value="{{ $install->pos_odfpe}}" placeholder="Puerto de servicio inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('pos_odfpe','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Fibra *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="fibra" name="fibra" required="required" value="{{ $install->fibra}}" placeholder="Ej.: 111.111.111.111" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('fibra','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Hilo OSP *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="hilo" name="hilo" required="required" value="{{ $install->hilo}}" placeholder="Nombre del OLT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('hilo','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Buffer *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="buffer" name="buffer" required="required" value="{{ $install->buffer}}" placeholder="Proveedor del OLT" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('buffer','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Manga principal *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="manga" name="manga" required="required" value="{{ $install->manga}}" placeholder="Puerto de servicio inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('manga','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">GDP *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="gdp" name="gdp" required="required" value="{{ $install->gdp}}" placeholder="Puerto de servicio inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('gdp','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">MFS *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="mfs" name="mfs" required="required" value="{{ $install->mfs}}" placeholder="Puerto de servicio inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('mfs','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">GDS *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="gds" name="gds" required="required" value="{{ $install->gds}}" placeholder="Puerto de servicio inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('gds','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">FXB / Terminal *</label>
                                <div class=''>
                                    <div class='col-xs-4'>
                                        <input type="text" id="fxb_term" name="fxb_term" required="required" value="{{ $install->fxb_term}}" placeholder="Puerto de servicio inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('fxb_term','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                    <div class='col-xs-4'>
                                        <input type="text" id="Cantidad_FXB" name="Cantidad_FXB" required="required" value="{{ $install->Cantidad_FXB}}" placeholder="Puerto de servicio inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('Cantidad_FXB','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Cantidad MXB / Terminal *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="cant_mbx_terminal" name="cant_mbx_terminal" required="required" value="{{ $install->cant_mbx_terminal}}" placeholder="Puerto de servicio inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('cant_fxb_terminal','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Destino *</label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="destino" name="destino" required="required" value="{{ $install->destino}}" placeholder="Puerto de servicio inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('destino','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Latitud <label class="rojo"><label class="rojo">*</label></label></label>

                                <div class=''>
                                    <div class='col-xs-2'>
                                        <input type="text" id="grados_la" name="grados_la"  value="{{ $install->grados_la}}" placeholder="XX" class="form-control tip" maxlength="2" title="Ingresa el número sin puntos" />
                                        {!!$errors->first('grados_la','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                    <div class="col-xs-1">
                                        ;
                                    </div>


                                    <div class='col-xs-4'>
                                        <input type="text" id="dirección_la" name="dirección_la"  value="{{ $install->dirección_la}}" placeholder="XX" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
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
                                            <input type="text" id="grados_lo" name="grados_lo"  value="{{ $install->grados_lo}}" placeholder="XX" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                            {!!$errors->first('grados_lo','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                        <div class="col-xs-1">
                                            ;
                                        </div>

                                        <div class='col-xs-4'>
                                            <input type="text" id="dirección_lo" name="dirección_lo"  value="{{ $install->dirección_lo}}" placeholder="XX" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                            {!!$errors->first('dirección_lo','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                        <div class="col-xs-1">
                                            º
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_urbanizacion">Urbanización / Sector <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="urbanizacion" name="urbanizacion"  value="{{ $install->urbanizacion}}" placeholder="Urbanizacion" class="form-control tip" maxlength="25" title="Ingresa solo caracteres alfabéticos" />
                                        {!! $errors->first('urbanizacion','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
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
                            <button type="submit" class="btn btn-primary" onClick="">Editar</button>
                            <!-- <button type="button" class="btn btn-primary" onClick="paso2_personas()">Modificar</button> -->
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
