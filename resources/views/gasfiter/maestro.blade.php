<table border="0" cellspacing="1" cellpadding="1" style="text-align:justify; width:97%; height:100%; ">
  <tr>
    <td align="right" class="Title03">Rut</td>
    <td align="left" class="Title03">
      <!--input type="text" name="txtRut" id="txtRut" onChange="validaRut(this.value);" value="<?php echo $txtRut; ?>" <?php echo $var_readonly; ?>-->
      <table width="280" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="157">
            <input name="txtRut" type="text" id="txtRut" onkeypress="return validarn(event)" maxlength="8" onblur="deve('core','txtRut','dv');" value="<?php echo $txtRut; ?>" />
          </td> 
          <td width="15">-</td>
          <td width="48"><span class="fields">
            <input name="dv" type="text" id="dv" size="2" maxlength="2" readonly style="width:30px;" <?php echo $dv; ?> />
          </span></td>
          <td width="60"><input name="button3" type="button" class="sub_title3" id="button3" value="Verificar" onclick="validaRut();"/></td>
        </tr>
      </table>
      <div id="txtMsgRut" style="color:#FF3333;"></div>
    </td>
  </tr>
  <tr>
    <td align="right" class="Title03">Nombre</td>
    <td align="left" class="Title03">
      <input type="text" name="txtNombre" id="txtNombre" value="<?php echo $txtNombre; ?>"/>
    </td>
  </tr>
  <tr>
    <td align="right" class="Title03">Apellido</td>
    <td align="left" class="Title03">
      <input type="text" name="txtApellido" id="txtApellido" value="<?php echo $txtApellido; ?>"/>
    </td>
  </tr>
  <tr>
    <td align="right" class="Title03">Direcci&oacute;n</td>
    <td align="left" class="Title03">
      <input type="text" name="txtDireccion" id="txtDireccion" value="<?php echo $txtDireccion; ?>"/>
    </td>
  </tr>
  
  <tr>
    <td align="right" class="Title03">Regi&oacute;n</td>
    <td align="left" class="Title03">
      <select name="cbxRegion1" id="cbxRegion1" onChange="getComunas(this.value);">
        <option value="0" selected>---</option>
        <?php
        $sql = "SELECT cd_rgn,nm_rgn,dsc_rgn FROM regiones ORDER BY cd_rgn";
        $result = mysqli_query($_SERVER['SQL_LINK'], $sql);
        if($result){
          while($rec = mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo $rec['cd_rgn']; ?>"><?php echo $rec['dsc_rgn'].' ('.$rec['nm_rgn'].')'; ?></option>
            <?php
          }
        };
        ?>
      </select>
      <script type="text/javascript">    
        $('#cbxRegion1> option[value="<?php echo $cbxRegion; ?>"]').attr('selected', 'selected');
      </script>
    </td>
  </tr>
  <tr>
    <td align="right" class="Title03">Provincia</td>
    <td align="left" class="Title03">
      <select name="cbProvincias" id="cbProvincias" onChange="getProvincias(this.value);"></select>
    </td>
  </tr>
  <tr>
    <td align="right" class="Title03">Comuna</td>
    <td align="left" class="Title03">
      <select name="cbxComuna" id="cbxComuna"></select>
    </td>
  </tr>
  <tr>
    <td align="right" class="Title03">Tel&eacute;fono</td>
    <td align="left" class="Title03">
      <input type="text" name="txtTelefono" id="txtTelefono" value="<?php echo $txtTelefono; ?>"/>
    </td>
  </tr>
  
  <tr>
    <td align="right" class="Title03">Celular</td>
    <td align="left" class="Title03">
      <input type="text" name="txtCelular" id="txtCelular" value="<?php echo $txtCelular; ?>"/>
    </td>
  </tr>
  <tr>
    <td align="right" class="Title03">Correo</td>
    <td align="left" class="Title03">
      <input type="text" name="txtCorreo" id="txtCorreo" value="<?php echo $txtCorreo; ?>"/>
    </td>
  </tr>
  <tr>
    <td align="right" class="Title03">Taller</td>
    <td align="left" class="Title03">
      <select name="txtTallerAsociado" id="txtTallerAsociado">
      </select>
      <script type="text/javascript">    
        $('#txtTallerAsociado> option[value="<?php echo $txtTallerAsociado; ?>"]').attr('selected', 'selected');
      </script>
    </td>
  </tr>
  <tr>
    <td align="right" class="Title03">Descuento</td>
    <td align="left" class="Title03">
      <select id="txtDescuento" name="txtDescuento">
        <option value="0">--Seleccione--</option>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
        <option value="25">25</option>
      </select>
      <script type="text/javascript">    
        $('#txtDescuento> option[value="<?php echo $txtDescuento; ?>"]').attr('selected', 'selected');
      </script>
    </td>
  </tr>
  <?php
  if($var9997=='U8i0'){
    ?>
    <tr>
      <td align="right" class="Title03">Categor&iacute;a</td>
      <td align="left" class="Title03">
        <select id="txtCategoria" name="txtCategoria">
          <option value="0">--Seleccione--</option>
          <option value="1">Silver</option>
          <option value="2">Golden</option>
          <option value="3">Premium</option>
          <option value="4">Sin Categoria</option>
        </select>
        <script type="text/javascript">    
          $('#txtCategoria> option[value="<?php echo $txtCategoria; ?>"]').attr('selected', 'selected');
        </script>
      </td>
    </tr>
    <?php
  }
  ?>
                                  <!--tr>
                                    <td align="right" class="Title03">Monto Compra</td>
                                    <td align="left" class="Title03">
                                      <input type="text" name="txtMontoCompra" id="txtMontoCompra" value="<?php echo $txtMontoCompra; ?>"/>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="right" class="Title03">Monto Compra Total</td>
                                    <td align="left" class="Title03">
                                      <input type="text" name="txtMontoCompraTotal" id="txtMontoCompraTotal" value="<?php echo $txtMontoCompraTotal; ?>"/>
                                    </td>
                                  </tr-->
                                  <tr>
                                    <td align="right" class="Title03">Estado</td>
                                    <td align="left" class="Title03">
                                      <select id="txtActivo" name="txtActivo">
                                        <option value="0">--Seleccione--</option>
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
                                      </select>
                                      <script type="text/javascript">    
                                        $('#txtActivo> option[value="<?php echo $txtActivo; ?>"]').attr('selected', 'selected');
                                      </script>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    
                                    <td align="center" class="Title03" colspan="2">    
                                      <?php
                                      if($varDisplay==1){
                                        ?>
                                        <input type="button" class="Button02" id="btnActualizar" name="btnActualizar" value="Actualizar" onClick="actualizaGasfiter();"/>
                                        
                                        <?php
                                      } else {
                                        ?>
                                        <input type="button" class="Button02" id="btnGuardar" name="btnGuardar" value="Guardar" onClick="guardaGasfiter();"/>
                                        <?php
                                      }
                                      ?>
                                      <input type="button" class="Button02" id="btnLimpiar" name="btnLimpiar" value="Limpiar" onClick="javascript:location.href='gasfiter.php?<?php echo $extra_http_vars; ?>';" />
                                      
                                      
                                    </td>
                                  </tr>
                                </table>