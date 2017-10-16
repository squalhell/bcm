@extends('layouts.master')

@section('content')
<form action="" method="post" name="form_ficha" id="form_ficha">
	{{ csrf_field() }}
	<input type="hidden" name="id_cliente_direccion" id="id_cliente_direccion" value="{{ $cliente_direccion->id_cliente_direccion }}">
	<input type="hidden" name="id_ot" id="id_ot" value="{{ $ot->id_ot }}">
	<table width="100%" height="450" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td align="left" valign="top">
				<table width="100%" height="523" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="23%" height="523" align="left" valign="top" bgcolor="#CCCCCC">
							@include('Clientes.ficha')
						</td>
						<td width="77%" valign="top" bgcolor="#FFFFFF"><table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" background="{{ asset('img/walls.jpg') }}">
							<tr>
								<td width="2%" height="544" bgcolor="#A7A7A7">&nbsp;</td>
								<td width="98%" align="left" valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td height="19" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="30" height="19" bgcolor="#A7A7A7">&nbsp;</td>
														<td width="97%" bgcolor="#EAEAEA" class="sub_title_big"><table width="100%" border="0" cellspacing="0" cellpadding="0">
															<tr>
																<td align="left" valign="top" class="sub_tabs_msg">Datos ultimas atenciones</td>
															</tr>
														</table></td>
													</tr>
												</table></td>
											</tr>
										</table></td>
									</tr>
									<tr>
										<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td height="399" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="835" height="20" align="left" valign="top" class="sub_title3"><table width="361" border="0" cellspacing="0" cellpadding="0">
															<tr>
																<td width="20"><img src="{{ asset('img/user_p.png') }}" width="20" height="20" /></td>
																<td width="341">Información</td>
															</tr>
														</table></td>
													</tr>
													<tr>
														<td height="300" align="left" valign="top" bgcolor="#FFFFFF">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<!-- <td height="510">@include('Clientes.historicos')</td> -->
																	<td height="510" valign="top">
																		<div id="dv_detalle" >
																			@if ($detalle)
																				@include('Atenciones.detalle')
																			@else
																				@include('Clientes.historicos')
																			@endif
																		</div>
																	</td>
																</tr>
															</table>
														</td>
													</tr>
												</table></td>
											</tr>
											<tr bgcolor="#A7A7A7">
												<td height="32"><table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="80%" height="28"><input name="button" type="button" class="main_fitz" id="button" value="Volver" onclick="volver()" /></td>
														<td width="10%"><input name="button3" type="button" class="main_fitz" id="button3" value="Historial" onclick="load_historico()" /></td>
														<td width="10%"><input name="button2" type="button" class="main_fitz" id="button2" value="Nueva Visita" onclick="naten()" /></td>
														<!-- <td width="7%"><input name="button2" type="button" class="main_fitz" id="button2" value="Nueva Tipificaci&oacute;n" onclick="tipi()" /></td> -->
													</tr>
												</table></td>
											</tr>
										</table></td>
									</tr>
								</table></td>
							</tr>
						</table></td>
					</tr>
				</table></td>
			</tr>
		</table>

		<script type="text/javascript">

			$(document).ready(function () {
				$('#sub_title').html('Datos del cliente e historial de atenciones.');
			});

			function volver(){
				form = $('#form_ficha');
				form.attr('action', "{{ route('clientes') }}");
				form.submit();
			}

			function load_detalle(id_ot) {
				$('#id_ot').val(id_ot);
				$('#id_cliente_direccion').val("{{ $cliente_direccion->id_cliente_direccion }}");
				form = $('#form_ficha');
				form.attr('action', "{{ route('cliente_detalle') }}");
				form.submit();
			}

			function load_historico() {
				form = $('#form_ficha');
				$('#id_ot').val("{{ $ot->id_ot }}");
        		$('#id_cliente_direccion').val("{{ $cliente_direccion->id_cliente_direccion }}");
        		form.attr('action', "{{ route('cliente_ficha') }}");
        		form.submit();	
			}

		</script>
	</form>
	@endsection