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
			"name="+$("#name").val()+
			"&last="+$("#last").val()+
			"&email="+$("#email").val()+
			"&password="+$("#password").val()+
			"&slc-tipo="+$("#slc-tipo").val();

		$.ajax({
			url:"ajax/acciones_registro_usuario.php?action=save",
			method: "POST",
			data: params,
			success:function(resultado){
				$("#resultado").css("visibility", "visible");
				$("#resultado").html(resultado);
				$("#resultado").fadeOut(3000);
				loadUsers();
			},
			error:function(){
				$("#resultado2").css("visibility", "visible");
				$("#resultado2").html("Ocurrio un error");
			}
		});
	});

	loadUsers();	
});

loadUsers = function(){
	$.ajax({
		url:"ajax/acciones_registro_usuario.php?action=load",
		method: "POST",
		success:function(resultado){
			$("#list-users").html(resultado);
		},
		error:function(){

		}
	});
}

validate = function(){
	var errors = "";
	if($("#name").val() === ""){
		errors += "<b>Nombre</b> vacio<br>";
	}
	if($("#last").val() === ""){
		errors += "<b>Apellido</b> vacio<br>";
	}
		
	if($("#email").val() === ""){
		errors += "<b>Email</b> vacio<br>";
	}
	if($("#password").val() === ""){
		errors += "<b>Contraseña</b> vacio<br>";
	}
	if($("#password2").val() === ""){
		errors += "<b>Confirmar Contraseña</b> vacio<br>";
	}
	if($("#password").val() != $("#password2").val()){
		errors += "<b>Las contraseñas no coinciden!</b>";
	}
	return errors;
}