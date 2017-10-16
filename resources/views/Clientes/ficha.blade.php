
        <table width="257" border="0" cellspacing="1" cellpadding="0">
            <tr>
                <td width="251" height="10" bgcolor="#EAEAEA">
                    <table width="100%" border="0" cellspacing="0" cellpadding="5">
                        <tr>
                            <td width="7%" height="51" bgcolor="#999999">&nbsp;</td>
                            <td width="89%" class="sub_title_big">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td class="sub_tabs_msg">FICHA DE  CLIENTE</td>
                                    </tr>
                                    <tr>
                                        <td class="sub_tabs" id="sub_title"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                    <td height="12" bgcolor="#EAEAEA"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                        <tr>
                            <td width="33%" class="sub_tabs">Nombre Completo</td>
                            <td width="67%"><input name="textfield" type="text" class="sub_title_mega2" id="textfield" value="{{ $cliente_direccion->contacto }}" style="width:170px;" readonly="readonly"/></td>
                        </tr>
                        <tr>
                            <td class="sub_tabs">Rut/DV</td>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="59%"><input name="rut" type="text" class="sub_title_mega2" id="rut" value="{{ $cliente_direccion->cliente->rut }}" size="12"  style="width:120px;" readonly="readonly"/></td>
                                        <td width="33%" class="sub_tabs">-</td>
                                        <td width="8%"><input name="dv" type="text" class="sub_title_mega2" id="dv" size="1" maxlength="1" value="{{ $cliente_direccion->cliente->dv }}" readonly="readonly" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="sub_tabs">Direccion</td>
                            <td><input name="textfield15" type="text" class="sub_title_mega2" id="textfield15" value="{{ $cliente_direccion->direccion }}" style="width:170px;"  readonly="readonly"/></td>
                        </tr>
                        <tr>
                            <td class="sub_tabs">Sector</td>
                            <td><input name="textfield2" type="text" class="sub_title_mega2" id="textfield2" value="{{ $cliente_direccion->sector }}" style="width:170px;"  readonly="readonly"/></td>
                        </tr>
                        <tr>
                            <td class="sub_tabs">Comuna</td>
                            <td><input name="textfield5" type="text" class="sub_title_mega2" id="textfield5" value="{{ $cliente_direccion->comuna->desc_comuna }}" style="width:170px;"  readonly="readonly"/></td>
                        </tr>
                        <tr>
                            <td class="sub_tabs">Ciudad</td>
                            <td><input name="textfield4" type="text" class="sub_title_mega2" id="textfield4" value="{{ $cliente_direccion->ciudad->desc_ciudad }}" style="width:170px;"  readonly="readonly"/></td>
                        </tr>
                        <tr>
                            <td class="sub_tabs">Región</td>
                            <td><input name="textfield3" type="text" class="sub_title_mega2" id="textfield3" value="{{ $cliente_direccion->region->desc_region }}" style="width:170px;"  readonly="readonly"/></td>
                        </tr>
                        <tr>
                            <td class="sub_tabs">Fono Particular</td>
                            <td><input name="textfield6" type="text" class="sub_title_mega2" id="textfield6" value="{{ $cliente_direccion->fono_particular }}" style="width:170px;" readonly="readonly"/></td>
                        </tr>
                        <tr>
                            <td class="sub_tabs">Fono Trabajo</td>
                            <td><input name="textfield7" type="text" class="sub_title_mega2" id="textfield7" value="{{ $cliente_direccion->fono_trabajo }}" style="width:170px;"  readonly="readonly"/></td>
                        </tr>
                        <tr>
                            <td class="sub_tabs">Fono Celular</td>
                            <td><input name="textfield8" type="text" class="sub_title_mega2" id="textfield8" value="{{ $cliente_direccion->celular }}" style="width:170px;"  readonly="readonly"/></td>
                        </tr>
                        <tr>
                            <td class="sub_tabs">Fax</td>
                            <td><input name="textfield9" type="text" class="sub_title_mega2" id="textfield9" value="{{ $cliente_direccion->fax }}" style="width:170px;"  readonly="readonly"/></td>
                        </tr>
                        <tr>
                            <td class="sub_tabs">Email</td>
                            <td><input name="textfield10" type="text" class="sub_title_mega2" id="textfield10" value="{{ $cliente_direccion->email }}" style="width:170px;"  readonly="readonly"/></td>
                        </tr>
                    </table></td>
                </tr>
                <tr>
                    <td height="5" bgcolor="#EAEAEA"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="7%" height="19" bgcolor="#999999">&nbsp;</td>
                            <td width="89%" class="sub_title_big"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td height="18" class="stylish_graverx_b">Datos de Producto</td>
                                </tr>
                            </table></td>
                        </tr>
                    </table></td>
                </tr>
                <tr>
                    <td height="150" align="left" valign="top" bgcolor="#EAEAEA"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td height="75"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="37%" height="2" valign="top" bgcolor="#EAEAEA"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td><img src="{{ asset('img/'.$ot->tipo_producto->img) }}" width="80" height="93" /></td>
                                        </tr>
                                        <tr>
                                            <td><img src="{{ asset('img/'.$ot->marca->img) }}" width="80" height="20" /></td>
                                        </tr>
                                    </table></td>
                                    <td width="63%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="fields">Modelo
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input name="textfield11" type="text" class="sub_tabs" id="textfield11" value="{{ $ot->desc_modelo }}" style="width:160px;" readonly="readonly" /></td>
                                        </tr>
                                        <tr>
                                            <td class="fields">Fecha de Compra</td>
                                        </tr>
                                        <tr>
                                            <td><input name="textfield13" type="text" class="sub_tabs" id="textfield13" value="{{ date('d/m/Y', strtotime($ot->f_comp)) }}" style="width:160px;"  readonly="readonly"/></td>
                                        </tr>
                                        <tr>
                                            <td class="fields">Lugar de Compra</td>
                                        </tr>
                                        <tr>
                                            <td ></td>
                                        </tr>
                                    </table></td>
                                </tr>
                                <tr>
                                    <td height="3" valign="top" bgcolor="#999999"></td>
                                    <td align="left" valign="top" bgcolor="#999999"></td>
                                </tr>
                            </table></td>
                        </tr>
                        <tr>
                            <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
                                <tr>
                                    <td width="37%" class="sub_tabs">Garantia</td>
                                    <td width="63%"><input name="textfield12" type="text" class="sub_title_mega2" id="textfield12" value="" style="width:170px;" readonly="readonly"/></td>
                                </tr>
                                <tr>
                                    <td class="sub_tabs">Presupuesto</td>
                                    <td><input name="tppto" type="text" class="sub_title_mega2" id="tppto" value="<?php if ($ot->m_ppto == 0) echo 'SI'; else echo 'NO'; ?>" style="width:170px;"  readonly="readonly"/></td>
                                </tr>
                                <tr>
                                    <td class="sub_tabs">Atencion Pendiente?</td>
                                    <td><input name="pendiente" type="text" class="sub_title_mega2" id="pendiente" value="<?php if($num_pendientes==0) echo "NO"; else echo "SI"; ?>" style="width:170px;"  readonly="readonly"/></td>
                                </tr>
                            </table></td>
                        </tr>
                    </table></td>
                </tr>
            </table>