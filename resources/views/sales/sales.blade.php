@extends('layouts.app')

@section('content')
@inject('estados', 'App\Services\estados')

<body class="container">

    <div class="main-container container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <form name="form" method="post" class="form-horizontal" action="{{url('/sales')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- inicio primera parte del formulario-->
                    <div id="formulario_registro">

                        <!-- datos personales-->
                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>

                            <h3 class="gris"> <strong>Consultar disponibilidad</strong></h3>
                            <hr />
                            <p class="label-inf">Completa todos los campos del formulario con los datos solicitados.</p>
                            <hr />

                        </div>
                        <!-- <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12 right'>
                            <span class="badge pull-center  numero_formulario_registro">1</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">2</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">3</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">4</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">5</span>
                        </div> -->
                        <div class="aside">
                            @include('layouts.menu_left')
                        </div>

                        <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8 col-xs-offset-1 col-md-offset-1 col-sm-offset-1'>
                            <div class='form-group col-xs-12'>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Ventas</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Ventas del producto</li>
                                    </ol>
                                    <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12 right'>
                                        <span class="badge pull-center  numero_formulario_registro">1</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">2</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">3</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">4</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">5</span>
                                    </div>
                                </nav>
                            </div>

                            <div class="form-group col-xs-12  ">
                                <label class="control-label col-xs-6 required" for="form_estado">Estado <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="form_estado_id" id="estado_id" name="estado_id" required="required" class="form-control {{-- $errors->has('estado_id') ? 'has-error' : '' --}}">
                                            <!-- <option> Selecciona</option> -->
                                            @foreach($estados->getEstados() as $index => $estado)
                                            <option value="{{$index}}">{{$estado}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12 ">
                                <label class="control-label col-xs-6 required" for="form_ciudad">Ciudad <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="form_ciudad_id" id="ciudad_id" name="ciudad_id" required="required" class="form-control">


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_municipio">Municipio <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="form_municipio_id" id="municipio_id" name="municipio_id" required="required" class="form-control">


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_parroquia">Parroquia <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="form_parroquia_id" id="parroquia_id" name="parroquia_id" required="required" class="form-control">


                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-6 required" for="form_urbanizacion">Urbanización / Sector <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-6'>
                                        <select for="form_urbanizacion_id" id="urbanizacion_id" name="urbanizacion_id" required="required" class="form-control">


                                        </select>
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
                                <!-- <a href="{{ url('/ZonaSale') }}">
                                    <button type="button" class="btn btn-primary" id="btn-consul_p" onClick="">Consultar</button>
                                </a> -->
                                <button type=" submit" class="btn btn-primary" id="btn-consul_p" onClick="paso2()">Consultar</button>
                                <button type="button" class="btn btn-primary" onClick="limpiarConsul()">Limpiar</button>
                            </div>
                        </div>
                    </div>
                    <!-- fin de la primera parte del formulario-->
                    <!-- inicio de la segunda parte del formulario-->
                    <div class='' id="formulario_registro_2">
                        <!-- Datos de seguridad-->
                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-center  numero_formulario_registro_out">1</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro">2</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">3</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">4</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">5</span> -->
                            <h3 class="gris"> <strong>Seleccionar producto</strong></h3>
                            <hr />
                            <p class="label-inf">Completa todos los campos del formulario con los datos solicitados.</p>

                            <hr />
                        </div>
                        <div class="aside">
                            @include('layouts.menu_left')
                        </div>



                        <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8 col-xs-offset-1 col-md-offset-1 col-sm-offset-1'>
                            <div class='form-group col-xs-12'>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Ventas</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Ventas del producto</li>
                                    </ol>
                                    <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12 right'>
                                        <span class="badge pull-center  numero_formulario_registro_out">1</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro">2</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">3</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">4</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">5</span>
                                    </div>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_producto_1">Fibra Empresarial <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-1'>
                                        <!-- <input type="checkbox" id="producto_1" name="producto_1" required="required" placeholder="Fibra Empresarial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /> -->
                                        <input type="checkbox" id="producto_1" name="producto_1" class="form-control tip" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_producto_2">Fibra Ultra <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-1'>
                                        <!-- <input type="text" id="producto_2" name="producto_2" required="required" placeholder="Fibra Ultra" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /> -->
                                        <input type="checkbox" id="producto_2" name="producto_2" class="form-control tip" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                            <hr />
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 col-xl-4  form-group">
                            <p>(*)Campo obligatorio.</p>
                            <div class="form-group  pull-right">
                                <button type="button" class="btn btn-primary" onClick="paso3()">Siguiente</button>
                                <button type="button" class="btn btn-primary" onClick="atraspaso2()">Atrás</button>
                            </div>
                        </div>
                    </div>
                    <!-- fin de la segunda parte del formulario-->
                    <!-- inicio de la tercera parte del formulario-->
                    <div class='' id="formulario_registro_3">
                        <!-- Datos de seguridad-->
                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-center  numero_formulario_registro_out">1</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">2</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro">3</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">4</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">5</span> -->
                            <h3 class="gris"> <strong>Seleccionar Plan</strong></h3>
                            <hr />
                            <p class="label-inf">Completa todos los campos del formulario con los datos solicitados.</p>

                            <hr />
                        </div>
                        <div class="aside">
                            @include('layouts.menu_left')
                        </div>
                        <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8 col-xs-offset-1 col-md-offset-1 col-sm-offset-1'>
                            <div class='form-group col-xs-12'>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Ventas</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Ventas del producto</li>
                                    </ol>
                                    <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12 right'>
                                        <span class="badge pull-center  numero_formulario_registro_out">1</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">2</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro">3</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">4</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">5</span>
                                    </div>
                                </nav>
                            </div>
                            <label class="control-label col-xs-4 required" for="">
                                <h5 class="gris"><strong> Producto fibra Ultra</strong></h5>
                            </label>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_plan_1">Plan 1 <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-1'>
                                        <!-- <input type="text" id="plan_1" name="plan_1" required="required" placeholder="Plan 1" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /> -->
                                        <input type="checkbox" id="plan_1" name="plan_1" class="form-control tip" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_plan_2">Plan 2 <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-1'>
                                        <!-- <input type="text" id="plan_2" name="plan_2" required="required" placeholder="Plan 2" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /> -->
                                        <input type="checkbox" id="plan_2" name="plan_2" class="form-control tip" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                            <hr />
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-xl-4  form-group">
                            <p>(*)Campo obligatorio.</p>
                            <div class="form-group  pull-right">
                                <button type="button" class="btn btn-primary" onClick="paso4()">Siguiente</button>
                                <button type="button" class="btn btn-primary" onClick="atraspaso3()">Atrás</button>
                            </div>
                        </div>
                    </div>
                    <!-- fin de la tercera parte del formulario-->
                    <!-- inicio de la cuarta parte del formulario-->
                    <div class='' id="formulario_registro_4">
                        <!-- Datos de seguridad-->
                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-center  numero_formulario_registro_out">1</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">2</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">3</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro">4</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">5</span> -->
                            <h3 class="gris"> <strong>Datos personales</strong></h3>
                            <hr />
                            <p class="label-inf">Completa todos los campos del formulario con los datos solicitados.</p>

                            <hr />
                        </div>
                        <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8'>
                            <div class='form-group col-xs-12 col-sm-12 col-md-12 col-xl-12 '>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Ventas</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Ventas del producto</li>
                                    </ol>
                                    <div class='form-group col-xs-12 pull-right'>
                                        <span class="badge pull-center  numero_formulario_registro_out">1</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">2</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">3</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro">4</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">5</span>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <label class="control-label col-xs-4 required" for="Datos_personales">
                                <h5 class="gris"><strong> Datos personales</strong></h5>
                            </label>
                        </div>

                        <div class='col-xs-12 col-sm-12 col-md-6 col-xl-6'>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Cédula <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-2'>
                                        <select id="prefijo_ced" name="prefijo_ced" class="form-control required">
                                            <option value="">-</option>
                                            <option value="V">V</option>
                                            <option value="E">E</option>
                                        </select>
                                        <!---<input type="text" id="prefijo" class="form-control" maxlength="1"/>-->
                                    </div>
                                    <div class='col-xs-6'>
                                        <input type="text" id="form_cedula" name="cedula" required="required" placeholder="Ej.: 12345678" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_nombres">Nombres <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'><input type="text" id="form_nombres" name="nombres" required="required" placeholder="Primer y segundo nombre" class="form-control tip" maxlength="20" title="Ingresa solo caracteres alfabéticos" /></div>

                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_apellidos">Apellidos <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class="col-xs-8"><input type="text" id="form_apellidos" name="apellidos" required="required" placeholder="Primer y segundo apellido" class="form-control tip" maxlength="25" title="Ingresa solo caracteres alfabéticos" /></div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_telefono_contacto">Teléfono Nº 1 <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-3'>
                                        <select id="prefijo_tlf_contacto" name="prefijo_tlf_contacto" class="form-control required">
                                            <option value="">-</option>
                                            <option value="416">416</option>
                                            <option value="426">426</option>
                                            <option value="414">414</option>
                                            <option value="424">424</option>
                                            <option value="412">412</option>

                                        </select>
                                        <!---<input type="text" id="prefijo" class="form-control" maxlength="1"/>-->
                                    </div>
                                    <div class="col-xs-5">
                                        <input type="text" id="form_tlf_contacto" name="tlf_contacto" required="required" placeholder=" Ej: 1234567" class="form-control tip" maxlength="7" title="Ingresa el número de teléfono sin puntos" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_telefono_contacto2"> Teléfono Nº 2 <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-3'>
                                        <select id="prefijo_tlf_movil" name="prefijo_tlf_movil" class="form-control required">
                                            <option value="">-</option>
                                            <option value="416">416</option>
                                            <option value="426">426</option>
                                            <option value="414">414</option>
                                            <option value="424">424</option>
                                            <option value="412">412</option>
                                        </select>
                                        <!---<input type="text" id="prefijo" class="form-control" maxlength="1"/>-->
                                    </div>
                                    <div class="col-xs-5">
                                        <input type="text" id="form_tlf_movil" name="tlf_movil" required="required" placeholder=" Ej: 1234567" class="form-control tip" maxlength="7" title="Ingresa el número de celular sin puntos. Este dato nos permitirá garantizar la seguridad de tu cuenta" />
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- fin del lado izquierdo del formulario -->

                        <div class='col-xs-12 col-sm-12 col-md-6 col-xl-6'>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_correo_electronico">Correo electrónico <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class="col-xs-8">
                                        <input type="text" id="form_correo_electronico" name="correo_electronico" required="required" placeholder="Ingrese su correo electrónico" class="form-control tip" maxlength="50" title="Puedes utilizar letras, números y puntos. Ejemplo: identificador@dominio.com" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_usuario">Usuario <label class="rojo">*</label></label>
                                <div class="col-xs-8">
                                    <input type="text" id="form_usuario" name="usuario" required="required" placeholder="usuario para ingresar a la aplicación" class="form-control tip" maxlength="25" title="Puedes usar un mínimo de 8 caracteres que incluyan letras, números y símbolos distintos a @" />
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_contrasena">Contraseña <label class="rojo">*</label></label>
                                <div class="col-xs-8">
                                    <input type="password" id="form_contrasena" name="contrasena" required="required" placeholder="Ingrese su contraseña" class="form-control tip" maxlength="25" title="Tu contraseña debe poseer las siguientes  características:  Un mínimo de 8 caracteres con una letra mayúscula Una letra minúscula Un número Un carácter especial distinto al @ y no repetir dos iguales ni consecutivos" />
                                    <!-- <input type="password" id="form_contrasena" name="contrasena" required="required" placeholder="Ingrese su contraseña" pattern="^[A-Za-zñÑáÁéÉíÍóÓúÚ0\b ]+$" class="form-control tip" maxlength="25" title="Tu contraseña debe poseer las siguientes  características:  Un mínimo de 8 caracteres con una letra mayúscula Una letra minúscula Un número Un carácter especial distinto al @ y no repetir dos iguales ni consecutivos" /> -->
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_confirm_contrasena">Confirmar contraseña <label class="rojo">*</label></label>
                                <div class="col-xs-8">
                                    <input type="password" id="form_confirm_contrasena" name="confirm_contrasena" required="required" placeholder="Confirmación de contraseña" class="form-control tip" maxlength="25" title="Debe coincidir con el campo anterior" />
                                    <!-- <input type="password" id="form_confirm_contrasena" name="confirm_contrasena" required="required" placeholder="Confirmación de contraseña" pattern="^[A-Za-zñÑáÁéÉíÍóÓúÚ0\b ]+$" class="form-control tip" maxlength="25" title="Debe coincidir con el campo anterior" /> -->
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <p id="show_pass"> Mostrar contraseñas &nbsp;&nbsp;&nbsp;&nbsp;<span id="eye" style="cursor:pointer;" class="fa fa-eye fa-2x tip" title="Click para mostrar las contraseñas"></span></p>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <hr />
                        </div>
                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <label class="control-label col-xs-4 required" for="form_cedula">
                                <h5 class="gris"><strong> Dirección</strong></h5>
                            </label>
                        </div>


                        <div class='col-xs-12 col-sm-12 col-md-6 col-xl-6'>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_estado_client">Estado <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'><input type="text" id="estado_client" name="estado_client" required="required" placeholder="Estado" class="form-control tip" maxlength="20" title="Ingresa solo caracteres alfabéticos" /></div>

                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_municipo_client">Municipo <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'><input type="text" id="municipo_client" name="municipo_client" required="required" placeholder="Municipio" class="form-control tip" maxlength="20" title="Ingresa solo caracteres alfabéticos" /></div>

                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_Urbanizacion_client">Urbanización <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'><input type="text" id="Urbanizacion_client" name="Urbanizacion_client" required="required" placeholder="Urbanización" class="form-control tip" maxlength="20" title="Ingresa solo caracteres alfabéticos" /></div>

                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_Inmueble_client">Tipo de inmueble <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class="col-xs-8">
                                        <!--<input type="text" id="form_Inmueble_client" name="Inmueble_client" required="required" placeholder="Primer y segundo apellido" class="form-control tip" maxlength="25" title="Ingresa solo caracteres alfabéticos" /></div> -->
                                        <select id="inmueble_client" name="inmueble_client" class="form-control required">
                                            <option value="">-</option>
                                            <option value="Departamento">Departamento</option>
                                            <option value="Casa">Casa</option>
                                            <option value="Alquiler">Alquiler</option>
                                            <option value="Habitación">Habitación</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_Inmueble_client">Ubicación/Piso <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class="col-xs-8"><input type="text" id="ubicacion_client" name="ubicacion_client" required="required" placeholder="Ubicación/Piso" class="form-control tip" maxlength="25" title="Ingresa solo caracteres alfabéticos" /></div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_Inmueble_client">Número <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class="col-xs-8"><input type="text" id="numero_client" name="numero_client" required="required" placeholder="Número" class="form-control tip" maxlength="25" title="Ingresa solo caracteres alfabéticos" /></div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_telefono_contacto">Nombre <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <!-- <select id="form_tipo_vivi_client" name="prefijo_tlf_contacto" class="form-control required">
                                            <option value="">-</option>
                                            <option value="416">416</option>
                                            <option value="426">426</option>
                                            <option value="414">414</option>
                                            <option value="424">424</option>
                                            <option value="412">412</option>
                                        </select> -->
                                        <input type="text" id="nombre_vivi_client" name="nombre_vivi_client" required="required" placeholder="Nombre" class="form-control tip" maxlength="25" title="Ingresa solo caracteres alfabéticos" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- fin del lado izquierdo del formulario -->

                        <div class='col-xs-12 col-sm-12 col-md-6 col-xl-6'>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_ciudad_client">Ciudad <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'><input type="text" id="ciudad_client" name="ciudad_client" required="required" placeholder="Ciudad" class="form-control tip" maxlength="20" title="Ingresa solo caracteres alfabéticos" /></div>

                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_parroquia_client">Parroquia <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'><input type="text" id="parroquia_client" name="parroquia_client" required="required" placeholder="Parroquia" class="form-control tip" maxlength="20" title="Ingresa solo caracteres alfabéticos" /></div>

                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_zona_p_client">Zona Postal <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'><input type="text" id="zona_p_client" name="zona_p_client" required="required" placeholder="Zona Postal" class="form-control tip" maxlength="20" title="Ingresa solo caracteres alfabéticos" /></div>

                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_name_inmueble_client">Nombre del inmueble <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class="col-xs-8"><input type="text" id="name_inmueble_client" name="name_inmueble_client" required="required" placeholder="Nombre del inmueble" class="form-control tip" maxlength="25" title="Ingresa solo caracteres alfabéticos" /></div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_telefono_contacto">Apto / Local <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <select id="Apto_client" name="Apto_client" class="form-control required">
                                            <option value="">-</option>
                                            <option value="Cortijos">Cortijos</option>
                                            <option value="Nea">Nea</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_telefono_contacto">Av / Calle <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <select id="calle_client" name="calle_client" class="form-control required">
                                            <option value="">-</option>
                                            <option value="Edificio">Edificio Cantv</option>
                                            <option value="Nea">Nea</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_telefono_contacto">Tipo de vivienda <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <select id="tipo_vivi_client" name="tipo_vivi_client" class="form-control required">
                                            <option value="">-</option>
                                            <option value="Departamento">Departamento</option>
                                            <option value="Casa">Casa</option>
                                            <option value="Alquiler">Alquiler</option>
                                            <option value="Habitación">Habitación</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                            <hr />
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 col-xl-4  form-group">
                            <p>(*)Campo obligatorio.</p>
                            <div class="form-group  pull-right">
                                <button type="button" class="btn btn-primary" onClick="paso5()">Siguiente</button>
                                <button type="button" class="btn btn-primary" onClick="limpiarForm()">Limpiar</button>
                                <button type="button" class="btn btn-primary" onClick="atraspaso4()">Atrás</button>
                            </div>
                        </div>
                    </div>
                    <!-- fin de la cuarta parte del formulario-->
                    <!-- inicio de la quinta parte del formulario-->
                    <div class='' id="formulario_registro_5">
                        <!-- Datos de seguridad-->
                        <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12'>
                            <!-- <span class="badge pull-center  numero_formulario_registro_out">1</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">2</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">3</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">4</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro">5</span> -->
                            <h3 class="gris"> <strong>Datos del equipo</strong></h3>
                            <hr />
                            <p class="label-inf">Completa todos los campos del formulario con los datos solicitados.</p>

                            <hr />
                        </div>
                        <div class="aside">
                            @include('layouts.menu_left')
                        </div>
                        <div class='col-xs-8 col-sm-8 col-md-8 col-xl-8 col-xs-offset-1 col-md-offset-1 col-sm-offset-1'>
                            <div class='form-group col-xs-12'>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Ventas</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Ventas del producto</li>
                                    </ol>
                                    <div class='col-xs-12 col-sm-12 col-md-12 col-xl-12 right'>
                                        <span class="badge pull-center  numero_formulario_registro_out">1</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">2</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">3</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro_out">4</span><span class="badge pull-center numero_formulario_registro_line"> </span><span class="badge pull-center numero_formulario_registro">5</span>
                                    </div>
                                </nav>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Número de serial <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="num_Serial" name="num_Serial" required="required" placeholder="Puerto de servicio inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label class="control-label col-xs-4 required" for="form_cedula">Modelo <label class="rojo">*</label></label>
                                <div class=''>
                                    <div class='col-xs-8'>
                                        <input type="text" id="model_Product" name="model_Product" required="required" placeholder="Puerto de servicio inicial" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                            <hr />
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-xl-4  form-group">
                            <p>(*)Campo obligatorio.</p>
                            <div class="form-group  pull-right">

                                <button type="submit" class="btn btn-primary" onClick="">Registrar</button>
                                <button type="button" class="btn btn-primary" onClick="limpiarequi()">Limpiar</button>
                                <button type="button" class="btn btn-primary" onClick="atraspaso5()">Atrás</button>
                            </div>
                        </div>
                    </div>
                    <!-- fin de la quinta parte del formulario-->
                </form>
            </div>
        </div>
    </div>
</body>
@endsection

@section('script')
<script>
    $('#btn-consul_p').attr('disabled', 'disabled');
</script>

@endsection
