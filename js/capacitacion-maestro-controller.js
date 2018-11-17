$(document).ready(function(){
	
	$("#btn-search").click(function(){
		search();
	});
	$("#btn-save").click(function(){
		save();
	});

});

search = function(){
	var params = "identity="+$("#identity").val();

	$.ajax({
		url:"ajax/capacitacion-maestro.php?action=search",
		method: "POST",
		data: params,
		success:function(request){
			var json = JSON.parse(request);
			$("#full-name").html(json.name+" "+json.lastName);
			$("#email").html(json.email);
			$("#phone").html(json.phone);
			$("#center").html(json.center);
			var data = "";
			for(var i=0; i<json.capacitations.length;i++){
				data += json.capacitations[i]+", ";
				$("#capacitations").html(data);		
			}
		},
		error:function(){
			$("#resultado2").css("visibility", "visible");
			$("#resultado2").html("Ocurrio un error");
		}
	});
}

save = function(){
	var params = "identity="+$("#identity").val()
				+"&slc-capacitacion="+$("#slc-capacitacion").val()
				+"&horas="+$("#horas").val();

	if($("#horas").val() === ""){
		$("#resultado2").css("visibility", "visible");
		$("#resultado2").fadeIn(1000);
		$("#resultado2").html("<b>El numero de horas esta vacio</b>");
		$("#resultado2").fadeOut(3000);
		return;
	}				

	$.ajax({
		url:"ajax/capacitacion-maestro.php?action=save",
		method: "POST",
		data: params,
		success:function(request){
			$("#resultado").css("visibility", "visible");
			$("#resultado").fadeIn(100);
			$("#resultado").html(request);
			$("#resultado").fadeOut(3000);
		},
		error:function(){
			$("#resultado2").css("visibility", "visible");
			$("#resultado2").fadeIn(100);
			$("#resultado2").html("<b>Ocurrio un error al guardar</b>");
			$("#resultado2").fadeOut(3000);
		}
	});
}