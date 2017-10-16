<table width="97%" border="0" cellspacing="0" cellpadding="0">
  <tr style="border:solid #000;">
    <td bgcolor="#7A7A7A">
      <tr>
        <td class="Title03">
          Buscar Gasfiter por:
          <select id="cbxTipoBusqueda" name="cbxTipoBusqueda" onChange="determinaTypeAnterior(this.value);">
            <option value="1">Nombre</option>
            <option value="2">Descuento</option>
            <option value="3">Categoria</option>
            <option value="4">SAT</option>
          </select>
        </td>
        <td class="Title03">
          <select id="txtBuscarRPT2" name="txtBuscarRPT2" style="display:none;">
            <option value="0">--Seleccione Descuento--</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="25">25</option>
          </select>
        </td>
        <td class="Title03">
          <input type="text" id="txtBuscarRPT1" name="txtBuscarRPT1" placeholder="Ingrese Nombre o Apellido" style="width:200px; display:block;" />
        </td>
        <td class="Title03">
          <select id="txtBuscarRPT3" name="txtBuscarRPT3" style="display:none;">
            <option value="0">--Seleccione Categoria--</option>
            <option value="1">Silver</option>
            <option value="2">Golden</option>
            <option value="3">Premium</option>
            <option value="4">Sin Categoria</option>
          </select>
        </td> 
        <td class="Title03">
          <select name="txtBusquedaTaller" id="txtBusquedaTaller" style="display:none;">
          </select>
        </td>
        <td class="Title03">
          <input type="button" class="Button02" id="btnBuscar2" name="btnBuscar2" value="Buscar" onClick="buscaGasfiterRPT();" />
          <?php if($var9997=='U8i0'){ ?>
          <input type="button" class="Button02" id="btnDescargarExcel" name="btnDescargarExcel" value="DESCARGAR REPORTE GENERA EXCEL" onClick="location.href='excelGasfiterGeneral.php?<?php echo $extra_http_vars; ?>';" align="left"/>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td height="361" colspan="15" align="left" class="Title03">
          <div id="DivTrRpt" style="overflow:scroll; height:450px; border:solid #000;"></div>
        </td>
      </tr>
    </table>