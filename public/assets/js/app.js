/* --------------------------------- GPON app ----------------------------------------------------------*/

// import './bootstrap';

// const { forEach } = require("lodash");

// function agregarFila(){

//     var cant_puertos = document.getElementById("cant_puertos").value;


//   document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<td><input type="text" id="puerto_'+rowCount +'" name="puerto_'+rowCount +'" required="required" placeholder="puerto" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td><input type="text" id="Estado_'+rowCount +'" name="Estado_'+rowCount +'" required="required" placeholder="Estado" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td> <select for="form_estado_id" id="estado_id_'+rowCount +'" name="estado_id_'+rowCount +'" required="required" class="form-control"> @foreach($estados->getEstados() as $index => $estado)<option value="{{$index}}"> {{$estado}} </option> @endforeach</select></td>';
// }
function eliminarFila(){
	var table = document.getElementById("tablaprueba");
	var rowCount = table.rows.length;
	//console.log(rowCount);
  
	if(rowCount <= 0)
	  alert('No se puede eliminar el encabezado');
	else
	  table.deleteRow(rowCount -1);
	  // table.in
  }
  
	  function AddToSecondList() {
		  var fl = document.getElementById('firstlist');
		  var sl = document.getElementById('secondlist');
		  for (i = 0; i < fl.options.length; i++) {
			  if (fl.options[i].selected) {
				  sl.add(fl.options[i], null);
			  }
		  }
		  return true;
	  }
  // *********************************************************cambio realizado por jorge omentado colocare otra funcion**************************************************************
  // function admiuplink() 
  // {
	 
  //     if (validar("puerto_uplin") == false){$("#puerto_uplin").focus();	return false;};
  //     $("#formulario_registro").hide();
  //     var cant_puertos = document.getElementById("puerto_uplin").value;
  //     alert(cant_puertos) ;
  //     $.ajax({
  //         url:'10.53.248.146/tipos',
  //         type:'GET'
  //     }).done(function(data){
  //         alert("hola");
  //         for( i = 0;i < cant_puertos;i++) 
  //         {
  //             document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" value="'+i +'" required="required" placeholder="puerto" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td> <input type="checkbox" checked id="estado_'+i +'" name="estado_'+i +'" required="required"  class="form-control tip" /></td><td> <select for="form_estado_id" id="sfp" name="sfp" required="required" class="form-control"><option value=""> Seleccione SFP</option>'; 
  
  //             var spf=data;
  //             var id=sfp[i]['id'];
  //             var nameSfp=sfp[i]['nameSfp'];
  //             document.getElementById("sfp").innerHTML='<option >'+ nameSfp +'</option>';
  
  //             document.getElementById("tablaprueba").innerHTML +='</select></td></tr>';
  //         }
  //     });
	  
  //     $("#formulario_registro_2").show();
  // 	// $('.tip').tooltipster('hide');
  // }
  
  
  function admiuplink() {
	  var i ;
	  // if (validar("puerto_uplin") == false){$("#puerto_uplin").focus();	return false;};
	  $("#formulario_registro").hide();
	  var cant_puertos = document.getElementById("puerto_uplin").value;
	  for( i = 0;i < cant_puertos;i++) {
		  document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" value="'+i +'" required="required" placeholder="puerto" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td><select name="estado_'+i +'" id="estado_'+i +'" class="form-control"><option class="form-control">ACTIVO</option><option >DESACTIVO</option></select></td><td> <select for="form_estado_id" id="sfpt_'+i+'" name="sfpt_'+i+'" required="required" class="form-control"><option value=""> Seleccione SFP</select></td></tr>'; //id="sfpt_'+i +'" name="sfpt_'+i +'"
	  }
			  $.get('sfptup', {
	  }, function(parroquia) {
		  $.each(parroquia, function(index, value) {
			  var cant_puertos = document.getElementById("puerto_uplin").value;
  for( i = 0;i < cant_puertos;i++) {
				  // alert(i) ;
			  $("#sfpt_"+i).append("</option><option value='" + index + "'> " + value + "</option>");
  }
		  })
	  });
	  $("#formulario_registro_2").show();
	  // $('.tip').tooltipster('hide');
  }
  
  
  
  function atraspass() {
	  $("#formulario_registro").show();
	  $("#formulario_registro_2").hide();
		  var table = document.getElementById("tablaprueba");
	  var cant_puertos = document.getElementById("puerto_uplin").value;
	  for( var i = 0;i = cant_puertos;i++) {
			  table.deleteRow(cant_puertos -cant_puertos);
		  }
	  // $('.tip').tooltipster('hide');
  }
  
  function admincables() {
	  //var i ;
	   if (validar("cantidad") == false){$("#cantidad").focus();	return false;};
	  $("#formulario_registro").hide();
	  var cantidad = document.getElementById("cantidad").value;
	 // alert (cantidad);
	  //var sfp = document.getElementByid("sfp");
	  for( i = 0;i<cantidad;i++) {
		  document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" value="Cód '+i +'" readonly required="required" placeholder="puerto" class="form-control tip" maxlength="9"/></td><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" value="'+i +'" required="required" placeholder="puerto" class="form-control tip" maxlength="9"/></td><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" value="'+i +'" required="required" placeholder="puerto" class="form-control tip" maxlength="9"/></td><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" value="ruta '+i +'" required="required" placeholder="puerto" class="form-control tip" maxlength="50"/></td></tr>'; //id="sfpt_'+i +'" name="sfpt_'+i +'"
	  }
			  /*$.get('sfptup', {
	  }, function(parroquia) {
		  $.each(parroquia, function(index, value) {
			  $("select").append("</option><option value='" + index + "'> " + value + "</option>");
  
		  })
	  });*/
	  $("#formulario_registro_2").show();
	  // $('.tip').tooltipster('hide');
  }
  
  
  
  function atraspass() {
	  $("#formulario_registro").show();
	  $("#formulario_registro_2").hide();
		  var table = document.getElementById("tablaprueba");
	  var cant_puertos = document.getElementById("puerto_uplin").value;
	  for( var i = 0;i = cant_puertos;i++) {
			  table.deleteRow(cant_puertos -cant_puertos);
		  }
	  // $('.tip').tooltipster('hide');
  }
  
	  function DeleteSecondListItem() {
		  var fl = document.getElementById('firstlist');
		  var sl = document.getElementById('secondlist');
		  for (i = 0; i < sl.options.length; i++) {
			  if (sl.options[i].selected) {
				  fl.add(sl.options[i], null);
				  // O...
				  // sl.remove(sl.options[i]);
			  }
		  }
		  return true;
	  }
  function def() {
	  
		  if ($('#centralizado').prop('checked')) {
				  // $("#formulario_registro").hide();
				  $('#descentralizado').removeAttr('checked');
				  $("#formulario_registro_3").hide();
	  $("#formulario_registro_2").show();
	  $("#formulario_registro_3").show();
		  }else{
				  $("#formulario_registro").show();
	  $("#formulario_registro_2").hide();
		  }
  }
  //  $(document).ready(function() {
  //         if ($('#centralizado').prop('checked')) {
  //             $('#descentralizado').removeAttr('checked');
  //         }
  //     });
  function defi() {
		  if ($('#descentralizado').prop('checked')) {
				  // $("#formulario_registro").hide();
				  $('#centralizado').removeAttr('checked');
				  $("#formulario_registro_2").hide();
	  $("#formulario_registro_3").show();
		  }else{
				  $("#formulario_registro").show();
	  $("#formulario_registro_3").hide();
		  }
  }
  
  function catastro() {
	   var i ;
	  if (validar("cant_mbx_terminal") == false){$("#cant_mbx_terminal").focus();	return false;};
	  var cant_puertos = document.getElementById("cant_mbx_terminal").value;
	  for( i = 0;i < cant_puertos;i++) {
		  document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr><td><input type="text" id="casa_'+i +'" name="casa_'+i +'" required="required" placeholder="casa" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /></td><td><input type="text" id="Nombre_'+i +'" name="Nombre_'+i +'" required="required" placeholder="Nombre" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos" /></td></tr>';
	  }
	  $("#formulario_registro_4").show();
	  // $('.tip').tooltipster('hide');
  }
  function defPorts() {
	  var i ;
	  if (validar("cant_puertos") == false){$("#cant_puertos").focus();	return false;};
	  $("#formulario_registro").hide();
	  var cant_puertos = document.getElementById("cant_puertos").value;
	  for( i = 0;i < cant_puertos;i++) {
		  // document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" value="'+i +'" required="required" placeholder="puerto" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td><input type="text" id="Estado_'+i +'" name="Estado_'+i +'" required="required" placeholder="Estado" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td> <select for="form_estado_id" id="sfpt_'+i +'" name="sfpt_'+i +'" required="required" class="form-control"><option value=""> Seleccione SFP</select></td></tr>'; //id="sfpt_'+i +'" name="sfpt_'+i +'"
		   document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" required="required" value="'+i +'" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td><select name="estado_'+i +'" id="estado_'+i +'" class="form-control"><option class="form-control">ACTIVO</option><option >DESACTIVO</option></select></td><td> <select for="form_estado_id" id="sfpt_'+i+'" name="sfpt_'+i+'" required="required" class="form-control"><option value=""> Seleccione SFP</select></td></tr>'; //id="sfpt_'+i +'" name="sfpt_'+i +'i
	  }
			  $.get('sfpgp', {
	  }, function(parroquia) {
		  
  
		  $.each(parroquia, function(index, value) {
			  var cant_puertos = document.getElementById("cant_puertos").value;
  for( i = 0;i < cant_puertos;i++) {
				  // alert(i) ;
			  $("#sfpt_"+i).append("</option><option value='" + index + "'> " + value + "</option>");
  }
		  })
	  });
	  $("#formulario_registro_2").show();
	  // $('.tip').tooltipster('hide');
  }
  // function defPorts() {
  //     // var i ;
  //     if (validar("cant_puertos") == false){$("#cant_puertos").focus();	return false;};
  //     $("#formulario_registro").hide();
  //     var cant_puertos = document.getElementById("cant_puertos").value;
  //     // var cant_puertos = (cant_puerto)+1;
  //     for( i = 0 ;i < cant_puertos;i++) {
  //         document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<tr><td><input type="text" id="puerto_'+i +'" name="puerto_'+i +'" required="required" placeholder="'+i+'" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/></td><td><select class="form-control"><option class="form-control">ACTIVO</option><option >DESACTIVO</option></select></td><td> <select for="form_estado_id" id="sfpt_'+i +'" name="sfpt_'+i +'" required="required" class="form-control"><option value=""> Seleccione SFP</select></td></tr>'; //id="sfpt_'+i +'" name="sfpt_'+i +'"
  //     }
  //     // <input type="text" id="Estado_'+i +'" name="Estado_'+i +'" required="required" placeholder="Desactivado" class="form-control tip" maxlength="9" title="Ingresa el número sin puntos"/>
  //     //         $.get('sfpt', {
  //     // }, function(parroquia) {
  //     //     $.each(parroquia, function(index, value) {
  //     //         $("select").append("</option><option value='" + index + "'> " + value + "</option>");
  
  //     //     })
  //     // });
  //     $("#formulario_registro_2").show();
  // 	// $('.tip').tooltipster('hide');
  // }
  
  function paso2() {
	  $("#formulario_registro").hide();
	  $("#formulario_registro_2").show();
	  // $('.tip').tooltipster('hide');
  }
  
  function cargapaso2() {
	  $("#formulario_registro").show();
	  $("#formulario_registro_2").hide();
	  // $('.tip').tooltipster('hide');
  }
  function atraspaso2() {
	  $("#formulario_registro").show();
	  $("#formulario_registro_2").hide();
		  var table = document.getElementById("tablaprueba");
	  var cant_puertos = document.getElementById("cant_puertos").value;
	  for( var i = 0;i = cant_puertos;i++) {
			  table.deleteRow(cant_puertos -cant_puertos);
		  }
	  // $('.tip').tooltipster('hide');
  }
  function paso3() {
	  $("#formulario_registro_2").hide();
	  $("#formulario_registro_3").show();
	  // $('.tip').tooltipster('hide');
  }
  function atraspaso3() {
	  $("#formulario_registro_3").hide();
	  $("#formulario_registro_2").show();
	  // $('.tip').tooltipster('hide');
  }
  
  function paso4() {
	  $("#formulario_registro_3").hide();
	  $("#formulario_registro_4").show();
	  // $('.tip').tooltipster('hide');
  }
  function atraspaso4() {
	  $("#formulario_registro_4").hide();
	  $("#formulario_registro_3").show();
	  // $('.tip').tooltipster('hide');
  }
   $(document).ready(function() {
		  $('#spf_select').on('change', function() {
			  var estado_id = '1';
			  if ($.trim(estado_id) != '') {
				  $.get('sfps', {
  
  
					  estado_id: estado_id
				  }, function(ciudad) {
					  $.each(ciudad, function(index, value) {
						  $('#spf_select').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
  
  
  
	  });
  
  function paso5() {
	  if (validar("prefijo_ced") == false){$("#prefijo_ced").focus();	return false;};
	  if (validar("form_cedula") == false){$("#form_cedula").focus();	return false;};
	  if (validar("form_nombres") == false){$("#form_nombres").focus();	return false;};
	  if (validar("form_apellidos") == false){$("#form_apellidos").focus();	return false;};
	  if (validar("prefijo_tlf_contacto") == false){$("#prefijo_tlf_contacto").focus();	return false;};
	  if (validar("form_tlf_contacto") == false){$("#form_tlf_contacto").focus();	return false;};
	  if (validar("prefijo_tlf_movil") == false){$("#prefijo_tlf_movil").focus();	return false;};
	  if (validar("form_tlf_movil") == false){$("#form_tlf_movil").focus();	return false;};
	  if (validar("form_correo_electronico") == false){$("#form_correo_electronico").focus();	return false;};
	  if (validar("form_usuario") == false){$("#form_usuario").focus();	return false;}; //revisar
	  if (validar("form_contrasena") == false){$("#form_contrasena").focus();	return false;};
	  if (validar("form_confirm_contrasena") == false){$("#form_confirm_contrasena").focus();	return false;};
  
	  $("#formulario_registro_4").hide();
	  $("#formulario_registro_5").show();
	  // $('.tip').tooltipster('hide');
  }
  function atraspaso5() {
	  $("#formulario_registro_5").hide();
	  $("#formulario_registro_4").show();
	  // $('.tip').tooltipster('hide');
  }
  function limpiarForm(){
	  document.getElementById("name_inmueble_client").value ="";
	  document.getElementById("Apto_client").value = "";
	  document.getElementById("calle_client").value ="";
	  document.getElementById("tipo_vivi_client").value = "";
	  document.getElementById("numero_client").value ="";
	  document.getElementById("nombre_vivi_client").value = "";
	  document.getElementById("ciudad_client").value ="";
	  document.getElementById("parroquia_client").value = "";
	  document.getElementById("zona_p_client").value ="";
	  document.getElementById("estado_client").value = "";
	  document.getElementById("municipo_client").value ="";
	  document.getElementById("Urbanizacion_client").value = "";
	  document.getElementById("inmueble_client").value ="";
	  document.getElementById("ubicacion_client").value = "";
	  document.getElementById("correo_electronico").value ="";
	  document.getElementById("usuario").value = "";
	  document.getElementById("form_contrasena").value ="";
	  document.getElementById("form_confirm_contrasena").value = "";
	  document.getElementById("prefijo_tlf_movil").value ="-";
	  document.getElementById("tlf_movil").value = "";
	   document.getElementById("prefijo_tlf_contacto").value ="-";
	  document.getElementById("tlf_contacto").value = "";
	  document.getElementById("cedula").value ="";
	  document.getElementById("nombres").value = "";
	  document.getElementById("apellidos").value ="";
	  document.getElementById("prefijo_ced").value ="-";
  
  }
  function limpiarequi(){
	  document.getElementById("num_Serial").value ="";
	  document.getElementById("model_Product").value = "";
  }
  
  function limpiarConsul(){
	  // $('#estado_id').empty();
	  $('#ciudad_id').empty();
	  $('#municipio_id').empty();
	  $('#parroquia_id').empty();
	  $('#urbanizacion_id').empty();
  
  }
   $(document).ready(function() {
		  $('#central_id').on('change', function() {
			  $('#olt_id').empty();
					  $('#tarjeta_id').empty();
			  //         $('#puerto_id').empty();
					  // $('#odf_id').empty();
			  var central_id = $(this).val();
			  if ($.trim(central_id) != '') {
				  $.get('oltodos', {
					  central_id: central_id
				  }, function(central) {
					  $('#olt_id').empty();
					  $('#tarjeta_id').empty();
					  // $('#parroquia_id').empty();
					  // $('#odf_id').empty();
					  $('#olt_id').append("<option value=''> Seleccione una ciudad</option>");
  
					  $.each(central, function(index, value) {
						  $('#olt_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
	  $(document).ready(function() {
		  $('#olt_id').on('change', function() {
			  //         $('#tajeta').empty();
			  //         $('#puerto_id').empty();
					  $('#id_targetPort').empty();
			  var olt_id = $(this).val();
			  if ($.trim(olt_id) != '') {
				  $.get('tartodos', {
					  olt_id: olt_id
				  }, function(central) {
					  // $('#municipio_id').empty();
					  // $('#parroquia_id').empty();
					  $('#id_targetPort').empty();
					  $('#id_targetPort').append("<option value=''> Seleccione una ciudad</option>");
  
					  $.each(central, function(index, value) {
						  $('#id_targetPort').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
  
		  $(document).ready(function() {
		  $('#id_targetPort').on('change', function() {
			  //         $('#tajeta').empty();
			  //         $('#puerto_id').empty();
					  $('#puerto_id').empty();
			  var id_targetPort = $(this).val();
			  if ($.trim(id_targetPort) != '') {
				  $.get('porttodos', {
					  id_targetPort: id_targetPort
				  }, function(central) {
					  // $('#municipio_id').empty();
					  // $('#parroquia_id').empty();
					  $('#puerto_id').empty();
					  $('#puerto_id').append("<option value=''> Seleccione una ciudad</option>");
  
					  $.each(central, function(index, value) {
						  $('#puerto_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
  
	   $(document).ready(function() {
		  $('#central_id').on('change', function() {
			  //         $('#tajeta').empty();
			  //         $('#puerto_id').empty();
					  $('#odf_id').empty();
			  var central_id = $(this).val();
			  if ($.trim(central_id) != '') {
				  $.get('odftodos', {
					  central_id: central_id
				  }, function(central) {
					  // $('#municipio_id').empty();
					  // $('#parroquia_id').empty();
					  $('#odf_id').empty();
					  $('#odf_id').append("<option value=''> Seleccione una ciudad</option>");
  
					  $.each(central, function(index, value) {
						  $('#odf_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
	  
   $(document).ready(function() {
		  $('#estado_id').on('change', function() {
			  $('#ciudad_id').empty();
					  $('#municipio_id').empty();
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
			  var estado_id = $(this).val();
			  if ($.trim(estado_id) != '') {
				  $.get('ciudades', {
					  estado_id: estado_id
				  }, function(ciudad) {
					  $('#ciudad_id').empty();
					  $('#municipio_id').empty();
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
					  $('#ciudad_id').append("<option value=''> Seleccione una ciudad</option>");
  
					  $.each(ciudad, function(index, value) {
						  $('#ciudad_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
  
  
  
	  });
  
	  $(document).ready(function() {
		  $('#ciudad_id').on('change', function() {
			  $('#municipio_id').empty();
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
			  var ciudad_id = $(this).val();
			  if ($.trim(estado_id) != '') {
				  $.get('municipios', {
					  ciudad_id: ciudad_id
				  }, function(municipio) {
					  $('#municipio_id').empty();
					   $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
					  $('#municipio_id').append("<option value=''> Seleccione un municipio</option>");
  
					  $.each(municipio, function(index, value) {
						  $('#municipio_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
  
	  $(document).ready(function() {
		  $('#municipio_id').on('change', function() {
			  $('#urbanizacion_id').empty();
			  var municipio_id = $(this).val();
			  if ($.trim(municipio_id) != '') {
				  $.get('parroquias', {
					  municipio_id: municipio_id
				  }, function(parroquia) {
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
					  $('#parroquia_id').append("<option value=''> Seleccione una parroquia</option>");
  
					  $.each(parroquia, function(index, value) {
						  $('#parroquia_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
	  $(document).ready(function() {
		  $('#parroquia_id').on('change', function() {
			  var parroquia_id = $(this).val();
			  if ($.trim(parroquia_id) != '') {
				  $.get('urbanizaciones', {
					  parroquia_id: parroquia_id
				  }, function(urbanizacion) {
					  $('#urbanizacion_id').empty();
					  $('#urbanizacion_id').append("<option value=''> Seleccione urbanización/Sector</option>");
  
					  $.each(urbanizacion, function(index, value) {
						  $('#urbanizacion_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
  
	  $(document).ready(function() {
		  $('#urbanizacion_id').on('change', function() {
			  var urbanizacion_id = $(this).val();
			  if ($.trim(urbanizacion_id) != '') {
				  $('#btn-consul_p').removeAttr('disabled');
			  }
		  });
	  });
  
  
	  $(document).ready(function(){
	  var conteo = 0; // definimos una variable para verificar el estado del click
	 $("#show_pass").click(function(){
	  if(conteo == 0) { //Si la variable es igual a 0
		  conteo = 1; //La cambiamos a 1
		  $('#form_contrasena').removeAttr("type", "password"); //Removemos el atributo de Tipo Contraseña
		  $("#form_contrasena").prop("type", "text"); //Agregamos el atributo de Tipo Texto(Para que se vea la Contraseña escrita)
		  $('#form_confirm_contrasena').removeAttr("type", "password"); //Removemos el atributo de Tipo Contraseña
		  $("#form_confirm_contrasena").prop("type", "text"); //Agregamos el atributo de Tipo Texto(Para que se vea la Contraseña escrita)
		  $("#eye").css("color" , "red");
	  }
	  else{ //En caso contrario
		  conteo = 0; //La cambiamos a 0
		  $('#form_contrasena').removeAttr("type", "text"); //Removemos el atributo de Tipo Texto
		  $("#form_contrasena").prop("type", "password"); //Agregamos el atributo de Tipo Contraseña
		  $('#form_confirm_contrasena').removeAttr("type", "text"); //Removemos el atributo de Tipo Texto
		  $("#form_confirm_contrasena").prop("type", "password"); //Agregamos el atributo de Tipo Contraseña
		  $("#eye").css("color" , "#666");
	  }
  
		  $(this).attr('src', '../img/empresas.png');//cambia de imagen en el over
	 });
  });
  
  
  var tabla;
  
  // function listar()
  $(document).ready(function () {
	  tabla=$('#tbllistado').dataTable(
	  {
		  "aProcessing": true,//Activamos el procesamiento del datatables
		  "aServerSide": true,//Paginación y filtrado realizados por el servidor
		  dom: 'Bfrtip',//Definimos los elementos del control de tabla
		  buttons: [
					  'copyHtml5',
					  'excelHtml5',
					  'csvHtml5',
					  'pdf'
				  ],
		  // // "ajax":
		  // // 		{
		  // // 			url: 'centrals',
		  // // 			type : "get",
		  // // 			dataType : "json",
		  // // 			error: function(e){
		  // // 				console.log(e.responseText);
		  // // 			}
		  // // 		},
  
		  // "ajax":
		  //         "centrals",
		  //         "colums": [{
		  //             data: 'codigo_central'},
		  //         {data:'name_central'}
		  //     ],
		  "bDestroy": true,
		  "iDisplayLength": 3,//Paginación
		  "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
		  });
	  // }).DataTable();
  });
  
  var tablaorden;
  
  // function listar()
  // $(document).ready(function () {
	  // tablaorden=$('#tbllistadoorden').dataTable(
	  // {
	  // 	"aProcessing": true,//Activamos el procesamiento del datatables
	  //     "aServerSide": true,//Paginación y filtrado realizados por el servidor
	  //     dom: 'Bfrtip',//Definimos los elementos del control de tabla
	  //     buttons: [
	  // 	            // 'copyHtml5',
	  // 	            // 'excelHtml5',
	  // 	            // 'csvHtml5',
	  // 	            // 'pdf'
	  // 	        ],
	  // 	"ajax":
	  // 			{
	  // 				url: '/GPON/public/ordenes/all',
	  // 				type : "get",
	  // 				dataType : "json",
	  // 				error: function(e){
	  // 					console.log(e.responseText);
	  // 				}
	  //     		},
  
	  // 	"ajax":
	  //             "centrals",
	  //             "colums": [{
	  //                 data: 'codigo_central'},
	  //             {data:'name_central'}
	  //         ],
	  // 	"bDestroy": true,
	  // 	"iDisplayLength": 3,//Paginación
	  //     "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
	  //     });
	  // }).DataTable();
  // data = $(this).serialize();
  //     $.get('/GPON/public/ordenes/all',data,function (search) {
  //         $('#tbody').html('');
  //         $.each(search,function (key,val) {
  //            $.get('#tbody').append('<tr><td>'+val.orden+'</td>'+
  //                 '<td>'+val.orden+'</td>'+
  //                 '<td>'+val.cuenta_contrato+'/<td>'+
  //                 '<td>'+val.rif_O_Cedula+'</td>'+
  //                 '<td>'+val.serial+'</td>'+
  //                 '<td>'+val.creado+'</td>'+
  //                 '<td>'+val.asignado+'</td>'+
  //                 '<td>'+val.cola+'</td>'+
  //                 '<td>'+val.estado+'</td>'+
  //                 '<td>'+val.tipo+'</td>');
  
  //         });
  
  
  //     });
  // });
  
  // function buscarorden() {
  //     // $(document).ready(function () {
  //     //     $.ajax({
  //     //         url: '/ordenes/all',
  //     //         method: 'POST',
  //     //         data: $("#formulario_registro_orden").serialize()
  //     //     }).done(function (res) {
  //     //         alert(res);
  //     //     })
  
  //     // })çalert('hola');
  
  //     var datos = $("#formulario_registro_orden").serialize();
  //     $.ajax({
  //         data : datos,
  //         url: '/ordenes/all',
  //         method : 'POST',
  
  
  //     }).done(function (res) {
  //         	tablaorden=$('#tbllistadoorden').dataTable(
  // 	{
  // 		"aProcessing": true,//Activamos el procesamiento del datatables
  // 	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
  // 	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
  // 	    buttons: [
  // 		            // 'copyHtml5',
  // 		            // 'excelHtml5',
  // 		            // 'csvHtml5',
  // 		            // 'pdf'
  // 		        ],
  // 		// // "ajax":
  // 		// // 		{
  // 		// // 			url: 'centrals',
  // 		// // 			type : "get",
  // 		// // 			dataType : "json",
  // 		// // 			error: function(e){
  // 		// // 				console.log(e.responseText);
  // 		// // 			}
  //         // // 		},
  
  // 		"ajax":
  //                 "centrals",
  //                 "colums": [{
  //                     data: 'orden'},
  //                 {data:'cuenta_contrato'}
  //             ],
  // 		"bDestroy": true,
  // 		"iDisplayLength": 3,//Paginación
  //         "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
  //         });
  // 	// }).DataTable();
  
  //     })
  
  // }
  
  function buscarorden() {
  
  }
  
  // $(document).ready(function () {
  //     $('#listadoregistros').hide();
  //     })
  
	  $('#buscarorden').click(function name(params) {
		  $('#listadoregistros').show();
	  data = $(this).serialize();
		  $.ajax({
			  url: '/GPON/public/ordenes/all',
			  method: 'GET',
			  // data: $("#formulario_registro_orden").serialize()
			  data : data,
		  }).done(function (res) {
			  // alert(res);
			  var arrreglo = JSON.parse(res);
  
			  for (let x = 0; x < arrreglo.length; x++) {
				  var element = '<tr><td>'+arrreglo[x].orden+'</td>';
  
				  element += '<td>'+arrreglo[x].cuenta_contrato+'/<td>';
				  element += '<td>'+arrreglo[x].rif_O_Cedula+'</td>';
				  element += '<td>'+arrreglo[x].serial+'</td>';
				  element += '<td>'+arrreglo[x].created_at+'</td>';
				  element += '<td>'+arrreglo[x].creado+'</td>';
				  element += '<td>'+arrreglo[x].asignado+'</td>';
				  element += '<td>'+arrreglo[x].created_at+'</td>';
				  element += '<td>'+arrreglo[x].cola+'</td>';
				  element += '<td>'+arrreglo[x].estado+'</td>';
				  element += '<td>'+arrreglo[x].tipo+'</td>';
  
				  $("#tbody").append(element);
  
  
			  }
		  })
	  })
  
  
  $(document).ready(function() {
		  $('#estado_id').on('change', function() {
			  $('#ciudad_id').empty();
					  $('#municipio_id').empty();
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
			  var estado_id = $(this).val();
			  if ($.trim(estado_id) != '') {
				  $.get('ciudadesedit', {
					  estado_id: estado_id
				  }, function(ciudad) {
					  $('#ciudad_id').empty();
					  $('#municipio_id').empty();
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
					  $('#ciudad_id').append("<option value=''> Seleccione una ciudad</option>");
  
					  $.each(ciudad, function(index, value) {
						  $('#ciudad_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
  
  
  
	  });
  
	  $(document).ready(function() {
		  $('#ciudad_id').on('change', function() {
			  $('#municipio_id').empty();
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
			  var ciudad_id = $(this).val();
			  if ($.trim(estado_id) != '') {
				  $.get('municipios', {
					  ciudad_id: ciudad_id
				  }, function(municipio) {
					  $('#municipio_id').empty();
					   $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
					  $('#municipio_id').append("<option value=''> Seleccione un municipio</option>");
  
					  $.each(municipio, function(index, value) {
						  $('#municipio_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
  
	  $(document).ready(function() {
		  $('#municipio_id').on('change', function() {
			  $('#urbanizacion_id').empty();
			  var municipio_id = $(this).val();
			  if ($.trim(municipio_id) != '') {
				  $.get('parroquias', {
					  municipio_id: municipio_id
				  }, function(parroquia) {
					  $('#parroquia_id').empty();
					  $('#urbanizacion_id').empty();
					  $('#parroquia_id').append("<option value=''> Seleccione una parroquia</option>");
  
					  $.each(parroquia, function(index, value) {
						  $('#parroquia_id').append("<option value='" + index + "'> " + value + "</option>");
					  })
				  });
			  }
		  });
	  });
  function listar()
  {
	  var cant_puertos = document.getElementById("cant_puertos").value;
			  $.get('sfpt', {
	  }, function(parroquia) {
		  $.each(parroquia, function(index, value) {
			  // var table = document.getElementById("tablaprueba");
			  // var rowCount = table.rows;
			  // var cant_puertos = document.getElementById("cant_puertos").value;
  //   for( var i = 0;i = cant_puertos;i++) {
  
  
			  $("#sfpt_").append("</option><option value='" + index + "'> " + value + "</option>");
  // }
		  })
	  });
  
  }
  