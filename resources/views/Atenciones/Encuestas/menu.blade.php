<table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="29" class="sub_title_big">ENCUESTAS</td>
                            </tr>
                            <tr>
                              <td class="stylish_graverx">Gestión outbound</td>
                            </tr>
                            <tr>
                              <td height="5"></td>
                            </tr>
                            <tr>
                              <td height="20" class="sub_tabs_no">
                                <table width="160" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="17"><img src="img/rde3.png" width="11" height="13" /></td>
                                    <td width="143">Dia de Consulta</td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td bgcolor="#FFFFFF"><input type="text" name="dia" id="dia" class="tcal" value="<?php echo date('d/m/Y'); ?>" style="width:130px" readonly="readonly"/></td>
                            </tr>
                            <tr>
                              <td bgcolor="#CCCCCC">
                              <table width="160" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="17" height="13"><img src="img/rde3.png" width="11" height="13" /></td>
                                  <td width="143" class="sub_title2">Taller</td>
                                </tr>
                              </table>
                              </td>
                            </tr>
                            <tr>
                              <td>
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                  <select name="rgn" class="sub_title2" id="rgn" style="width:100%;" onchange="servisu()">
                                    <option value="-"></option>
                                  </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                  <select name="tec" class="sub_title2" id="tec" style="width:100%;" >
                                    <option value="">-</option>
                                  </select>
                                  </td>
                                </tr>
                              </table>
                              </td>
                            </tr>
                            <tr>
                              <td bgcolor="#CCCCCC"><table width="160" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="17"><img src="img/rde3.png" width="11" height="13" /></td>
                                  <td width="143" class="sub_title2">Estado</td>
                                </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td><span class="sub_title2">
                                <select name="sta" class="sub_title2"  id="sta" style="width:160px;">
                                  <option value="" >Todos los estados</option>
                                  <option value="N">Sin realizar</option>
                                  <option value="C">Realizados</option>
                                  <option value="S">Obsoletos</option>
                                </select>
                              </span></td>
                            </tr>

                            <tr>
                              <td bgcolor="#CCCCCC"><table width="160" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="17"><img src="img/rde3.png" width="11" height="13" /></td>
                                  <td width="143" class="sub_title2">Tipo de cierre</td>
                                </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td>
                              <span class="sub_title2">
                                <select name="tipo_cierre" class="sub_title2"  id="tipo_cierre" style="width:160px;">


                                  <option value="">Todos los tipos de cierre</option>

                                  <option value="-">asdasd</option>

                                </select>
                              </span>
                              </td>
                            </tr>

                            <tr>
                              <td height="2"></td>
                            </tr>
                            <tr>
                              <td height="25"><input name="button" type="button" class="sub_title3" id="button" value="Seleccionar" style="width:95%" onclick="$('#dv_historico').hide();$('#dv_listado').show();"/></td>
                            </tr>
                            <tr>
                              <td height="27"><input name="button2" type="button" class="sub_title3" id="button2" value="Historico" style="width:95%" onclick="$('#dv_historico').show();$('#dv_listado').hide();"/></td>
                            </tr>
                            <tr>
                              <td height="320" valign="bottom"><img src="img/flechette2.png" width="160" height="300" /></td>
                            </tr>
                          </table>