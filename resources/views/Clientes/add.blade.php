@extends('layouts.master')

@section('content')
<form id="form_add" action="{{ route('cliente_save') }}" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="hf_msg_nuevo" id="hf_msg_nuevo" value="{{ $msg_nuevo }}">
  <input type="hidden" name="hf_opc" id="hf_opc">
  <input type="hidden" name="id_cliente_direccion" id="id_cliente_direccion">
  <table width="100%" height="286" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="76%" height="286" align="left" valign="top" bgcolor="#CCCCCC">
        <table width="100%" border="0" cellspacing="0" cellpadding="1">
          <tr>
            <td height="218" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="65%" height="10" align="left" valign="top" bgcolor="#999999"><table width="100%" border="0" cellspacing="2" cellpadding="0" bordercolor="#999999">
                  <tr>
                    <td width="2%" class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" width="11" height="13" /></td>
                    <td width="38%" bgcolor="#BBBBBB" class="stylish_graverx_b">Rut</td>
                      <td width="60%" bgcolor="#CCCCCC">
                        <table width="280" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="157"><input name="rut" type="text" class="sub_title" id="rut"  style="width:150px;" onkeypress="return validarn(event)" maxlength="8" onblur="deve($('#rut').val(), $('#dv'));" value="{{ $rut }}" /></td>
                            <td width="15">-</td>
                            <td width="48"><span class="fields">
                              <input name="dv" type="text" class="sub_title" id="dv" size="2" maxlength="2" readonly="readonly" style="width:30px;" value="{{ $dv }}" />
                            </span></td>
                            <td width="60"><input name="btn_verificar" type="button" class="sub_title3" id="btn_verificar" value="Verificar" /></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                      <td bgcolor="#BBBBBB" class="stylish_graverx_b">Nombre</td>
                      <td bgcolor="#CCCCCC"><input name="nombre" type="text" disabled="disabled" class="sub_title" id="nombre"  style="width:220px;" maxlength="180" value="" /></td>
                    </tr>
                    <tr>
                      <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                      <td bgcolor="#BBBBBB" class="stylish_graverx_b">Direccion</td>
                      <td bgcolor="#CCCCCC">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="10%"><select name="id_tipo_direccion" class="sub_title" id="id_tipo_direccion" style="width:65px;" disabled="disabled">
                              <option value="-" selected="selected">-</option>
                              @foreach($tipo_direcciones as $td)
                                <option value="{{ $td->id_tipo_direccion }}">{{ $td->desc_tipo_direccion}}</option>
                              @endforeach
                            </select></td>
                            <td width="90%"><input name="direccion" type="text" class="sub_title" id="direccion"  style="width:155px;" maxlength="180" disabled="disabled" value="" /></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                      <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">Sector</td>
                      <td bgcolor="#CCCCCC"><input name="sector" type="text" disabled="disabled" class="sub_title" id="sector"  style="width:220px;" maxlength="180"  value="" disabled="disabled" /></td>
                    </tr>
                    <tr>
                      <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                      <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">Region</td>
                      <td bgcolor="#CCCCCC"><select name="id_region" class="sub_title" id="id_region" style="width:220px;" disabled="disabled" >
                        <option value="-">-</option>
                        @foreach ($regiones as $r)
                          <option value="{{ $r->id_region }}">{{ $r->desc_region }}</option>
                        @endforeach
                     </select></td>
                   </tr>
                   <tr>
                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                    <td bgcolor="#BBBBBB" class="stylish_graverx_b">Ciudad</td>
                    <td bgcolor="#CCCCCC"><select name="id_ciudad" class="sub_title" id="id_ciudad" style="width:220px;" disabled="disabled">
                      <option value="-">-</option>
                    </select></td>
                  </tr>
                  <tr>
                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                    <td bgcolor="#BBBBBB" class="stylish_graverx_b">Comuna</td>
                    <td bgcolor="#CCCCCC"><select name="id_comuna" class="sub_title" id="id_comuna" style="width:220px;" disabled="disabled">
                      <option value="-" >-</option>
                    </select></td>
                  </tr>
                  <tr>
                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                    <td bgcolor="#BBBBBB" class="stylish_graverx_b">Telefono Particular</td>
                    <td bgcolor="#CCCCCC"><input name="fono_particular" type="text" class="sub_title" id="fono_particular"  style="width:220px;" onkeypress="return validarn(event)" maxlength="20" disabled="disabled"  value="" /></td>
                  </tr>
                  <tr>
                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                    <td bgcolor="#BBBBBB" class="stylish_graverx_b">Telefono Celular</td>
                    <td bgcolor="#CCCCCC"><input name="celular" type="text" class="sub_title" id="celular"  style="width:220px;" onkeypress="return validarn(event)" maxlength="20"  disabled="disabled"  value="" /></td>
                  </tr>
                  <tr>
                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                    <td bgcolor="#BBBBBB" class="stylish_graverx_b">Telefono Trabajo</td>
                    <td bgcolor="#CCCCCC"><input name="fono_trabajo" type="text" class="sub_title" id="fono_trabajo"  style="width:220px;" onkeypress="return validarn(event)" maxlength="20"  disabled="disabled"  value="" /></td>
                  </tr>
                  <tr>
                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                    <td bgcolor="#BBBBBB" class="stylish_graverx_b">E-mail</td>
                    <td bgcolor="#CCCCCC"><input name="email" type="text" class="sub_title" id="email"  style="width:220px;" maxlength="40"  disabled="disabled"  value="" /></td>
                  </tr>
                </table></td>
                <td width="35%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="22" class="sub_title3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="57%">&nbsp;</td>
                        <td width="17%"><a href="{{ route('clientes') }}" class="main_fitz" id="button2">Volver</a></td>
                        <td width="26%"><input name="btn_save" type="button" class="main_fitz" id="btn_save" value="Crear Cliente" /></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="12" class="sub_title3">Mapa de Rutas</td>
                  </tr>
                  <tr>
                    <td width="360" height="153">
                      <!-- <img src="http://maps.google.com/maps/api/staticmap?size=361x231&maptype=roadmap\&markers=size:mid%7Ccolor:red%7Cmetropolitana+santiago+la+cisterna+fernandez+albano+97,Chile&sensor=false&zoom=16" width="361" height="231" /> -->
                    </td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

  <script>

    $(document).ready(function () {


      if ($('#hf_msg_nuevo').val() == 'si') {
        $('#lbl_popupTitulo').html('Advertencia');
        $('#lbl_message').html('Cliente Nuevo, por favor ingresar los datos.');
        $('#dv_popupigood').show();
        $('#dv_popup').show();
      }

      $('#btn_verificar').click(function(e){
        e.preventDefault();

        deve($('#rut').val(), $('#dv'));
        form = $('#form_add');
        url = "<?php echo route('cliente_existe'); ?>";
        
        $.post(url, form.serialize(), function(result){
            if (result.existe) {
              form.attr('action', "<?php echo route('cliente_edit'); ?>");
              form.submit();
            } else {
              $('#lbl_popupTitulo').html('Advertencia');
              $('#lbl_message').html('Cliente Nuevo, por favor ingresar los datos.');
              $('#dv_popupigood').show();
              $('#dv_popup').show();
              limpiar_ctrl();
              disabled_ctrl(false);
            }
        }).fail(function(result){
            var msg = '';
            if (result.responseJSON) {
              $.each(result.responseJSON, function(k, v) {
                  msg += v + '<br />';
              });
            } else { msg = 'Error de sistema. Favor de comunicarse con los administradores.'; }

            $('#lbl_popupTitulo').html('Error de Datos');
            $('#lbl_message').html(msg);
            $('#dv_popupiadvice').show();
            $('#dv_popup').show();
        });
      });

      //Cargar Ciudades
      $('#id_region').on('change',function(e){
        $.get("<?php echo route('load_ciudades') ?>?id_region=" + e.target.value, function(data){
          $('#id_ciudad').empty();
          $('#id_ciudad').append('<option value="-">-</option>');
          $.each(data, function(index, ciudad){
            $('#id_ciudad').append('<option value="' + ciudad.id_ciudad + '">' + ciudad.desc_ciudad + '</option>');
          });
        });
      });

      //Cargar Comunas
      $('#id_ciudad').on('change',function(e){
        $.get("<?php echo route('load_comunas') ?>?id_ciudad=" + e.target.value, function(data){
          $('#id_comuna').empty();
          $('#id_comuna').append('<option value="-">-</option>');
          $.each(data, function(index, comuna){
            $('#id_comuna').append('<option value="' + comuna.id_comuna + '">' + comuna.desc_comuna + '</option>');
          });
        });
      });

      $('#btn_save').click(function(e){
        e.preventDefault();

        deve($('#rut').val(), $('#dv'));
        form = $('#form_add');
        url = "<?php echo route('cliente_save'); ?>";
        
        $.post(url, form.serialize(), function(result){
            form.attr('action', "<?php echo route('cliente_ficha'); ?>");
            $('#id_cliente_direccion').val(result.id_cliente_direccion);
            form.submit();
        }).fail(function(result){
            var msg = '';
            if (result.responseJSON) {
              $.each(result.responseJSON, function(k, v) {
                  msg += v + '<br />';
              });
            } else { msg = 'Error de sistema. Favor de comunicarse con los administradores.'; }

            $('#lbl_popupTitulo').html('Error de Datos');
            $('#lbl_message').html(msg);
            $('#dv_popupigood').hide();
            $('#dv_popupibad').hide();
            $('#dv_popupiadvice').show();
            $('#dv_popup').show();
        });
      });

    });

    function disabled_ctrl(opc){

      $('#nombre').prop('disabled', opc);
      $('#id_tipo_direccion').prop('disabled', opc);
      $('#direccion').prop('disabled', opc);
      $('#sector').prop('disabled', opc);
      $('#id_region').prop('disabled', opc);
      $('#id_ciudad').prop('disabled', opc);
      $('#id_comuna').prop('disabled', opc);
      $('#fono_particular').prop('disabled', opc);
      $('#celular').prop('disabled', opc);
      $('#fono_trabajo').prop('disabled', opc);
      $('#email').prop('disabled', opc);
    
    }

    function limpiar_ctrl() {
      $('#nombre').val('');
      $('#id_tipo_direccion').val('-');
      $('#direccion').val('');
      $('#sector').val('');
      $('#id_region').val('-');
      $('#id_ciudad').empty().append('<option value="-">-</option>').val('-');
      $('#id_comuna').empty().append('<option value="-">-</option>').val('-');
      $('#fono_particular').val('');
      $('#celular').val('');
      $('#fono_trabajo').val('');
      $('#email').val('');

    }

  </script>

</form>
@endsection