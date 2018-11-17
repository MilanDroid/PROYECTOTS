
$(document).ready(function(){

	$('input[type=radio][name=include]').change(function() {
	    if (this.value == 'N') {
	        $("#div-capacitacion").css("display", "none");
	    }
	    else if (this.value == 'S') {
	        $("#div-capacitacion").css("display", "block");
	    }
	});

	$("#btn-save").click(function(){

		var errors = validate();

		if(!errors == ""){
			$("#resultado2").css("visibility", "visible");
			$("#resultado2").fadeIn(100);
			$("#resultado2").html(errors);
			$("#resultado2").fadeOut(3000);
			return;
		}
		


		var genero = $('input:radio[name=genero]:checked').val();
		var include = $('input:radio[name=include]:checked').val();
		var params=
			"nombre="+$("#nombre").val()+
			"&apellido="+$("#apellido").val()+
			"&identidad="+$("#identidad").val()+
			"&email="+$("#email").val()+
			"&telefono="+$("#telefono").val()+
			"&genero="+genero+
			"&slc-depto="+$("#slc-depto").val()+
			"&centro="+$("#centro").val()+
			"&slc-cargo="+$("#slc-cargo").val()+
			"&slc-nivel="+$("#slc-nivel").val()+
			"&distrito="+$("#distrito").val()+
			"&slc-capacitacion="+$("#slc-capacitacion").val()+
			"&horas="+$("#horas").val();
			
		$.ajax({
			url:"ajax/acciones_registro_maestro.php?action=save",
			method: "POST",
			data: params,
			success:function(resultado){
				$("#resultado").css("visibility", "visible");
				$("#resultado").html(resultado);
			},
			error:function(e){
				$("#resultado2").css("visibility", "visible");
				$("#resultado2").html("Ocurrio un error");
			}
		});
	});

});

validate = function(){
	var errors = "";
	if($("#nombre").val() === ""){
		errors += "<b>Nombre</b> vacio<br>";
	}
	if($("#apellido").val() === ""){
		errors += "<b>Apellido</b> vacio<br>";
	}
	if($("#identidad").val() === ""){
		errors += "<b>Identidad</b> vacio<br>";
	}
	if($("#email").val() === ""){
		errors += "<b>Correo Electrónico</b> vacio<br>";
	}
	if($("#telefono").val() === ""){
		errors += "<b>Telefono</b> vacio<br>";
	}
	if($("#centro").val() === ""){
		errors += "<b>Centro Educativo</b> vacio<br>";
	}
	if($("#distrito").val() === ""){
		errors += "<b>Distrito Educativo</b> vacio<br>";
	}
	if($("#horas").val() === ""){
		errors += "<b>Horas asistidas</b> vacio";
	}
	return errors;
}