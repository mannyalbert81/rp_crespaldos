$(document).ready( function (){
	cargarTareas();
	cargarDetalles();
	$(":input").inputmask();
	

});

function cargarTareas()
{
	$.ajax({
	    url: 'index.php?controller=TareaRespaldos&action=cargarTabla',
	    type: 'POST',
	    data: {action: "ajax"},
	})
	.done(function(x) {
	$("#tabla_tareas").html(x);
	})
	.fail(function() {
	    console.log("error");
	});	
}

function cargarDetalles()
{
	$.ajax({
	    url: 'index.php?controller=TareaRespaldos&action=cargarTablaDetalles',
	    type: 'POST',
	    data: {action: "ajax"},
	})
	.done(function(x) {
	$("#tabla_detalles").html(x);
	})
	.fail(function() {
	    console.log("error");
	});	
}

function CargarValoresEditar()
{
	
	var idtarea = $("#id_tarea").val();
	
	if (idtarea!="")
		{
	$.ajax({
	    url: 'index.php?controller=TareaRespaldos&action=RegresarValor',
	    type: 'POST',
	    data: {
	    	   id_tarea : idtarea,
	    },
	})
	.done(function(x) {
		var array = JSON.parse(x);
		
		$("#nombre_bd").val(array[0].nombre_base_datos);
		$("#file_path").val(array[0].path_tareas_respaldos);
		$("#hora_plan").val(array[0].hora_tareas_respaldos);
	})
	.fail(function() {
	    console.log("error");
	});
	}
	}

function EditarTarea()
{
	var x = document.getElementById("Editar_div");
	var y = document.getElementById("bt_Agregar");
	var z = document.getElementById("bt_Eliminar");
	
	if (x.style.display === "block")
		{
		
		var idtarea = $("#id_tarea").val();
		var nbd = $("#nombre_bd").val();
		var path = $("#file_path").val();
		var hplan = $("#hora_plan").val();
		if (idtarea!="" && (nbd!="" || path!="" || hplan!=""))
			{
			$.ajax({
			    url: 'index.php?controller=TareaRespaldos&action=EditarValor',
			    type: 'POST',
			    data: {
			    	   id_tarea : idtarea,
			    	   nombre_bd: nbd,
			    	   path: path,
			    	   hora: hplan
			    },
			})
			.done(function(x) {
				cargarTareas();
			    $("#id_tarea").val("");
				$("#nombre_bd").val("");
				$("#file_path").val("");
				$("#hora_plan").val("");
			})
			.fail(function() {
			    console.log("error");
			});	
			}
		}
	
	if (x.style.display === "none") {
	    x.style.display = "block";
	  } else {
	    x.style.display = "none";
	    $("#id_tarea").val("");
		$("#nombre_bd").val("");
		$("#file_path").val("");
		$("#hora_plan").val("");
	  }	
	  if (y.style.display === "none") {
		    y.style.display = "block";
		  } else {
		    y.style.display = "none";
		  }
	  
	  if (z.style.display === "none") {
		    z.style.display = "block";
		  } else {
		    z.style.display = "none";
		  }	
}

function AgregarTarea()
{
	var x = document.getElementById("Agregar_div");
	var y = document.getElementById("bt_Editar");
	var z = document.getElementById("bt_Eliminar");
	if (x.style.display === "block")
		{
		var nbd = $("#nombre_bd1").val();
		var path = $("#file_path1").val();
		var hplan = $("#hora_plan1").val();
		if (nbd!="" && path!="" && hplan!="")
			{
				$.ajax({
				    url: 'index.php?controller=TareaRespaldos&action=AgregarValor',
				    type: 'POST',
				    data: {
				    	   nombre_bd: nbd,
				    	   path: path,
				    	   hora: hplan
				    },
				})
				.done(function(x) {
					console.log(x);
					cargarTareas();
					var select = document.getElementById("id_tarea");
					select.options[select.options.length] = new Option(x,x);
					var select1 = document.getElementById("id_tarea1");
					select1.options[select1.options.length] = new Option(x,x);					
				    $("#nombre_bd1").val("");
					$("#file_path1").val("");
					$("#hora_plan1").val("");
				})
				.fail(function() {
				    console.log("error");
				});	
			}
		
		}
	  if (x.style.display === "none") {
	    x.style.display = "block";
	  } else {
	    x.style.display = "none";
	    $("#nombre_bd1").val("");
		$("#file_path1").val("");
		$("#hora_plan1").val("");
	  }	
	  if (y.style.display === "none") {
		    y.style.display = "block";
		  } else {
		    y.style.display = "none";
		  }
	  if (z.style.display === "none") {
		    z.style.display = "block";
		  } else {
		    z.style.display = "none";
		  }	
}

function EliminarTarea()
{
	var x = document.getElementById("Eliminar_div");
	var y = document.getElementById("bt_Editar");
	var z = document.getElementById("bt_Agregar");
	
	if (x.style.display === "block")
	{
		var idtarea = $("#id_tarea1").val();
	if (idtarea!="" )
		{
			$.ajax({
			    url: 'index.php?controller=TareaRespaldos&action=EliminarValor',
			    type: 'POST',
			    data: {
			    	   id_tarea: idtarea
			    },
			})
			.done(function(x) {
				
				cargarTareas();
				$("#id_tarea1 option[value='"+idtarea+"']").remove();
				$("#id_tarea option[value='"+idtarea+"']").remove();
			    $("#id_tarea1").val("");
				
			})
			.fail(function() {
			    console.log("error");
			});	
		}
	
	}
	
	if (x.style.display === "none") {
	    x.style.display = "block";
	  } else {
	    x.style.display = "none";
	  }
	if (y.style.display === "none") {
	    y.style.display = "block";
	  } else {
	    y.style.display = "none";
	  }
  if (z.style.display === "none") {
	    z.style.display = "block";
	  } else {
	    z.style.display = "none";
	  }	
}


function Cancelar()
{
 
	$("#nombre_bd1").val("");
	$("#file_path1").val("");
	$("#hora_plan1").val("");
	$("#id_tarea1").val("");
	$("#id_tarea").val("");
	$("#nombre_bd").val("");
	$("#file_path").val("");
	$("#hora_plan").val("");
	var x1 = document.getElementById("Eliminar_div");
	var y1 = document.getElementById("Agregar_div");
	var z1 = document.getElementById("Editar_div");
	var x = document.getElementById("bt_Editar");
	var y = document.getElementById("bt_Agregar");
	var z = document.getElementById("bt_Eliminar");
	
	    x1.style.display = "none";
	 
	    y1.style.display = "none";

	    z1.style.display = "none";

	    x.style.display = "block";
	
	    y.style.display = "block";
	
	    z.style.display = "block";
	 
}