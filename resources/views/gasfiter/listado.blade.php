<table border="0" cellspacing="3" cellpadding="1" style="text-align:justify; width:97%; height:100%; ">
  <tr>
    <td class="Title03" colspan="4" style="border:solid #000;">
      Buscar Gasfiter por:
      <select id="cbxTipoBusquedaListado" name="cbxTipoBusquedaListado" onChange="determinaTypeAnterior2(this.value);">
        <option value="0" selected="selected">---</option>
        <option value="1">Rut</option>
        <option value="2">Nombre</option>
      </select>
    </td>
    <td class="Title03" colspan="4" style="border:solid #000;">
      <input type="text" id="txtBuscar" name="txtBuscar" style="width:200px; display:none;" placeholder="Ingrese Nombre"/>
      <input type="text" align="left" id="txtBuscarRut" name="txtBuscarRut" style="width:200px; display:none" placeholder="Ingrese Rut" />
      <input type="button" class="Button02" id="btnBuscar" name="btnBuscar" value="Buscar" style="display:none;" onClick="buscaGasfiter();" />
    </td>
  </tr>
  <tr>
    <td height="361" colspan="8" align="left" valign="top" class="Title03">
      <table id="t_gasfiter" width="100%" border="0" cellpadding="0" cellspacing="1">
        <thead>
          <tr bordercolor="#999999" align="center">
            <th bgcolor="#CCCCCC" class="sub_tabs" style="text-align: center !important;"><h3>Nº</h3></th>
            <th bgcolor="#CCCCCC" class="sub_tabs" style="text-align: center !important;"><h3>SAT</h3></th>
            <th bgcolor="#CCCCCC" class="sub_tabs" style="text-align: center !important;"><h3>Rut</h3></th>
            <th bgcolor="#CCCCCC" class="sub_tabs" style="text-align: center !important;"><h3>Nombre</h3></th>
            <th bgcolor="#CCCCCC" class="sub_tabs" style="text-align: center !important;"><h3>Categoria</h3></th>
            <th bgcolor="#CCCCCC" class="sub_tabs" style="text-align: center !important;"><h3>Descuento</h3></th>
            <th bgcolor="#CCCCCC" class="sub_tabs" style="text-align: center !important;"><h3>Monto Compra Total</h3></th>
            <th bgcolor="#CCCCCC" class="sub_tabs" style="text-align: center !important;"><h3>Monto Compra</h3></th>
            <th bgcolor="#CCCCCC" class="sub_tabs" style="text-align: center !important;"><h3>Editar</h3></th>
          </tr>
        </thead>
      </table>
    </td>
  </tr>
</table>

<script type="text/javascript">

  function buildSearchData(){
    var obj = {
      "_token": "{{csrf_token()}}"
    };
    return obj;
  }

  $(document).ready(function(){
    var t_gasfiter = $('#t_gasfiter').DataTable({
      language: { url: "{{ asset('js/jquery.dataTables.esp.json') }}" },
      processing: true,
      searching:  false,
      ordering:   false,
      lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "Todos"]],
      ajax: {
        url: "{{ route('get_gasfiter') }}",
        data: buildSearchData,
        type: 'POST'
      },
      columns: [
        { data: null },
        { data: 'TallerGas',      name: 'TallerGas' },
        { data: 'RutGas',         name: 'RutGas' },
        { data: 'NombreGas',    name: 'NombreGas' },
        { data: 'CategoriaGas',  name: 'CategoriaGas' },
        { data: 'DescuentoGas',  name: 'DescuentoGas' },
        { data: 'MontoCompraGas',  name: 'MontoCompraGas' },
        { data: null },
        { data: null },
      ],
      "createdRow": function( row, data, dataIndex){
        $('td', row).eq(0).html(dataIndex + 1).addClass('table-col-gasfiter');
        $('td', row).eq(1).addClass('table-col-gasfiter');
        $('td', row).eq(2).addClass('table-col-gasfiter');
        $('td', row).eq(3).addClass('table-col-gasfiter');
        $('td', row).eq(4).addClass('table-col-gasfiter');
        $('td', row).eq(5).addClass('table-col-gasfiter');
        $('td', row).eq(6).addClass('table-col-gasfiter');
        $('td', row).eq(7).addClass('table-col-gasfiter');
        $('td', row).eq(8).addClass('table-col-gasfiter');
      }
    });
  });
  
  function determinaTypeAnterior2(valor){

    if(valor==2){ //Nombre
      $('#txtBuscar').css('display','inline');
      $('#txtBuscarRut').css('display','none');
      $('#btnBuscar').css('display','inline');
    }
    if(valor==1){ //Rut
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

</script>