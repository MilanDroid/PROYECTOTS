
$(document).ready(function(){
	$("#btn-save").click(function(){

		var errors = validate();

		if(!errors == ""){
			$("#resultado2").css("visibility", "visible");
			$("#resultado2").fadeIn(1000);
			$("#resultado2").html(errors);
			$("#resultado2").fadeOut(3000);
			return;
		}

		var params=
			"nombreCapacitacion="+$("#nombreCapacitacion").val()+
			"&descripcion="+$("#descripcion").val()+
			"&nombreTutor="+$("#nombreTutor").val()+
			"&slc-depto="+$("#slc-depto").val()+
			"&fechaInicio="+$("#fechaInicio").val()+
			"&fechaFin="+$("#fechaFin").val()+
			"&centro="+$("#centro").val()+
			"&slc-tipo="+$("#slc-tipo").val()+
			"&horas="+$("#horas").val();

		$.ajax({
			url:"ajax/add_capacitaciones.php?action=save",
			method: "POST",
			data: params,
			success:function(resultado){
				$("#resultado").css("visibility", "visible");
				$("#resultado").html(resultado);
				loadCapacitation();
			},
			error:function(){
				$("#resultado2").css("visibility", "visible");
				$("#resultado2").html("Ocurrio un error");
			}
		});
	});

	loadCapacitation();	
});



loadCapacitation = function(){
	$.ajax({
		url:"ajax/add_capacitaciones.php?action=load",
		method: "POST",
		success:function(resultado){
			$("#list-capacitations").html(resultado);
		},
		error:function(){

		}
	});
}

validate = function(){
	var errors = "";
	if($("#nombreCapacitacion").val() === ""){
		errors += "<b>Nombre Capacitacion</b> vacio<br>";
	}
	if($("#descripcion").val() === ""){
		errors += "<b>Descripcion</b> vacio<br>";
	}
		
	if($("#nombreTutor").val() === ""){
		errors += "<b>Nombre Tutor</b> vacio<br>";
	}
	if($("#fechaInicio").val() === ""){
		errors += "<b>Fecha Inicio</b> vacio<br>";
	}
	if($("#fechaFin").val() === ""){
		errors += "<b>Fecha Fin</b> vacio<br>";
	}
	if($("#centro").val() === ""){
		errors += "<b>Nombre Centro</b> vacio<br>";
	}
	if($("#horas").val() === ""){
		errors += "<b>Duración(Hrs)</b> vacio";
	}
	return errors;
}
