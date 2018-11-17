$(document).ready( function(){

	$("#btn-login").click(function(){
		var params = "email=" +$("#email").val() + "&password="+$("#password").val();
		$.ajax({
			url:"ajax/acciones_login.php?action=verify",
			method: "POST",
			data: params,
			dataType: "json",
			success:function(response){
				if(response.num_tipo_usuario_fk =='1'){
					window.location="menu-admin.php";
				}else if(response.num_tipo_usuario_fk =='2'){
					window.location="menu-normal.php";
				}else{
					$("#response").css("visibility", "visible");
					$("#response").fadeIn(100);
					$("#response").html("Usuario/Contraseña Inválidos!");
					$("#response").fadeOut(4000);
				}
			},
			error:function(e){
				console.log("Error: "+e);
			}
		});
	});	
});