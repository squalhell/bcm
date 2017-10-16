
	/**
	*
	* @Crear:  Módulo de Gasfiter.
	* @version:1.0.0  @creado: 09 de abril de 2014
	* @autor: Mario Pardo Gottz.
	*
	*/

	$(document).ready(function() {
				
				
		var var9998 = $("#var9998").val();
		var var9997 = $("#var9997").val();
		
		$.post("gasfiterBD.php",{
			Nombre	:	"rptGasfiter",
			var9998	:	var9998,
			var9997	:	var9997
			},function(data){
				$('#DivTrRpt').html(data);		
		});
		
		$.post("gasfiterBD.php",{
			Nombre	:	"getGasfiter",
			var9997	:	var9997,
			var9998	:	var9998
			},function(data){
				$('#select-from').html(data);		
		});
		
		
		$.post("gasfiterBD.php",{
			Nombre	:	"getRegion"
			},function(data){
				$('#cbxRegion').html(data);		
		});
		
		$.post("gasfiterBD.php",{
			Nombre	:	"getTaller",
			var9998	:	var9998,
			var9997	:	var9997
			},function(data){
				$('#txtTallerAsociado').html(data);		
		});
		
		$.post("gasfiterBD.php",{
			Nombre	:	"getTaller",
			var9998	:	var9998,
			var9997	:	var9997
			},function(data){
				$('#txtBusquedaTaller').html(data);		
		});

		$.post("gasfiterBD.php",{
			Nombre	:	"getNombreGasfiter"
			},function(data){
				$('#cbxBuscaGasfiter').html(data);		
		});
		
		$.post("gasfiterBD.php",{
			Nombre	:	"getUsrGasfiter"
			},function(data){
				$('#cbxBuscaUsuario').html(data);		
		});

		/*
		$('#txtRut').Rut({
			on_error: function(){
				alert('Rut incorrecto');
				$('#txtRut').val("");
				$('#txtRut').css('border-color','red');
			}
		});
		*/
		
		$(function(val)
		{
			
			$("#mostrar").click(function(val){
									
				event.preventDefault();
				$("#caja").slideToggle();
			});
			
			$("#caja a").click(function(val){
									
				event.preventDefault();
				$("#caja").slideUp();
			});
		});
		
	});
	
	
	
	
	function getComunas(cbxRegion){
		
		$.post("gasfiterBD.php",{
			Nombre			:	"getComunas",
			cbxRegion	:	cbxRegion
			},function(data){
				$('#cbProvincias').html(data);		
		});		
	}
	
	function getProvincias(cbxComuna){
		
		$.post("gasfiterBD.php",{
			Nombre			:	"getProvincias",
			cbxComuna	:	cbxComuna
			},function(data){
				$('#cbxComuna').html(data);		
		});		
	}
	
	
	function getDescuento(){
		
		var txtTallerAsociado = $("#txtTallerAsociado").val();
		
		$.post("gasfiterBD.php",{
			Nombre			:	"getDescuento",
			txtTallerAsociado	:	txtTallerAsociado
			},function(data){
				$('#txtDescuento').val(data);		
		});	
	}
	
	function buscaGasfiter(){
		
		var txtBuscar = $("#txtBuscar").val();
		var txtBuscarRut = $("#txtBuscarRut").val();
		var cbxTipoBusquedaListado = $("#cbxTipoBusquedaListado").val();
		
		var var9997 = $("#var9997").val();
		var var9998 = $("#var9998").val();
		
		$.post("gasfiterBD.php",{
			Nombre		:	"buscaGasfiter",
			txtBuscar	:	txtBuscar,
			txtBuscarRut:	txtBuscarRut,
			cbxTipoBusquedaListado	:	cbxTipoBusquedaListado,
			var9997		:	var9997,
			var9998		:	var9998
			},function(data){
				$('#select-from').css('display','none');
				$('#select-from2').css('display','block');	
				$('#select-from2').html(data);		
		});
		
	}
	
	function buscaGasfiterRPT(){
	
		var txtBuscar1 = $("#txtBuscarRPT1").val();
		var txtBuscar2 = $("#txtBuscarRPT2").val();
		var txtBuscar3 = $("#txtBuscarRPT3").val();
		var cbxTipoBusqueda = $("#cbxTipoBusqueda").val();
		var var9998 = $("#var9998").val();
		var var9997 = $("#var9997").val();
		var txtBusquedaTaller = $("#txtBusquedaTaller").val();
		
		
		$.post("gasfiterBD.php",{
			Nombre		:	"buscaGasfiterRPT",
			txtBuscar1	:	txtBuscar1,
			txtBuscar2	:	txtBuscar2,
			txtBuscar3	:	txtBuscar3,
			cbxTipoBusqueda	:	cbxTipoBusqueda,
			var9998			:	var9998,
			var9997			:	var9997,
			txtBusquedaTaller	:	txtBusquedaTaller
			},function(data){
				$('#DivTrRpt').html("");
				$('#DivTrRpt').html(data);
		});
	}
	
	function determinaTypeAnterior(valor){
		
		if(valor==1){
			$('#txtBuscarRPT1').css('display','block');
			$('#txtBuscarRPT2').css('display','none');
			$('#txtBuscarRPT3').css('display','none');
			$('#txtBusquedaTaller').css('display','none');
			
		}
		if(valor==2){
			$('#txtBuscarRPT2').css('display','block');
			$('#txtBuscarRPT1').css('display','none');
			$('#txtBuscarRPT3').css('display','none');
			$('#txtBusquedaTaller').css('display','none');
		}
		if(valor==3){
			$('#txtBuscarRPT3').css('display','block');
			$('#txtBuscarRPT1').css('display','none');
			$('#txtBuscarRPT2').css('display','none');
			$('#txtBusquedaTaller').css('display','none');
		}
		if(valor==4){
			$('#txtBuscarRPT3').css('display','none');
			$('#txtBuscarRPT1').css('display','none');
			$('#txtBuscarRPT2').css('display','none');
			$('#txtBusquedaTaller').css('display','block');
		}
		
	}
	
	function determinaTypeAnterior2(valor){
		/*
		1=rut
		2=nombre
		*/
		if(valor==2){
			$('#txtBuscar').css('display','inline');
			$('#txtBuscarRut').css('display','none');
			$('#btnBuscar').css('display','inline');
		}
		if(valor==1){
			$('#txtBuscar').css('display','none');
			$('#txtBuscarRut').css('display','inline');
			$('#btnBuscar').css('display','inline');
		}
		if(valor==0){
			$('#txtBuscar').css('display','none');
			$('#txtBuscarRut').css('display','none');
			$('#btnBuscar').css('display','none');
			
		}
	}
	
	function guardaGasfiter(){
		
		var var9998 = $("#var9998").val();
		var var9997 = $("#var9997").val();
		//var txtRut = $("#txtRut").val();
		
		var rutCorto = $("#txtRut").val();
		var dv = $("#dv").val();
		var txtRut = rutCorto+dv;
		
		var txtNombre = $("#txtNombre").val();
		var txtApellido = $("#txtApellido").val();
		var txtDireccion = $("#txtDireccion").val();
		
		
		var cbxRegion1 = $("#cbxRegion1").val();
		var cbProvincias = $("#cbProvincias").val();
		var cbxComuna = $("#cbxComuna").val();
		
		var txtTelefono = $("#txtTelefono").val();
		var txtCelular = $("#txtCelular").val();
		var txtCorreo = $("#txtCorreo").val();
		var txtTallerAsociado = $("#txtTallerAsociado").val();
		var txtDescuento = $("#txtDescuento").val();
		var txtCategoria = $("#txtCategoria").val();
		var txtActivo = $("#txtActivo").val();
		var txtMontoCompra = $("#txtMontoCompra").val();
		
		if(txtRut==""){
			alert('Debe ingresar Rut');
			$("#txtRut").focus();
			return false;	
		} else if(txtNombre==""){
			alert('Debe ingresar Nombre');
			$("#txtNombre").focus();
			return false;	
		} else if(txtApellido==""){
			alert('Debe ingresar Apellido');
			$("#txtApellido").focus();	
			return false;
		} else if(txtDireccion==""){
			alert('Debe ingresar Direccion');
			$("#txtDireccion").focus();	
			return false;
		} else if(txtTelefono==""){
			alert('Debe ingresar Telefono');
			$("#txtTelefono").focus();
			return false;	
		} else if(txtCelular==""){
			alert('Debe ingresar Celular');
			$("#txtCelular").focus();
			return false;	
		} else if(txtCorreo==""){
			alert('Debe ingresar Correo');
			$("#txtCorreo").focus();	
			return false;
		} else if(txtTallerAsociado=="0"){
			alert('Debe Seleccionar Taller');
			$("#txtTallerAsociado").focus();
			return false;	
		} else if(txtDescuento==""){
			alert('Debe ingresar Descuento de Taller');
			$("#txtDescuento").focus();
			return false;	
		} else if(txtCategoria=="0"){
			alert('Debe Seleccionar Categoria');
			$("#txtCategoria").focus();
			return false;	
		}  else if(txtActivo=="0"){
			alert('Debe Seleccionar Estado del Gasfiter');
			$("#txtActivo").focus();
			return false;	
		} else {
			
			

			$.post("gasfiterBD.php",{
				Nombre				:	"guardaGasfiter",
				txtRut				:	txtRut,
				txtNombre			:	txtNombre,
				txtApellido			:	txtApellido,
				txtDireccion		:	txtDireccion,
				cbxRegion1			:	cbxRegion1,
				cbxComuna			:	cbxComuna,
				cbProvincias		:	cbProvincias,
				txtTelefono			:	txtTelefono,
				txtCelular			:	txtCelular,
				txtCorreo			:	txtCorreo,
				txtTallerAsociado	:	txtTallerAsociado,
				txtDescuento		:	txtDescuento,
				txtCategoria		:	txtCategoria,
				txtActivo			:	txtActivo,
				var9998				:	var9998,
				var9997				:	var9997
				},function(data){
					//alert(data);
					loadGasfiter();
					limpiaInputGasfiter();
			});
		}
	}
	
	function limpiaInputGasfiter(){
		
		var txtRut = $("#txtRut").val("");
		var txtNombre = $("#txtNombre").val("");
		var txtApellido = $("#txtApellido").val("");
		var txtDireccion = $("#txtDireccion").val("");
		var cbxRegion1 = $("#cbxRegion1").val("0");
		var cbProvincias = $("#cbProvincias").val("0");
		var cbxComuna = $("#cbxComuna").val("0");
		var txtTelefono = $("#txtTelefono").val("");
		var txtCelular = $("#txtCelular").val("");
		var txtCorreo = $("#txtCorreo").val("");
		var txtTallerAsociado = $("#txtTallerAsociado").val("0");
		var txtDescuento = $("#txtDescuento").val("0");
		var txtCategoria = $("#txtCategoria").val("0");
		var txtActivo = $("#txtActivo").val("0");
		
	}
	
	function loadGasfiter(){
		
		location.href='gasfiter.php';
		/*
		$.post("gasfiterBD.php",{
			Nombre	:	"getGasfiter"
			},function(data){
				$('#select-from').css('display','block');
				$('#select-from2').css('display','none');	
				$("#txtRut").val("");
				$("#txtNombre").val("");
				$("#txtApellido").val("");
				$("#txtDireccion").val("");
				$("#txtSector").val("");
				$("#cbxRegion").val("");
				$("#cbxProvincia").val("");
				$("#txtTelefono").val("");
				$("#txtCelular").val("");
				$("#txtCorreo").val("");
				$("#txtTallerAsociado").val("");
				$("#txtDescuento").val("");
				$("#txtCategoria").val("");		
		});
		*/	
	}
	
	
	
	function cargaRegistrosGasfiter(IdGasfiter, txtRut, txtNombre, txtApellido, txtDireccion, Sector, cbxRegion, CiudadGas, txtTelefono, txtCelular, txtCorreo, txtTallerAsociado, txtDescuento, txtCategoria,txtActivo,var9997){
		
		// if TipoFuncion = 1 then guarda else actualiza
		
		var f = document.core;
		
		f.IdGasfiter.value=IdGasfiter;
		f.txtRut.value=txtRut;
		f.readonly.value=1;
		f.txtNombre.value=txtNombre;
		f.txtApellido.value=txtApellido;
		f.txtDireccion.value=txtDireccion;
		
		f.txtTelefono.value=txtTelefono;
		f.txtCelular.value=txtCelular;
		f.txtCorreo.value=txtCorreo;
		f.txtTallerAsociado.value=txtTallerAsociado;
		
		
		f.txtDescuento.value=txtDescuento;
		if(var9997=='U8i0'){
			f.txtCategoria.value=txtCategoria;
		}
		f.txtActivo.value=txtActivo;
		
		f.varDisplay.value=1;
		
		
		
		
		f.submit();
		
		/*
		var tab = $("#tab").val('#tabs-2');
		
		$("#btnActualizar").css('display','block');
		$("#btnGuardar").css('display','none');
		
		$.post("gasfiterBD.php",{
			Nombre	:	"getMontoCompraTotal",
			IdGasfiter	:	IdGasfiter
			},function(data){
				$('#txtMontoCompraTotal').val(data);
		});
		
		$.post("gasfiterBD.php",{
			Nombre	:	"getMontoCompraLast",
			IdGasfiter	:	IdGasfiter
			},function(data){
				$('#txtMontoCompra').val(data);
		});
		
		$.post("gasfiterBD.php",{
			Nombre	:	"getComunaxRegion",
			IdGasfiter	:	IdGasfiter
			},function(data){
				$('#cbxProvincia').html(data);	
		});
		
		var var9998 = $("#var9998").val();
		var IdGasfiter = $("#IdGasfiter").val(IdGasfiter);
		var txtRut = $("#txtRut").val(RutGas);
		var txtNombre = $("#txtNombre").val(NombreGas);
		var txtApellido = $("#txtApellido").val(ApellidoGas);
		var txtDireccion = $("#txtDireccion").val(DireccionGas);
		var txtSector = $("#txtSector").val(Sector);
		var cbxRegion = $("#cbxRegion").val(RegionGas);
		
		
		
		//var cbxProvincia = $("#cbxProvincia").val(CiudadGas);
		var txtTelefono = $("#txtTelefono").val(TelefonoGas);
		var txtCelular = $("#txtCelular").val(CelularGas);
		var txtCorreo = $("#txtCorreo").val(EmailGas);
		var txtTallerAsociado = $("#txtTallerAsociado").val(TallerGas);
		var txtDescuento = $("#txtDescuento").val(DescuentoGas);
		var txtCategoria = $("#txtCategoria").val(CategoriaGas);
		var txtMontoCompra = $("#txtMontoCompra").val(MontoCompraGas);
		var txtActivo = $("#txtActivo").val(ActivoGas);
		*/
		
	}
	
	//Funcion que guarda el monto de compra de cada linea.
	function guardaMontoCompra(id){
		
		var txtSaveMontoCompra = $("#txtSaveMontoCompra_"+id).val();
		
		if(txtSaveMontoCompra==""){
			alert("Debe ingresar Monto de Compra");
			$("#txtSaveMontoCompra_"+id).focus();
			$('#txtSaveMontoCompra_'+id).css('border-color','red');
			return false;
		} else {
			$.post("gasfiterBD.php",{
				Nombre	:	"guardaMontoCompra",
				txtSaveMontoCompra	:	txtSaveMontoCompra,
				id					:	id
				},function(data){
					loadCargaInicio();
			});
		}
	}
	
	function loadCargaInicio(){
		
		var var9997 = $("#var9997").val();
		var var9998 = $("#var9998").val();
		
		$.post("gasfiterBD.php",{
			Nombre	:	"getGasfiter",
			var9997	:	var9997,
			var9998	:	var9998
			},function(data){
				$('#select-from').html(data);		
		});
		
		$.post("gasfiterBD.php",{
			Nombre	:	"rptGasfiter",
			var9998	:	var9998,
			var9997	:	var9997
			},function(data){
				$('#DivTrRpt').html(data);		
		});	
	}
	
	
	function actualizaGasfiter(){
	
		var var9998 = $("#var9998").val();
		var IdGasfiter = $("#IdGasfiter").val();
		//var txtRut = $("#txtRut").val();
		
		var rutCorto = $("#txtRut").val();
		var dv = $("#dv").val();
		var txtRut = rutCorto+dv;
		
		var txtNombre = $("#txtNombre").val();
		var txtApellido = $("#txtApellido").val();
		var txtDireccion = $("#txtDireccion").val();
		
		var cbxRegion1 = $("#cbxRegion1").val();
		var cbProvincias = $("#cbProvincias").val();
		var cbxComuna = $("#cbxComuna").val();
		
		var txtTelefono = $("#txtTelefono").val();
		var txtCelular = $("#txtCelular").val();
		var txtCorreo = $("#txtCorreo").val();
		var txtTallerAsociado = $("#txtTallerAsociado").val();
		var txtDescuento = $("#txtDescuento").val();
		var txtCategoria = $("#txtCategoria").val();
		var txtMontoCompra = $("#txtMontoCompra").val();
		var txtActivo = $("#txtActivo").val();
		
		
		if(txtRut==""){
			alert('Debe ingresar Rut');
			$("#txtRut").focus();
			return false;	
		} else if(txtNombre==""){
			alert('Debe ingresar Nombre');
			$("#txtNombre").focus();
			return false;	
		} else if(txtApellido==""){
			alert('Debe ingresar Apellido');
			$("#txtApellido").focus();	
			return false;
		} else if(txtDireccion==""){
			alert('Debe ingresar Direccion');
			$("#txtDireccion").focus();	
			return false;
		} else if(txtTelefono==""){
			alert('Debe ingresar Telefono');
			$("#txtTelefono").focus();
			return false;	
		} else if(txtCelular==""){
			alert('Debe ingresar Celular');
			$("#txtCelular").focus();
			return false;	
		} else if(txtCorreo==""){
			alert('Debe ingresar Correo');
			$("#txtCorreo").focus();	
			return false;
		} else if(txtTallerAsociado=="0"){
			alert('Debe Seleccionar Taller');
			$("#txtTallerAsociado").focus();
			return false;	
		} else if(txtDescuento==""){
			alert('Debe ingresar Descuento de Taller');
			$("#txtDescuento").focus();
			return false;	
		} else if(txtCategoria=="0"){
			alert('Debe Seleccionar Categoria');
			$("#txtCategoria").focus();
			return false;	
		} else if(txtActivo=="0"){
			alert('Debe Seleccionar Estado de Gasfiter');
			$("#txtActivo").focus();
			return false;	
		} else {
			$.post("gasfiterBD.php",{
				Nombre				:	"actualizaGasfiter",
				txtRut				:	txtRut,
				txtNombre			:	txtNombre,
				txtApellido			:	txtApellido,
				txtDireccion		:	txtDireccion,
				cbxRegion1			:	cbxRegion1,
				cbxComuna			:	cbxComuna,
				cbProvincias		:	cbProvincias,
				txtTelefono			:	txtTelefono,
				txtCelular			:	txtCelular,
				txtCorreo			:	txtCorreo,
				txtTallerAsociado	:	txtTallerAsociado,
				txtDescuento		:	txtDescuento,
				txtCategoria		:	txtCategoria,
				IdGasfiter			:	IdGasfiter,
				txtActivo			:	txtActivo,
				var9998				:	var9998
				},function(data){
					//alert(data);
					loadGasfiter();
					limpiaInputGasfiter();
			});
		}
		
	}
	
	function validaRut(){
		
		var rutCorto = $("#txtRut").val();
		var dv = $("#dv").val();
		var rut = rutCorto+dv;
		
		$.post("gasfiterBD.php",{
			Nombre	:	"validaSiExisteRut",
			rut		:	rut
			},function(data){
				//console.log(data);
				if(data!=""){
					$("#txtMsgRut").html("Este Gasfiter ya existe");
					$("#txtRut").val("");
					$("#txtRut").focus();
					return false;
				} else {
					$.post("gasfiterBD.php",{
						Nombre	:	"validaRut",
						rut		:	rut
						},function(data){
							//console.log(data);
							if(data!=1){
								$("#txtMsgRut").html("Rut Invalido");
								$("#txtRut").val("");
								$("#txtRut").focus();
								return false;
							} else {
								$("#txtMsgRut").html("");
								return true;
							}
							
					});
					$("#txtNombre").focus();
					return true;
				}
		});
	}
	
	
	
	
	function exportaExcel1(var9998,var9997){
		
		document.forms.core.action = "excelGasfiter.php?var9998="+var9998+"&var9997="+var9997;
		document.forms.core.submit();
	}
	
	function btnDescargarExcel(){
		
		document.forms.core.action = "excelGasfiterGeneral.php";
		document.forms.core.submit();
	}
	
	function exportaExcel2(var9998,txtBuscar1,txtBuscar2,txtBuscar3,txtBusquedaTaller,var9997){
		
		if(txtBuscar1!=0){
			var cbxTipoBusqueda = 1;	
		}
		if(txtBuscar2!=0){
			var cbxTipoBusqueda = 2;	
		}
		if(txtBuscar3!=0){
			var cbxTipoBusqueda = 3;	
		}
		if(txtBusquedaTaller!=0){
			var cbxTipoBusqueda = 4;	
		}
		document.forms.core.action = "excelGasfiter2.php?var9997="+var9997+"&var9998="+var9998+"&txtBuscar1="+txtBuscar1+"&txtBuscar2="+txtBuscar2+"&txtBuscar3="+txtBuscar3+"&cbxTipoBusqueda="+cbxTipoBusqueda+"&txtBusquedaTaller="+txtBusquedaTaller;
		document.forms.core.submit();
		
	}
	
	
	
	
	
	
	