@extends('layouts.master_tmp')

@section('content')
<form id="form_add" action="{{ route('cursos_update') }}" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="id_curso" id="id_curso" value="{{ $curso->id_curso }}">
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
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td bgcolor="#BBBBBB" class="stylish_graverx_b">Nombre</td>
                        <td bgcolor="#CCCCCC"><input name="desc_curso" type="text" class="sub_title" id="desc_curso" style="width:220px;" maxlength="180" value="{{ $curso->desc_curso }}" /></td>
                      </tr>
                      <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">Ponderación Mínima</td>
                        <td bgcolor="#CCCCCC"><input name="ponderacion_min" type="text" class="sub_title" id="ponderacion_min" style="width:220px;" maxlength="180" onkeypress="return validarn(event)" value="{{ $curso->ponderacion_min }}" /></td>
                      </tr>
                      <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">Ponderación Máxima</td>
                        <td bgcolor="#CCCCCC"><input name="ponderacion_max" type="text" class="sub_title" id="ponderacion_max"  style="width:220px;" maxlength="180" onkeypress="return validarn(event)" value="{{ $curso->ponderacion_max }}" /></td>
                      </tr>
                      <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">Tipo Curso</td>
                        <td bgcolor="#CCCCCC"><select name="id_tipo_curso" class="sub_title" id="id_tipo_curso" style="width:220px;" >
                          <option value="-">-</option>
                          @foreach ($tipo_cursos as $tc)
                            <option value="{{ $tc->id_tipo_curso }}" <?php if($curso->id_tipo_curso == $tc->id_tipo_curso) echo "selected"; ?>>{{ $tc->desc_tipo_curso }}</option>
                          @endforeach
                        </select></td>
                      </tr>
                      <tr>
                        <td class="stylish_graverx_b" valign="top"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td bgcolor="#BBBBBB" class="stylish_graverx_b" valign="top">Contenido</td>
                        <td bgcolor="#CCCCCC"><textarea id="contenido" name="contenido" class="sub_title" style="height: 100px; width: 95%;">{{ $curso->contenido }}</textarea></td>
                      </tr>
                      <tr>
                        <td colspan="2" bgcolor="#BBBBBB" class="stylish_graverx_b"></td>
                        <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">
                          <a href="{{ route('cursos') }}" class="main_fitz" id="button2">Volver</a>
                          <input name="btn_save" type="submit" class="main_fitz" id="btn_save" value="Guardar Curso" />
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
            form.attr('action', "{{ route('cursos') }}");
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