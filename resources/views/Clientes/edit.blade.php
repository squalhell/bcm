@extends('layouts.master')

@section('content')
<form id="form_edit" action="{{ route('cliente_save') }}" method="post" >
  {{ csrf_field() }}
  <input type="hidden" name="hf_msg_nuevo" id="hf_msg_nuevo" value="{{ $msg_nuevo }}">
  <input type="hidden" name="id_cliente_direccion" id="id_cliente_direccion" >
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
                            <td width="157"><input name="rut" type="text" class="sub_title" id="rut"  style="width:150px;" onkeypress="return validarn(event)" maxlength="8" onblur="deve($('#rut').val(), $('#dv'));" value="{{ $cliente_direccion->cliente->rut }}" /></td>
                            <td width="15">-</td>
                            <td width="48"><span class="fields">
                              <input name="dv" type="text" class="sub_title" id="dv" size="2" maxlength="2" readonly="readonly" style="width:30px;" value="{{ $cliente_direccion->cliente->dv }}" />
                            </span></td>
                            <td width="60"><input name="btn_verificar" type="button" class="sub_title3" id="btn_verificar" value="Verificar" onclick="deve($('#rut').val(), $('#dv'));"/></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                      <td bgcolor="#BBBBBB" class="stylish_graverx_b">Nombre</td>
                      <td bgcolor="#CCCCCC"><input name="nombre" type="text" class="sub_title" id="nombre"  style="width:220px;" onkeypress="return validarln(event)" maxlength="180" value="{{ $cliente_direccion->contacto }}" /></td>
                    </tr>
                    <tr>
                      <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                      <td bgcolor="#BBBBBB" class="stylish_graverx_b">Direccion</td>
                      <td bgcolor="#CCCCCC">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="10%"><select name="id_tipo_direccion" class="sub_title" id="id_tipo_direccion" style="width:65px;" >
                              <option value="-" selected="selected">-</option>
                              @foreach($tipo_direcciones as $td)
                                <option value="{{ $td->id_tipo_direccion }}" <?php if($cliente_direccion->id_tipo_direccion == $td->id_tipo_direccion) echo "selected" ?>>{{ $td->desc_tipo_direccion}}</option>
                              @endforeach
                            </select></td>
                            <td width="90%"><input name="direccion" type="text" class="sub_title" id="direccion"  style="width:155px;" onkeypress="return validarln(event)" maxlength="180" value="{{ $cliente_direccion->direccion }}" onblur="donde()" /></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                      <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">Sector</td>
                      <td bgcolor="#CCCCCC"><input name="sector" type="text" class="sub_title" id="sector"  style="width:220px;" onkeypress="return validarln(event)" maxlength="180"  value="{{ $cliente_direccion->sector }}" /></td>
                    </tr>
                    <tr>
                      <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                      <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">Region</td>
                      <td bgcolor="#CCCCCC"><select name="id_region" class="sub_title" id="id_region" style="width:220px;" >
                        <option value"-">-</option>
                        @foreach ($regiones as $r)
                          <option value="{{ $r->id_region }}" <?php if ($cliente_direccion->id_region == $r->id_region) echo "selected" ?>>{{ $r->desc_region }}</option>
                        @endforeach
                        <option value="-">-</option>
                     </select></td>
                   </tr>
                   <tr>
                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                    <td bgcolor="#BBBBBB" class="stylish_graverx_b">Ciudad</td>
                    <td bgcolor="#CCCCCC"><select name="id_ciudad" class="sub_title" id="id_ciudad" style="width:220px;" >
                      <option value="-">-</option>
                      @foreach ($ciudades as $c)
                        <option value="{{ $c->id_ciudad }}" <?php if($cliente_direccion->id_ciudad == $c->id_ciudad) echo "selected" ?>>{{ $c->desc_ciudad }}</option>
                      @endforeach
                    </select></td>
                  </tr>
                  <tr>
                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                    <td bgcolor="#BBBBBB" class="stylish_graverx_b">Comuna</td>
                    <td bgcolor="#CCCCCC"><select name="id_comuna" class="sub_title" id="id_comuna" style="width:220px;" >
                      <option value="-" >-</option>
                      @foreach($comunas as $c)
                        <option value="{{ $c->id_comuna }}" <?php if($cliente_direccion->id_comuna == $c->id_comuna) echo "selected" ?>>{{ $c->desc_comuna }}</option>
                      @endforeach
                    </select></td>
                  </tr>
                  <tr>
                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                    <td bgcolor="#BBBBBB" class="stylish_graverx_b">Telefono Particular</td>
                    <td bgcolor="#CCCCCC"><input name="fono_particular" type="text" class="sub_title" id="fono_particular"  style="width:220px;" onkeypress="return validarn(event)" maxlength="20" value="{{ $cliente_direccion->fono_particular }}" /></td>
                  </tr>
                  <tr>
                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                    <td bgcolor="#BBBBBB" class="stylish_graverx_b">Telefono Celular</td>
                    <td bgcolor="#CCCCCC"><input name="celular" type="text" class="sub_title" id="celular"  style="width:220px;" onkeypress="return validarn(event)" maxlength="20" value="{{ $cliente_direccion->cliente->celular }}" /></td>
                  </tr>
                  <tr>
                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                    <td bgcolor="#BBBBBB" class="stylish_graverx_b">Telefono Trabajo</td>
                    <td bgcolor="#CCCCCC"><input name="fono_trabajo" type="text" class="sub_title" id="fono_trabajo"  style="width:220px;" onkeypress="return validarn(event)" maxlength="20" value="{{ $cliente_direccion->cliente->fono_trabajo }}" /></td>
                  </tr>
                  <tr>
                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                    <td bgcolor="#BBBBBB" class="stylish_graverx_b">E-mail</td>
                    <td bgcolor="#CCCCCC"><input name="email" type="text" class="sub_title" id="email"  style="width:220px;" maxlength="40" value="{{ $cliente_direccion->cliente->email }}" /></td>
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
                      <img src="http://maps.google.com/maps/api/staticmap?size=361x231&maptype=roadmap\&markers=size:mid%7Ccolor:red%7Cmetropolitana+santiago+la+cisterna+fernandez+albano+97,Chile&sensor=false&zoom=16" width="361" height="231" />
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

      $('#btn_verificar').click(function(e){
        e.preventDefault();

        deve($('#rut').val(), $('#dv'));
        form = $('#form_edit');
        url = "<?php echo route('cliente_existe'); ?>";
        
        $.post(url, form.serialize(), function(result){
            if (result.existe) {
              form.attr('action', "<?php echo route('cliente_edit'); ?>");
              form.submit();
            } else {
              $('#hf_msg_nuevo').val('si');
              form.attr('action', "<?php echo route('cliente_add'); ?>");
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
            $('#lbl_message').html(msg);
            $('#dv_popupiadvice').show();
            $('#dv_popup').show();
        });
      });
      
      $('#id_region').on('change',function(e){
        console.log(e.target.value);
        $.get("<?php echo route('load_ciudades') ?>?id_region=" + e.target.value, function(data){
          $('#id_ciudad').empty();
          $('#id_ciudad').append('<option value="-">-</option>');
          $.each(data, function(index, ciudad){
            $('#id_ciudad').append('<option value="' + ciudad.id_ciudad + '">' + ciudad.desc_ciudad + '</option>');
          });
        });
      });

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
        form = $('#form_edit');
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

  </script>

</form>
@endsection