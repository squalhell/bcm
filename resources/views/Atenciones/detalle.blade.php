<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="17%" class="Title03">Datos del producto</td>
      <td width="83%" class="Title03">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="58%">Descripción</td>
              <td width="22%"><input name="estado" type="text" class="Title02-3" id="a" value="{{ $estado }}" readonly="readonly"  style="width:110px" /></td>
              <td width="20%">{{ $ot->id_atencion }}</td>
            </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td height="308" align="left" valign="top" bgcolor="#333333"><table width="72%" height="342" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="24%" height="64" bgcolor="#FFFFFF"><table width="100%" height="54" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="56%" height="54"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="main_fitz2">Producto</td>
                </tr>
                <tr>
                  <td height="34"><img src="{{ asset('img/'.$ot->marca->img) }}" width="80" height="20" /></td>
                </tr>
              </table></td>
              <td width="44%"><img src="{{ asset('img/'.$ot->tipo_producto->img) }}" width="80" height="93" /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="180" bgcolor="#FFFFFF"><table width="212" border="0" cellspacing="2" cellpadding="0">
            <tr>
              <td class="sub_tabs">Fecha de Compra</td>
              <td><input name="pmrc" type="text" class="sub_tabs_no" id="inputField" value="{{ date('d/m/Y', strtotime($ot->f_comp)) }}" style="width:110px" readonly="readonly"/></td>
              </tr>
            <tr>
              <td width="99" class="sub_tabs">Marca</td>
              <td width="107"><input name="inputField2" type="text" class="sub_tabs_no" id="inputField3" value="{{ $ot->marca->desc_marca }}"  style="width:110px"  readonly="readonly"/></td>
              </tr>
            <tr>
              <td class="sub_tabs">Tipo de Producto</td>
              <td><input name="ptpo" type="text" class="sub_tabs_no" id="inputField4" value="{{ $ot->tipo_producto->desc_tipo_producto }}"  style="width:110px"  readonly="readonly"/></td>
              </tr>
            <tr>
              <td class="sub_tabs">Litraje</td>
              <td><input name="pltrs" type="text" class="sub_tabs_no" id="inputField5" value="{{ $ot->litraje->desc_litraje }}"  style="width:110px"  readonly="readonly"/></td>
              </tr>
            <tr>
              <td class="sub_tabs">Tipo de Gas</td>
              <td><input name="pgs" type="text" class="sub_tabs_no" id="inputField6" value="{{ $ot->tipo_gas->desc_tipo_gas }}"  style="width:110px"  readonly="readonly"/></td>
              </tr>
            <tr>
              <td class="sub_tabs">Tiro</td>
              <td><input name="ptr" type="text" class="sub_tabs_no" id="inputField7" value="{{ $ot->tiro->desc_tiro }}"  style="width:110px"  readonly="readonly"/></td>
              </tr>
            <tr>
              <td class="sub_tabs">Modelos</td>
              <td><input name="pmdl" type="text" class="sub_tabs_no" id="inputField8" value="{{ $ot->desc_modelo }}"  style="width:110px"  readonly="readonly"/></td>
              </tr>
            <tr>
              <td class="sub_tabs">Cdgo Modelos</td>
              <td><input name="pcdg" type="text" class="sub_tabs_no" id="inputField9" value="{{ $ot->codigo_modelo->desc_codigo_modelo }}"  style="width:110px"  readonly="readonly"/></td>
              </tr>
            <tr>
              <td class="sub_tabs">Garantia?</td>
              <td><input name="inputField" type="text" class="sub_tabs_no" id="inputField2" value=""  style="width:110px"  readonly="readonly"/></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="14" bgcolor="#FFFFFF" class="Title03">Taller y Atencion</td>
        </tr>
        <tr>
          <td height="19" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="sub_tabs">Fecha Atencion</td>
              <td><input name="inputField3" type="text" class="sub_tabs_no" id="inputField16" value="{{ date('d/m/Y', strtotime($ot->fprom)) }}"  style="width:110px"  readonly="readonly"/></td>
              </tr>
            <tr>
              <td width="48%" class="sub_tabs">Taller</td>
              <td width="52%"><input name="inputField4" type="text" class="sub_tabs_no" id="inputField17" value="{{ $ot->stec->desc_stec }}"  style="width:110px"  readonly="readonly"/></td>
              </tr>
            <tr>
              <td height="24" class="sub_tabs">Horario</td>
              <td><input name="inputField5" type="text" class="sub_tabs_no" id="inputField18" value="{{ $ot->horario->desc_horario }}"  style="width:110px"  readonly="readonly"/></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="19" bgcolor="#333333"><table width="100%" border="0" cellspacing="0" cellpadding="3">
            <tr>
              <td bgcolor="#333333"><input name="button" type="button" class="main_fitz" id="button" value="Finalizar Atencion" onclick="goer()" style="width:120px"/></td>
              </tr>
            <tr>
              <td bgcolor="#333333"><input name="button2" type="button" class="main_fitz" id="button2" value="Anular Atencion" onclick="goer2()" style="width:120px" /></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
      <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0">
        <tr>
          <td height="418" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#CCCCCC">
            <tr>
              <td width="37%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><table width="97%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="31%" class="sub_tabs">Tipo de Atencion</td>  
                      <td width="16%"><input name="tpgo" type="text" class="sub_tabs_no" id="inputField10" value="{{ $ot->tipo_atencion->desc_tipo_atencion }}"  readonly="readonly"/></td>
                      <td width="38%"><span class="sub_tabs">Solicitante</span></td>
                      <td width="15%"><input name="tsolo" type="text" class="sub_tabs_no" id="inputField13" value="{{ $ot->tipo_solicitante->desc_tipo_solicitante }}"  readonly="readonly"/></td>
                      </tr>
                    <tr>
                      <td class="sub_tabs">Taller/Distribuidor</td>
                      <td><input name="tsoli" type="text" class="sub_tabs_no" id="inputField11" value="{{ $ot->distribuidor_atencion->distribuidor->desc_distribuidor }}"  readonly="readonly"/></td>
                      <td><span class="sub_tabs">Tipo de Presupuesto</span></td>
                      <td><input name="tprs" type="text" class="sub_tabs_no" id="inputField14" value="{{ $ot->presupuesto_trabajo->tipo_presupuesto->desc_tipo_presupuesto }}"  readonly="readonly"/></td>
                      </tr>
                    <tr>
                      <td class="sub_tabs">Trabajo a Realizar</td>
                      <td><input name="ttrb" type="text" class="sub_tabs_no" id="inputField12" value="{{ $ot->tipo_trabajo->desc_tipo_trabajo }}"  readonly="readonly"/></td>
                      <td><span class="sub_tabs">Nomina de Tiendas</span></td>
                      <td><input name="ttien" type="text" class="sub_tabs_no" id="inputField15" value="{{ $ot->tienda_solicitante->nomina_tienda->desc_nomina_tienda }}"  readonly="readonly"/></td>
                      </tr>
                    </table></td>
                  </tr>
                <tr>
                  <td class="Button022">Descripcion del problema</td>
                  </tr>
                <tr>
                  <td height="27"><textarea name="dsc_prob" cols="40" rows="2" class="sub_tabs_no" id="dsc_prob" style="width:95%;"  readonly="readonly">{{ $ot->desc_problema }}</textarea></td>
                  </tr>
                <tr>
                  <td height="14" class="Button022">Observacion del Tecnico</td>
                  </tr>
                <tr>
                  <td height="27"><textarea name="dsc_prob2" cols="40" rows="2" class="sub_tabs_no" id="dsc_prob2" style="width:95%;" readonly="readonly">{{ $ot->obs_tec }}</textarea></td>
                  </tr>
                </table></td>
              </tr>
            <tr class="Title03">
              <td height="16" align="left" valign="top">Finalizacion</td>
              </tr>
            <tr>
              <td height="227" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="152" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="48%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="sub_tabs">Tecnico Asignado</td>
                          <td><input name="inputField14" type="text" class="sub_tabs_no" id="inputField31" value="{{ $ot->tecnico->name }}"  readonly="readonly"  style="width:95%" /></td>
                          </tr>
                        <tr>
                          <td class="sub_tabs">Informacion de ruta</td>
                          <td><table width="93%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="23%"><input name="inputField17" type="text" class="sub_tabs_no" id="inputField32" value="{{ date('d/m/Y', strtotime($ot->f_ruta)) }}"  readonly="readonly"  style="width:90px" /></td>
                              <td width="19%" class="sub_tabs">Posicion</td>
                              <td width="44%"><input name="inputField18" type="text" class="sub_tabs_no" id="inputField33" value="{{ $ot->cd_pos }}"  readonly="readonly"  style="width:50px" /></td>
                              </tr>
                            </table></td>
                          </tr>
                        <tr>
                          <td width="45%" class="sub_tabs">N° Boleta</td>
                          <td width="55%"><input name="inputField6" type="text" class="sub_tabs_no" id="inputField19" value="{{ $ot->n_documento }}"  readonly="readonly"   style="width:110px" /></td>
                          </tr>
                        <tr>
                          <td class="sub_tabs">Servicio Realizado</td>
                          <td><input name="inputField7" type="text" class="sub_tabs_no" id="inputField20" value="{{ $ot->tipo_servicio->desc_tipo_servicio }}"  readonly="readonly"  style="width:110px" /></td>
                          </tr>
                        <tr>
                          <td class="sub_tabs">Tipo de Pago</td>
                          <td><input name="inputField8" type="text" class="sub_tabs_no" id="inputField21" value="{{ $ot->tipo_pago->desc_tipo_pago }}"  readonly="readonly"  style="width:110px" /></td>
                          </tr>
                        <tr>
                          <td class="sub_tabs">Mano de Obra</td>
                          <td><input name="inputField9" type="text" class="sub_tabs_no" id="inputField22" value="{{ $ot->v_mano_obra }}"  readonly="readonly"  style="width:110px" /></td>
                          </tr>
                        <tr>
                          <td class="sub_tabs">Abono/Pago</td>
                          <td><input name="inputField11" type="text" class="sub_tabs_no" id="inputField24" value="{{ $ot->v_abono }}"  readonly="readonly"  style="width:110px" /></td>
                        </tr>
                        <tr>
                          <td class="sub_tabs">Total</td>
                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><input name="inputField12" type="text" class="sub_tabs_no" id="inputField25" value="{{ $ot->v_pendiente}}"  readonly="readonly"  style="width:110px" /></td>
                                <td>&nbsp;</td>
                              </tr>
                          </table></td>
                          </tr>
                        <tr>
                          <td class="sub_tabs">Pendiente</td>
                          <td><input name="inputField13" type="text" class="sub_tabs_no2" id="inputField26" value="{{ $ot->v_pendiente }}"  readonly="readonly"  style="width:110px" /></td>
                        </tr>
                        </table></td>
                      <td width="52%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td class="sub_title3">Repuestos</td>
                              </tr>
                              <tr>
                                <td height="140">repuestos....</td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="49%"><span class="sub_tabs">Total repuestos</span></td>
                                <td width="51%"><input name="inputField10" type="text" class="sub_tabs_no" id="inputField23" value="{{ $ot->v_repuestos }}"  readonly="readonly"  style="width:110px" /></td>
                              </tr>
                            </table></td>
                          </tr>
                      </table></td>
                      </tr>
                    </table></td>
                  </tr>
                <tr>
                  <td height="19" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr class="Title03">
                      <td width="48%">Anulacion</td>
                      <td width="52%">&nbsp;</td>
                      </tr>
                    <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="45%" class="sub_tabs">Usuario</td>
                          <td width="55%"><input name="asda" type="text" class="sub_tabs_no" id="inputField27" value="{{ $ot->anu_nom_usr }}"  readonly="readonly"   style="width:110px" /></td>
                          </tr>
                        <tr>
                          <td class="sub_tabs">Nombre Solicitante</td>
                          <td><input name="asd" type="text" class="sub_tabs_no" id="inputField28" value="{{ $ot->anu_nombre }}"  readonly="readonly"  style="width:110px" /></td>
                          </tr>
                        <tr>
                          <td class="sub_tabs">Rut Solicitante</td>
                          <td><table width="110" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="80"><input name="inputField15" type="text" class="sub_tabs_no" id="inputField29" value="{{ $ot->anu_rut }}"  readonly="readonly"  style="width:80px" /></td>
                              <td width="21">-</td>
                              <td width="10"><input name="inputField16" type="text" class="sub_tabs_no" id="inputField30" value="{{ $ot->anu_dv }}" size="1" maxlength="1"  readonly="readonly"/></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="sub_title3" colspan="2">Observacion</td>
                        </tr>
                        <tr>
                          		<td>
                          			<textarea name="dsc_prob3" cols="20" rows="3" class="sub_tabs_no" id="dsc_prob3" style="width:260px"  readonly="readonly">{{ htmlspecialchars(trim((string)$ot->anu_obs), ENT_QUOTES) }}</textarea>
                          		</td>
                          </td>
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