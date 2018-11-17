$(document).ready(function(){
	
	$("#btn-search").click(function(){
		search();
	});

	$("#btn-generar").click(function(){
		generateReportMaster();
	});

	$("#btn-generar2").click(function(){
		generateReportCapacitation();
	});

});

search = function(){
	var params = "identity="+$("#identity").val();

	$.ajax({
		url:"ajax/capacitacion-maestro.php?action=report",
		method: "POST",
		data: params,
		success:function(request){
			$("#response").html(request);
		},
		error:function(){
			$("#request2").css("visibility", "visible");
			$("#request2").html("Ocurrio un error");
		}
	});
}

generateReportMaster = function(){
	var params = "identity="+$("#identity").val();
	$.ajax({
		url:"ajax/capacitacion-maestro.php?action=report-master",
		method: "POST",
		data: params,
		success:function(request){
			//window.open('http://127.0.0.1/Normal/reports/');
			console.log(request);
		},
		error:function(e){
			$("#request2").css("visibility", "visible");
			$("#request2").html("Ocurrio un error");
		}
	});
}

generateReportCapacitation = function(){
	var params = "slc-capacitacion="+$("#slc-capacitacion").val();
	$.ajax({
		url:"ajax/capacitacion-maestro.php?action=report-capacitation",
		method: "POST",
		data: params,
		success:function(request){
			//window.open('http://127.0.0.1/Normal/reports/');
			console.log(request);
		},
		error:function(e){
			$("#request2").css("visibility", "visible");
			$("#request2").html("Ocurrio un error");
		}
	});
}

