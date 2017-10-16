@extends('layouts.master')

@section('content')
<form id="form_index" name="form_index" method="POST" action="{{ route('clientes') }}" >
  {{ csrf_field() }}
  <input type="hidden" name="hf_msg_nuevo" id="hf_msg_nuevo" >
  <input type="hidden" name="id_cliente_direccion" id="id_cliente_direccion" >
  <table width="100%" height="232" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="232" align="left" valign="top"><table width="100%" height="232"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="83%" height="232" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                <tr>
                  <td width="92%" height="50"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="21" class="sub_tabs">Seleccione los criterios de busqueda del cliente.</td>
                    </tr>
                    <tr>
                      <td><table width="659" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="20" class="stylish_graverx_b"><input name="chk_search" type="radio" id="chk_search_1" value="1" checked="checked" onclick="radio_select(1)" /></td>
                          <td width="70" class="stylish_graverx_b">Rut:</td>
                          <td width="252"><table width="180" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="135"><input name="rut" type="text" class="sub_title" id="rut" style="width:120px;" onkeypress="return validarn(event)" onblur="deve($('#rut').val(), $('#dv'));" onclick="txt_select(1)" maxlength="8" value="{{ $rut }}" /></td>
                              <td width="15">-</td>
                              <td width="30"><span class="fields">
                                <input name="dv" type="text" class="sub_title" id="dv" size="2" maxlength="2" readonly="readonly" value="{{ $dv }}" style="width:30px;" />
                              </span></td>
                            </tr>
                          </table></td>
                          <td width="20"><span class="stylish_graverx_b">
                            <input name="chk_search" type="radio" id="chk_search_3" value="3"  onclick="radio_select(3)" />
                          </span></td>
                          <td width="96"><span class="stylish_graverx_b">Telefono</span></td>
                          <td width="201"><input name="fono_particular" type="text" class="sub_title" id="fono_particular"  style="width:180px;" onkeypress="validaro(event)" onclick="txt_select(3)" /></td>
                        </tr>
                        <tr>
                          <td class="stylish_graverx_b"><input name="chk_search" type="radio" id="chk_search_2" value="2"  onclick="radio_select(2)" /></td>
                          <td class="stylish_graverx_b">Direccion</td>
                          <td><input name="dire" type="text" class="sub_title" id="dire"  style="width:180px;" onkeypress="validaro(event)" maxlength="40"  onclick="txt_select(2)"/></td>
                          <td><span class="stylish_graverx_b">
                            <input name="chk_search" type="radio" id="chk_search_4" value="4"  onclick="radio_select(4)" />
                          </span></td>
                          <td class="stylish_graverx_b">Nombre</td>
                          <td><input type="hidden" name="sele" id="sele" />
                            <input name="nombre" type="text" class="sub_title" id="nombre"  style="width:180px;" onkeypress="validaro(event)" maxlength="25"  onclick="txt_select(4)"/></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                    <td width="8%" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><input id="btn_add" name="btn_cliente" type="submit" class="main_fitz" value="Nuevo Cliente" style="width:140px"/></td>
                      </tr>
                      <tr>
                        <td><input id="btn_search" name="btn_cliente" type="submit" class="main_fitz" id="button2" value="Buscar Cliente" style="width:140px"/></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="10" align="left" valign="top" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="2" class="Title03"></td>
                  </tr>
                  <tr>
                    <td height="130" align="left" valign="top">
                      @include('Clientes.list')
                    </td>
                  </tr>
                  <tr>
                    <td height="2" align="left" valign="top" class="sub_title3"></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <input type="hidden" name="hf_btn" id="hf_btn" value="">
    <script type="text/javascript">
      function buildSearchData(){
        var obj = {
          "rut" : $('#rut').val(),
          "_token": "{{csrf_token()}}"
        };
        return obj;
      }

      $(document).ready(function () {

          var tabla = $('#clientes-table').DataTable({
                      language: { url: "{{ asset('js/jquery.dataTables.esp.json') }}" },
                      processing: true,
                      searching:  false,
                      ordering:   false,
                      lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "Todos"]],
                      ajax: {
                        url: "<?php echo route('cliente_search'); ?>",
                        data: buildSearchData,
                        type: 'POST'
                      },
                      columns: [
                        { data: 'nom_cliente', name: 'nom_cliente' },
                        { data: 'id_cliente_direccion', name: 'cliente_direcciones.id_cliente_direccion' },
                        { data: 'rut', name: 'clientes.rut' },
                        { data: 'fono_particular', name: 'cliente_direcciones.fono_particular' },
                        { data: 'direccion', name: 'cliente_direcciones.direccion' },
                        { data: 'editar', name: 'editar' },
                        { data: 'atencion', name: 'atencion' }
                      ],
                      "createdRow": function( row, data, dataIndex){
                          $('td', row).eq(1).addClass('gray40Column');
                          $('td', row).eq(2).addClass('gray40Column');
                          $('td', row).eq(7).addClass('gray40Column');
                          $('td', row).eq(8).addClass('gray40Column');
                      }
          });

          $('#btn_search').click(function(e) {
              e.preventDefault();
              tabla.ajax.reload();
          });

          $('#btn_add').click(function(e) {
              e.preventDefault();

              deve($('#rut').val(), $('#dv'));
              $('#hf_btn').val('add');
              form = $('#form_index');
              url = "<?php echo route('cliente_existe'); ?>";
              
              $.post(url, form.serialize(), function(result){
                  if (result.existe) {
                    $('#id_cliente_direccion').val(result.id_cliente_direccion);
                    form.attr('action', "<?php echo route('cliente_edit'); ?>");
                    form.submit();
                  } else {
                    $('#hf_msg_nuevo').val('no');
                    form.attr("action", "<?php echo route('cliente_add'); ?>")
                    form.submit();
                  }
              }).fail(function(result){
                  var msg = '';
                  if (result.responseJSON) {
                    $.each(result.responseJSON, function(k, v) {
                        msg += v + '<br />';
                    });
                  } else { msg = 'Error de sistema. Favor de comunicarse con los administradores.'; }

                  $('#lbl_popupTitulo').html('Error de Datos');
                  $('#lbl_message').html(msg)
                  $('#dv_popup').show();
              });
              
          });          

      });

      function editar(id_cliente_direccion)
      {
        form = $('#form_index');
        $('#id_cliente_direccion').val(id_cliente_direccion);
        form.attr('action', "<?php echo route('cliente_edit'); ?>");
        form.submit();
      }

      function atencion(id_cliente_direccion)
      {
        form = $('#form_index');
        $('#id_cliente_direccion').val(id_cliente_direccion);
        form.attr('action', "<?php echo route('cliente_ficha'); ?>");
        form.submit();
      }

      function radio_select(valor)
      {
        switch(valor) {
          case 1:
            $('#fono_particular').val('');
            $('#dire').val('');
            $('#nombre').val('');
            break;
          case 2:
            $('#rut').val('');
            $('#fono_particular').val('');
            $('#nombre').val('');
            break;
          case 3:
            $('#rut').val('');
            $('#dire').val('');
            $('#nombre').val('');
            break;
          case 4:
            $('#rut').val('');
            $('#fono_particular').val('');
            $('#dire').val('');
            break;
        }
      }

      function txt_select(valor)
      {
        switch(valor) {
          case 1:
            $("#chk_search_1").prop("checked", true);
            $("#chk_search_2").prop("checked", false);
            $("#chk_search_3").prop("checked", false);
            $("#chk_search_4").prop("checked", false);

            $('#fono_particular').val('');
            $('#dire').val('');
            $('#nombre').val('');
            break;
          case 2:
            $("#chk_search_1").prop("checked", false);
            $("#chk_search_2").prop("checked", true);
            $("#chk_search_3").prop("checked", false);
            $("#chk_search_4").prop("checked", false);

            $('#rut').val('');
            $('#fono_particular').val('');
            $('#nombre').val('');
            break;
          case 3:
            $("#chk_search_1").prop("checked", false);
            $("#chk_search_2").prop("checked", false);
            $("#chk_search_3").prop("checked", true);
            $("#chk_search_4").prop("checked", false);

            $('#rut').val('');
            $('#dire').val('');
            $('#nombre').val('');
            break;
          case 4:
            $("#chk_search_1").prop("checked", false);
            $("#chk_search_2").prop("checked", false);
            $("#chk_search_3").prop("checked", false);
            $("#chk_search_4").prop("checked", true);

            $('#rut').val('');
            $('#fono_particular').val('');
            $('#dire').val('');
            break;
        }
      }
    </script>

  </form>

  
@endsection