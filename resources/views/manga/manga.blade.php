@extends('layouts.app')

@section('content')
@inject('estados', 'App\Services\estados')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form id="centalForm" name="form" method="post" class="form-horizontal" action="{{route('manga.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div id="formulario_registro">

                        <!-- datos personales-->

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <h3 class="gris"><strong> Manga </strong></h3>
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
                                        <li class="breadcrumb-item active" aria-current="page">Manga</li>
                                    </ol>
                                </nav>
                            </div>
                          
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-5 required" for="form_codigo_central">Elemento previo<label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-3'>
                                        <select for="" id="previo" onchange ="manga()" name="previo" class="form-control" onchange>
                                            <option value="">-</option>
                                            <option value="1">ODF</option>
                                            <option value="2">Mangas</option>
                                            {{-- @foreach($central as $central)
                                            <option value="{{$central->id}}">{{$central->name_central}}</option>
                                            @endforeach --}}

                                        </select>
                                        {!! $errors->first('previo','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                    <div class='col-xs-3'>
                                        <select for="" id="previo2" name="previo2"  class="form-control" onchange>
                                         
                                            <!-- {{-- @foreach($central as $central)
                                            <option value="{{$central->id}}">{{$central->name_central}}</option>
                                            @endforeach --}} -->

                                        </select>
                                        {!! $errors->first('previo2','<span class="alert-danger fade in">:message</span>')!!}

                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-5 required" for="form_codigo_central">Nombre <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="nombre" name="nombre"  placeholder="Nombre" class="form-control tip" maxlength="50"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('nombre','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-5 required" for="form_codigo_central">Perdida <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="perdida" name="perdida"  placeholder="Perdida" class="form-control tip" maxlength="5"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('perdida','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                    <div class='col-xs-1'>
                                        <label class="control-label col-xs-5 required" for="form_codigo_central" style = "margin-left:-35px">db</label>

                                    </div>
                                </div>
                            </div>

                         


                            <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                                <hr />
                            </div>
                            <div class="form-group col-xs-12">

                                <label class="control-label col-xs-4 required" for="form_cedula">
                                    <h5 class="gris"><strong> Cable</strong></h5>
                                </label>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-5 required" for="form_codigo_central">Tipo de cable <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="" id="cable" name="cable"  class="form-control" onchange>
                                            <option value="">-</option>
                                            <option value="Cable Principal">Cable Principal</option>
                                            <option value="Cable Secundario">Cable Secundario</option>
                                            <option value="Buffer">Buffer</option>

                                            {{-- @foreach($cable as $cable)
                                            <option value="{{$cable->id}}">{{$cable->name_cable}}</option>
                                            @endforeach --}}

                                        </select>
                                        {!! $errors->first('cable','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-5 required" for="form_codigo_central">Cantidad de cable saliente<label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="cantidad" name="cantidad"  placeholder="Cantidad" class="form-control tip" maxlength="5"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('cantidad','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group col-xs-12">
                                <label class="control-label col-xs-5 required" for="form_codigo_central">Capacidad <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-5'>
                                        <input type="text" id="capacidad" name="capacidad"  placeholder="Capacidad" class="form-control tip" maxlength="5"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('capacidad','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-5 required" for="form_codigo_central">Distancía <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-5'>
                                        <input type="text" id="distancia" name="distancia"  placeholder="Distancia" class="form-control tip" maxlength="5"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('distancia','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-5 required" for="form_codigo_central">Ruta <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-5'>
                                        <input type="text" id="ruta" name="ruta"  placeholder="Ruta" class="form-control tip" maxlength="5"  title="Ingresa el número sin puntos" />

                                        {!! $errors->first('posicion','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>--}} 
                            <div id="admcables" data-sfp="$sfp">
                                <div class="form-group col-xs-12">
                                   <label class="control-label col-xs-4 required" for="form_cedula">
                                      <button type="button" class="btn btn-adn" onClick="admincables()">
                                         <h5 class="gris"><strong>Administrar Cables</strong></h5>
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
                                <button type="submit" class="btn btn-primary" onClick="">Crear</button>
                                <a href="{{ url('/mangas') }}">
                                    <button type="button" class="btn btn-primary" onClick="">Mostrar Todos</button>
                                </a>

                            </div>
                        </div>
                    </div>
                    <!-- fin de la primera parte del formulario-->
                    <!-- fin de la primera parte del formulario-->
               <!-- inicio de la segunda parte del formulario-->
               {{-- agregado --}}
               <div class='' id="formulario_registro_2">
                <!-- Datos de seguridad-->
                <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                   <!-- <span class="badge pull-right numero_formulario_registro">1</span> -->
                   <h3 class="gris"><strong> Manga </strong></h3>
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
                            <!-- <li class="breadcrumb-item"><a href="#">Aprovisionamiento</a></li> -->
                            <li class="breadcrumb-item"><a href="{{url('/TargetPort')}}">Instalación</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Administrar Cables</li>
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
                            <th>Codigo</th>
                            <th>Capacidad</th>
                            <th>Distancia</th>
                            <th>Ruta</th>
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
             {{-- agregado --}}
             <!-- fin de la segunda parte del formulario-->
                </form>
            </div>
        </div>
    </div>
    <script>
        function manga(){
            document.getElementById('previo2').options.length = 0;

            // document.getElementById("previo2").innerHTML ="<select><option>-</option><select>
            var prueba = document.getElementById('previo').value;
            
            // alert(prueba);
            if (prueba==2){


                // alert('hola');
                $.ajax({
                type: "get",
                url: "{{url('/mangas1')}}",
//   data: {id : id},
                dataType:'json',
                cache: false,
                success: function(data)
        {

    // alert('hola');
    // console.log(data);
                var datos = Object.values(data);

                var loco =datos.length;
                for(var i = 0; i < loco; i++){
            //console.log(datos[i]['nombre_permisos']);
                document.getElementById("previo2").innerHTML += "<select class='form-control'><option value = "+datos[i]['id']+">"+ datos[i]['mangas'] +' - '+datos[i]['cable'] +"</option></select>";

             }
             $(data).empty();

        } 
});

            }
            if(prueba==1){
                
                $(prueba).empty();

                alert('no hola');
                $.ajax({
                type: "get",
                url: "{{url('/odf1')}}",
//   data: {id : id},
                dataType:'json',
                cache: false,
                success: function(data)
        {

    // alert('hola');
     console.log(data);
                var datos = Object.values(data);

                var loco =datos.length;
                for(var i = 0; i < loco; i++){
            //console.log(datos[i]['nombre_permisos']);
                document.getElementById("previo2").innerHTML += "<select class='form-control'><option value = "+datos[i]['id']+">"+ datos[i]['odf'] +"</option></select>";

             }

        } 
});
               
            }
        }
    </script>
</body>
@endsection
