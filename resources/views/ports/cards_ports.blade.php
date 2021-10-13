@extends('layouts.app')

@section('content')
{{$errors->first('ipolt')}}
@inject('estados', 'App\Services\estados')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/TargetPort')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div id="formulario_registro">
                        <!-- datos personales-->
                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                            <h3 class="gris"><strong> Tarjetas y puertos </strong></h3>
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
                                        <li class="breadcrumb-item active" aria-current="page">Tarjetas y Puertos</li>
                                    </ol>
                                </nav>
                            </div>
                            {{-- aqui --}}
                         <div class='col-xs-12 col-sm-12 col-md-6 col-xl-6'>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 " for="form_cedula">Ip del OLT <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <!-- <input type="text" id="ip_olt" name="ip_olt" required="required" placeholder="Ej.: 111.111.111.111" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /> -->
                                        <select id="olt_id" name="olt_id" class="form-control required">
                                            <option value="">-</option>
                                            @foreach($olt as $olts)
                                            <option value="{{$olts->id}}">{{$olts->ip_olt.' - '.$olts->Nombre_elemento}}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('olt_id','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                         
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Nombre de la tarjeta <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <select id="nombre_tarjeta" name="nombre_tarjeta" onchange="prueba()" class="form-control required">
                                            <option value="">-</option>
                                            @foreach($config_card as $datos)
                                            <option value="{{$datos->id}}">{{$datos->nombre_tarjeta}}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('nombre_tarjeta','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>  
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Ranura de la tarjeta <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <input type="text" id="ranura_tarjeta" name="ranura_tarjeta" required="required" placeholder="XX" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('ranura_tarjeta','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6" for="form_cedula">Tipo de tarjeta <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <input type="text" id="tipo_target" name="tipo_target" placeholder="Tipo" class="form-control tip" maxlength="15" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('tipo_target','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-12 required" for="form_cedula">S-VLAN AGREGADO <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <input type="text" id="VPI" name="VPI" required="required" placeholder="S-VLAN AGREGADO" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('VPI','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- agregado --}}
                        <div class='col-xs-12 col-sm-12 col-md-6 col-xl-6'>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">S-VLAN <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <input type="text" id="S_VLAN" name="S_VLAN" required="required" placeholder="S-VLAN" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('S_VLAN','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Puerto inicial <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <input type="text" id="puerto_inicial" name="puerto_inicial" required="required" placeholder="Puerto inicial" value="0" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('puerto_inicial','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="cant_puertos">Cantidad de puertos <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <input type="text" id="cant_puertos" name="cant_puertos" placeholder="Cantidad de puertos" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                       <!-- <label   class="custom-control-label label1 medio" for="puertos" id="puertos"> -->

                                        {!! $errors->first('cant_puertos','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Cantidad de ONTs <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="cant_ont" name="cant_ont" required="required" placeholder="Cantidad de ONTs" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                    
                                </label>
                                        {!! $errors->first('cant_ont','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">C-VLAN inicial <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <input type="text" id="C_lan_ini" name="C_lan_ini" required="required" placeholder="C-VLAN inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                        {!! $errors->first('C_lan_ini','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_cedula">Estado de la tarjeta <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12' id="esconder">
                                        <select id="ID_estatus" name="ID_estatus" class="form-control required">
                                            <option value="">Seleccione</option>
                                            @foreach($status as $statuses)
                                            <option value="{{$statuses->Estatus}}">{{$statuses->descripcion}}</option>
                                            @endforeach

                                        </select>
                                        {!! $errors->first('ID_estatus','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">
                                    <button type="button" class="btn btn-adn" onClick="defPorts()">
                                        <h5 class="gris"><strong>Adminitrar puertos</strong></h5>
                                    </button> </label>
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
                                <a href="{{ url('/TargetPorts') }}">
                                    <button type="button" class="btn btn-primary" onClick="">Mostrar Todos</button></a>

                            </div>
                        </div>
                    </div>
                    <!-- fin de la primera parte del formulario-->
                    <!-- inicio de la segunda parte del formulario-->
                    <div class='' id="formulario_registro_2">
                        <!-- Datos de seguridad-->
                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                            <h3 class="gris"><strong> Tarjetas y puertos </strong></h3>
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
                                        <li class="breadcrumb-item"><a href="{{url('/TargetPort')}}">Tarjetas y Puertos</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Tarjetas y Puertos</li>
                                    </ol>
                                </nav>
                            </div>
                            <!-- <div class="form-group  pull-right">
                                <button type="button" class="btn btn-primary" onClick="agregarFila()">Agregar</button>
                                <button type="button" class="btn btn-primary" onClick="eliminarFila()">Eliminar</button>
                            </div> -->

                            <!-- <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8'> -->
                            <div class="panel-body table-responsive" id="listadoregistros">
                                <table class="table table-striped table-bordered table-condensed table-hover">
                                    <thead>
                                        <th class="titulo">Puerto</th>
                                        <th class="titulo">Estado</th>
                                        <th class="titulo">SFP</th>
                                    </thead>
                                    <tbody id="tablaprueba" class="tablaprueba">

                                    </tbody>
                                </table>
                            </div>
                            <!-- </div> -->
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                            <hr />
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 col-xl-4  form-group">
                            <p>(*)Campo obligatorio.</p>
                            <div class="form-group  pull-right">
                                <button type="button" class="btn btn-primary" onClick="cargapaso2()">Siguiente</button>
                                <button type="button" class="btn btn-primary" onClick="atraspaso2()">Atrás</button>
                            </div>
                        </div>
                    </div>
                    <!-- fin de la segunda parte del formulario-->
                </form>
            </div>
        </div>
    </div>
</body>

<script>
        function prueba(){

    var id = document.getElementById('nombre_tarjeta').value;
// alert (id);
//alert(id);
$.ajax
({
type: "get",
url: "{{route('TargetPort.show',"id")}}",
data: {id : id, _token : $("input[name='_token']").val()},
dataType:'json',
cache: false,
success: function(data)
 {
 console.log(data);
// $("#ranura_tarjeta").val(data[0]['ranura_tarjeta']);
// var suma = (data[0]['ranura_tarjeta']+200);
$("#tipo_target").val(data[0]['tipo_target']);
// $("#S_VLAN").val(suma);
// $("#puerto_inicial").val(data[0]['puerto_inicial']);
$("#cant_puertos").val(data[0]['cant_puertos']);
var CVLAN = 11;
$("#C_lan_ini").val(CVLAN);
document.getElementById('C_lan_ini').disabled=true;
 if (data[0]['ID_estatus'] = 'DES') {
     var desactivado = "Restringido";
     console.log(desactivado);
    $("#ID_estatus").html('<option value="'+data[0]['ID_estatus']+'">'+desactivado+'</option>');
    // $("#esconder").hide();
}
else if (data[0]['ID_estatus'] = 'ACT'){
    var activado = "Activado";
     console.log(activado);
    $("#ID_estatus").html('<option value="'+data[0]['ID_estatus']+'">'+activado+'</option>');
} 

 
 }


});

}
</script>
<style>

    .medio{
        vertical-align: top;

    }
    .titulo{
    color: white;
    text-align: center;
    }
</style>
   
@endsection
