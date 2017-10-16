@extends('layouts.master_tmp')

@section('content')
<form id="form_add" action="{{ route('relatores_add') }}" method="post">
  {{ csrf_field() }}
  <table width="100%" height="286" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="76%" height="286" align="left" valign="top" bgcolor="#CCCCCC">
        <table width="100%" border="0" cellspacing="0" cellpadding="1">
          <tr>
            <td height="218" align="left" valign="top">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="65%" height="10" align="left" valign="top" bgcolor="#999999">
                    <table width="100%" border="0" cellspacing="2" cellpadding="0" bordercolor="#999999">
                      <tr>
                        <td width="2%" class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" width="11" height="13" /></td>
                        <td width="38%" bgcolor="#BBBBBB" class="stylish_graverx_b">Rut</td>
                        <td width="60%" bgcolor="#CCCCCC">
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="157"><input name="rut" type="text" class="sub_title" id="rut"  style="width:150px;" onkeypress="return validarn(event)" maxlength="8" onblur="deve($('#rut').val(), $('#dv'));" /></td>
                              <td width="15">-</td>
                              <td width="48">
                                <span class="fields">
                                  <input name="dv" type="text" class="sub_title" id="dv" size="2" maxlength="2" readonly="readonly" style="width:30px;" />
                                </span>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td bgcolor="#BBBBBB" class="stylish_graverx_b">Nombre</td>
                        <td bgcolor="#CCCCCC"><input name="nombre" type="text" class="sub_title" id="nombre"  style="width:220px;" maxlength="180" value="" /></td>
                      </tr>
                      <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">A. Paterno</td>
                        <td bgcolor="#CCCCCC"><input name="a_paterno" type="text" class="sub_title" id="a_paterno"  style="width:220px;" maxlength="180" /></td>
                      </tr>
                      <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">A. Materno</td>
                        <td bgcolor="#CCCCCC"><input name="a_materno" type="text" class="sub_title" id="a_materno"  style="width:220px;" maxlength="180" /></td>
                      </tr>
                      <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">Mail</td>
                        <td bgcolor="#CCCCCC"><input name="mail" type="text" class="sub_title" id="mail"  style="width:220px;" maxlength="180" /></td>
                      </tr>
                      <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">Celular</td>
                        <td bgcolor="#CCCCCC"><input name="celular" type="text" class="sub_title" id="celular"  style="width:220px;" maxlength="180" onkeypress="return validarn(event)" /></td>
                      </tr>
                      <tr>
                        <td colspan="2" bgcolor="#BBBBBB" class="stylish_graverx_b"></td>
                        <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">
                          <a href="{{ route('relatores') }}" class="main_fitz" id="button2">Volver</a>
                          <input name="btn_save" type="submit" class="main_fitz" id="btn_save" value="Crear Relator" />
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

  <script>

    $(document).ready(function() {

      $('#btn_save').click(function(e){
        e.preventDefault();
        form = $('#form_add');
        
        $.post(form.attr('action'), form.serialize(), function(result){
            form.attr('action', "{{ route('relatores') }}");
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