@extends('layouts.app')

@section('content')
@inject('estados', 'App\Services\estados')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form id="centalForm" name="form" method="post" class="form-horizontal" action="{{route('splitter.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div id="formulario_registro">

                        <!-- datos personales-->

                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <h3 class="gris"><strong> Splitter </strong></h3>
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
                                        <li class="breadcrumb-item"><a href="#">Instalación</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Splitter</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12  ">
                                <label class="control-label col-xs-5 required" for="form_estado">Elemento previo <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-3'>
                                        <select id="previo" name="previo" onchange="manga(this)"  class="form-control">
                                            <option value="{{$splitter->previo}}">{{$splitter->previo}}</option>
                                            <option value="1">Splitter  </option>
                                            <option value="2">Manga  </option>


                                        </select>
                                        {!! $errors->first('previo','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                    <div class=''>
                                        <div class='col-xs-3'>
                                            <select  id="previo2" name="previo2" onchange="prueba12(this)"  class="form-control">
                                            <option>{{$splitter->previo2}}</option>
    
    
                                            </select>
                                            {!! $errors->first('previo2','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-5 required" for="form_codigo_central">Nombre <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="nombre" name="nombre"  placeholder="Nombre" class="form-control tip" maxlength="50"  title="Ingresa el nÃºmero sin puntos" />
                                        {!! $errors->first('nombre','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12  ">
                                <label class="control-label col-xs-5 required" for="form_estado">Buffer <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select  id="buffer" name="buffer"  class="form-control">
                                            <option value="">{{$splitter->buffer}}</option>
                                            <option value="Azul">Azul</option>
                                            <option value="Naranja">Naranja</option>
                                            <option value="Verde">Verde</option>
                                            <option value="Marron">Marron</option>
                                         
                                        </select>
                                        {!! $errors->first('buffer','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-5 required" for="form_name_central">Nivel de división <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="nivel" value="{{$splitter->nivelDivesion}}" name="nivelDivision" readonly placeholder="Nivel de división" class="form-control tip" maxlength="25"  title="Ingresa el nÃºmero sin puntos" />
                                        {!! $errors->first('nivel','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12  ">
                                <label class="control-label col-xs-5 required" for="form_estado">Capacidad <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="" id="capacidad" name="capacidad"  class="form-control">
                                        <option value="">Seleccione</option>
                                        <option value="1:2">1:2</option>
                                        <option value="1:4">1:4</option>

                                        </select>
                                        {!! $errors->first('capacidad','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-5 required" for="form_name_central">Pérdida<label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="perdida" value="{{$splitter->perdida}}" name="perdida" placeholder=" Pérdida" class="form-control tip" maxlength="50"  title="Ingresa el nÃºmero sin puntos" />
                                        {!! $errors->first('perdida','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                    <div class='col-xs-1'>
                                        <label class="control-label col-xs-5 required" for="" style = "margin-left:-35px">db</label>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-5 required" for="form_name_central">Latitud<label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="latitud1" value="{{$plitter->latitud}}" name="latitud1" placeholder=" Latitud" class="form-control tip" maxlength="50"  title="Ingresa el nÃºmero sin puntos" />
                                        {!! $errors->first('latitud1','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                  
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-5 required" for="form_name_central">Longitud<label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <input type="text" id="longitud1" value="{{$splitter->longitud}}" name="longitud1" placeholder="el valor debe ser negativo ej.: -1234" class="form-control tip" maxlength="50"  title="Ingresa el nÃºmero sin puntos" />
                                        {!! $errors->first('longitud1','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                   
                                </div>
                            </div>                      


                        <div id="mostrar" class='col-xs-12 col-sm-12 col-md-12 col-xl-12' style="display:none"> 
                            
                            <div class="form-group col-xs-12">
                                <hr />
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required centro" for="form_cedula">
                                    <h5 class="gris"><strong> Código catastral</strong></h5>
                                </label>
                            </div>
                            <div class="col-md-4 form-group form-group">
                                    <div class="form-group col-xs-12  ">
                                        <label class="control-label col-xs-7 required" for="form_estado">Estado <label class="rojo">*</label></label>
                                    <div class=''>
                                        <div class='col-xs-12'>
                                            <select for="form_estado_id" id="estado_id" name="estado_id"  class="form-control">
                                                @foreach($estados->getEstados() as $index => $estado)
                                                    <option value="{{$index}}">{{$estado}}</option>
                                                @endforeach

                                            </select>
                                            {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12">
                                    <label class="control-label col-xs-7 required" for="form_parroquia">Parroquia <label class="rojo">*</label></label>
                                    <div class=''>
                                        <div class='col-xs-12'>
                                            <select for="form_parroquia_id" id="parroquia_id" name="parroquia_id"  class="form-control">


                                            </select>
                                            {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-xs-12 ">
                                    <label class="control-label col-xs-7 required" for="form_ciudad">Sector <label class="rojo">*</label></label>
                                    <div class=''>
                                        <div class='col-xs-12'>
                                        <input type="text" id="urbanizacion"  name="urbanizacion" class="form-control tip" />

                                            {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-12 ">
                                    <label class="control-label col-xs-7 required" for="form_ciudad">Subparcela <label class="rojo">*</label></label>
                                    <div class=''>
                                        <div class='col-xs-12'>
                                        <input type="text" id="urbanizacion"  name="urbanizacion" class="form-control tip" />

                                            {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="col-md-4 form-group">

                            <div class="form-group col-xs-12 ">
                                <label class="control-label col-xs-7 required" for="form_ciudad">Ciudad <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <select for="form_ciudad_id" id="ciudad_id" name="ciudad_id"  class="form-control">


                                        </select>
                                        {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12 ">
                                <label class="control-label col-xs-7 required" for="form_ciudad">Urbanización <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                    <input type="text" id="urbanizacion"  name="urbanizacion" class="form-control tip" />

                                        {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12 ">
                                <label class="control-label col-xs-7 required" for="form_ciudad">Manzana <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                    <input type="text" id="urbanizacion"  name="urbanizacion" class="form-control tip" />

                                        {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12 ">
                                <label class="control-label col-xs-7 required" for="form_ciudad">Cód. Postal <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <select for="form_ciudad_id" id="ciudad_id" name="ciudad_id"  class="form-control">


                                        </select>
                                        {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 form-group">
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-7 required" for="form_municipio">Municipio <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <select for="form_municipio_id" id="municipio_id" name="municipio_id"  class="form-control">


                                        </select>
                                        {!! $errors->first('status','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-7 required" for="form_municipio">Ambito <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <input type="text" id="ambito"  name="ambito" class="form-control tip" />

                                        {!! $errors->first('ambito','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-7 required" for="form_municipio">Parcela <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-12'>
                                        <input type="text" id="parcela"  name="parcela" class="form-control tip" />

                                        {!! $errors->first('parcela','<span class="alert-danger fade in">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                             <!-- agregado -->
                            
                             <!-- agregado -->
                        </div>
                        {{-- agregado --}}
                        <div class="form-group col-xs-12">
                            <label class="control-label col-xs-4 required centro" for="form_cedula">
                                <h5 class="gris"><strong> Ubicacion</strong></h5>
                            </label>
                        </div>
                        <div class="col-md-6 form-group form-group">
                            <div class="form-group col-xs-12  ">
                                <label class="control-label col-xs-12 required" for="form_estado">Frontal <label class="rojo">*</label></label>
                            <div class=''>
                                <div class='col-xs-3'>
                                    <select  id="frontal" name="frontal"  class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="">Autopista</option>  
                                    <option value="">Avenida</option>  
                                    <option value="">Boulevard</option>  
                                    <option value="">Calle</option>  
                                    <option value="">Callejon</option>  
                                    <option value="">Camino</option>  
                                    <option value="">Carrera</option>  
                                    <option value="">Carretera</option>  


                                    </select>
                                    {!! $errors->first('frontal','<span class="alert-danger fade in">:message</span>')!!}
                                </div>
                            </div>
                            <div class=''>
                                <div class='col-xs-9'>
                                    <input type="text" id="frontal2"  name="frontal2" class="form-control tip" />

                                    {!! $errors->first('frontal2','<span class="alert-danger fade in">:message</span>')!!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-xs-12">
                            <label class="control-label col-xs-12 required" for="form_parroquia">Atras <label class="rojo">*</label></label>
                            <div class=''>
                                <div class='col-xs-3'>
                                    <select  id="atras" name="atras"  class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="">Autopista</option>  
                                    <option value="">Avenida</option>  
                                    <option value="">Boulevard</option>  
                                    <option value="">Calle</option>  
                                    <option value="">Callejon</option>  
                                    <option value="">Camino</option>  
                                    <option value="">Carrera</option>  
                                    <option value="">Carretera</option>  


                                    </select>
                                    {!! $errors->first('atras','<span class="alert-danger fade in">:message</span>')!!}
                                </div>
                            </div>
                            <div class=''>
                                <div class='col-xs-9'>
                                    <input type="text" id="atras2"  name="atras2" class="form-control tip" />

                                    {!! $errors->first('atras2','<span class="alert-danger fade in">:message</span>')!!}
                                </div>
                            </div>
                        </div>

                        
                    </div>

                <div class="col-md-6 form-group">

                    <div class="form-group col-xs-12 ">
                        <label class="control-label col-xs-12 required" for="form_ciudad">Derecha <label class="rojo">*</label></label>
                        <div class=''>
                            <div class='col-xs-3'>
                                <select  id="derecha" name="derecha"  class="form-control">
                                <option value="">Seleccione</option>
                                    <option value="">Autopista</option>  
                                    <option value="">Avenida</option>  
                                    <option value="">Boulevard</option>  
                                    <option value="">Calle</option>  
                                    <option value="">Callejon</option>  
                                    <option value="">Camino</option>  
                                    <option value="">Carrera</option>  
                                    <option value="">Carretera</option>  
 

                                </select>
                                {!! $errors->first('derecha','<span class="alert-danger fade in">:message</span>')!!}
                            </div>
                        </div>
                        <div class=''>
                            <div class='col-xs-9'>
                                <input type="text" id="derecha2"  name="derecha2" class="form-control tip" />
                                {!! $errors->first('derecha2','<span class="alert-danger fade in">:message</span>')!!}
                            </div>
                        </div>
                    </div>   
                    <div class="form-group col-xs-12 ">
                        <label class="control-label col-xs-12 required" for="form_ciudad">Izquierda <label class="rojo">*</label></label>
                        <div class=''>
                            <div class='col-xs-3'>
                                <select  id="izquierda" name="izquierda"  class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="">Autopista</option>  
                                    <option value="">Avenida</option>  
                                    <option value="">Boulevard</option>  
                                    <option value="">Calle</option>  
                                    <option value="">Callejon</option>  
                                    <option value="">Camino</option>  
                                    <option value="">Carrera</option>  
                                    <option value="">Carretera</option>  

                                </select>
                                {!! $errors->first('izquierda','<span class="alert-danger fade in">:message</span>')!!}
                            </div>
                        </div>
                        <div class=''>
                            <div class='col-xs-9'>
                                <input type="text" id="izquierda2"  name="izquierda2" class="form-control tip" />
                                {!! $errors->first('izquierda2','<span class="alert-danger fade in">:message</span>')!!}
                            </div>
                        </div>
                    </div>                   
                </div>
                
                <div class="col-md-4 form-group">
                    <!-- <div class="form-group col-xs-12">
                        <label class="control-label col-xs-7 required" for="form_municipio">Izquierda <label class="rojo">*</label></label>
                        <div class=''>
                            <div class='col-xs-6'>

                                <select for="" id="izquierda" name="izquierda"  class="form-control">
                                    <option value="">Seleccione</option>

                                </select>
                                {!! $errors->first('izquierda','<span class="alert-danger fade in">:message</span>')!!}
                            </div>
                        </div>
                        <div class=''>
                            <div class='col-xs-6'>
                                <input type="text" id="izquierda2"  name="izquierda2" class="form-control tip" />
                               
                                {!! $errors->first('izquierda2','<span class="alert-danger fade in">:message</span>')!!}
                            </div>
                        </div>
                    </div> -->

                   

                     <!-- agregado -->
                    
                     <!-- agregado -->
                </div>
                        
                <div class="form-group col-xs-12">
                    <label class="control-label col-xs-4 required centro" for="form_cedula">
                        <h5 class="gris"><strong> Uso urbano</strong></h5>
                    </label>
                </div>
                <div class="col-md-4 form-group form-group">
                    <div class="form-group col-xs-12  ">
                        <label class="control-label col-xs-7 required" for="form_estado">Uso Urbano <label class="rojo">*</label></label>
                    <div class=''>
                        <div class='col-xs-12'>
                            <select  id="Urbano" name="urbano"  class="form-control">
                              <option value="">Seleccione</option>  
                              <option value="">Residencial</option>  
                              <option value="">Unifamiliar</option>  
                              <option value="">Comercial</option>  
                              <option value="">Educativo</option>  
                              <option value="">Religioso</option>  
                              <option value="">recreativo</option>  


                            </select>
                            {!! $errors->first('urbano','<span class="alert-danger fade in">:message</span>')!!}
                        </div>
                    </div>                  
                  </div>       
                </div>

        <div class="col-md-4 form-group">

            <div class="form-group col-xs-12 ">
                <label class="control-label col-xs-7 required" for="form_ciudad">Tipo de inmueble <label class="rojo">*</label></label>
                <div class=''>
                    <div class='col-xs-12'>
                        <select  id="mueble" name="mueble"  class="form-control">
                            <option value="">Seleccione</option>
                            <option value="">Aeropuerto</option>  
                            <option value="">Campo Santo</option>  
                            <option value="">Canchas-Centros Deportivos</option>  
                            <option value="">Casa</option>  
                            <option value="">Caseta</option>  
                            <option value="">Centro Comercial</option>  
                            <option value="">Club</option>  
                            <option value="">Colegio</option>  
                            <option value="">Conjunto de Edificios</option>  

                        </select>
                        {!! $errors->first('mueble','<span class="alert-danger fade in">:message</span>')!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 form-group">
            <div class="form-group col-xs-12">
                <label class="control-label col-xs-7 required" for="form_municipio">Nombre/Razón social <label class="rojo">*</label></label>
            
                <div class=''>
                    <div class='col-xs-12'>
                        <input type="text" id="razon"  name="razon" class="form-control tip" />
                       
                        {!! $errors->first('razon','<span class="alert-danger fade in">:message</span>')!!}
                    </div>
                </div>
            </div>

           

             <!-- agregado -->
            
             <!-- agregado -->
        </div>

        <div class="form-group col-xs-12">
            <label class="control-label col-xs-4 required centro" for="form_cedula">
                <h5 class="gris"><strong> Ubicación TAO</strong></h5>
            </label>
        </div>
        <div class="col-md-4 form-group form-group">
            <div class="form-group col-xs-12  ">
                <label class="control-label col-xs-7 required" for="form_estado">Longitud<label class="rojo">*</label></label>
            <div class=''>
                <div class='col-xs-12'>
                    <input type="text" id="longitud"  name="longitud" class="form-control tip" placeholder="el valor debe ser negativo ej.: -1234"  />

                    {!! $errors->first('longitud','<span class="alert-danger fade in">:message</span>')!!}
                </div>
            </div>                  
          </div>   
          
          <div class="form-group col-xs-12  ">
            <label class="control-label col-xs-7 required" for="form_estado">Código TAO<label class="rojo">*</label></label>
        <div class=''>
            <div class='col-xs-12'>
                <input type="text" id="tao"  name="tao" class="form-control tip" />

                {!! $errors->first('tao','<span class="alert-danger fade in">:message</span>')!!}
            </div>
        </div>                  
      </div> 
        </div>

<div class="col-md-4 form-group">

    <div class="form-group col-xs-12 ">
        <label class="control-label col-xs-7 required" for="form_ciudad">Latitud <label class="rojo">*</label></label>
        <div class=''>
            <div class='col-xs-12'>
                <input type="text" id="latitud2"  name="latitud2" class="form-control tip" />

                {!! $errors->first('latitud2','<span class="alert-danger fade in">:message</span>')!!}
            </div>
        </div>
    </div>
</div>
<div class="col-md-4 form-group">
    <div class="form-group col-xs-12">
        <label class="control-label col-xs-7 required" for="form_municipio">Posición <label class="rojo">*</label></label>
    
        <div class=''>
            <div class='col-xs-12'>
                <select  id="posicion" name="posicion"  class="form-control">
                    <option value="">Seleccione</option>
                    <option value="">Frente</option>  
                    <option value="">Derecha</option>  
                    <option value="">Izquierdo</option>  
                    <option value="">Fondo</option>  

                </select>
                {!! $errors->first('posicion','<span class="alert-danger fade in">:message</span>')!!}
            </div>
        </div>
    </div>

   

     <!-- agregado -->
    
     <!-- agregado -->
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
                                <a href="{{ url('/splitters') }}">
                                    <button type="button" class="btn btn-primary" onClick="">Mostrar Todos</button>
                                </a>

                            </div>
                        </div>
                   
                    <!-- fin de la primera parte del formulario-->
                </form>
            </div>
            </div>
        </div>
    </div>
</body>
<script>
    function prueba12(){

        var id = document.getElementById('previo2').value;
    //    alert(id);
       $.ajax({
                type: "get",
                url: "{{url('/splitter2')}}",
                data: {id : id},
                dataType:'json',
                cache: false,
                success: function(data)
             {
                 var capacidad = data[0]['capacidad']
               console.log(capacidad);
               if (capacidad ="1:4") {
                document.getElementById("capacidad").innerHTML = "<select class='form-control'><option value = '1:16'>1:16</option></select>";
                   } if (capacidad ="1:2") {
                    document.getElementById("capacidad").innerHTML = "<select class='form-control'><option value = '1:32'>1:32</option></select>";
                  
               }
             }
        });
    }


    function manga(){
        // $('#mostrar').hide();
        document.getElementById("mostrar").style.display = "none";


            document.getElementById('previo2').options.length = 0;

            var prueba =document.getElementById('previo').value

            // alert(prueba);
            if (prueba==2){
                document.getElementById("nivel").value = 1;

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
                document.getElementById("previo2").innerHTML += "<select class='form-control'><option value = "+datos[i]['id']+">"+ datos[i]['mangas'] +' / '+ datos[i]['cable']+"</option></select>";

             }

        } 
});
            }
            else{
                
          
                // alert('no hola');
                document.getElementById("nivel").value = 2;
                $('#mostrar').show();

                $.ajax({
                type: "get",
                url: "{{url('/splitter1')}}",
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
                document.getElementById("previo2").innerHTML += "<select class='form-control'><option value = "+datos[i]['id']+" >"+ datos[i]['splitter'] + "</option></select>";

             }

        } 
});
               
            }
        }
</script>
<style>
    .centro{
        margin-left: -15px;
    }
</style>
@endsection
