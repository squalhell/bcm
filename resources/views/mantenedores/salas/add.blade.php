@extends('layouts.master_tmp')

@section('content')
<form id="form_add" action="{{ route('salas_add') }}" method="post">
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
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td bgcolor="#BBBBBB" class="stylish_graverx_b">Nombre</td>
                        <td bgcolor="#CCCCCC"><input name="nombre" type="text" class="sub_title" id="nombre"  style="width:220px;" maxlength="180" value="" /></td>
                      </tr>
                      <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">Dirección</td>
                        <td bgcolor="#CCCCCC"><input name="direccion" type="text" class="sub_title" id="direccion"  style="width:220px;" maxlength="180" /></td>
                      </tr>
                      <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">Regiones</td>
                        <td bgcolor="#CCCCCC">
                          <select name="id_region" class="sub_title" id="id_region" style="width:220px;" >
                            <option value="-">-</option>
                              @foreach ($regiones as $r)
                                <option value="{{ $r->id_region }}">{{ $r->desc_region }}</option>
                              @endforeach
                          </select>
                        </td>
                      </tr>
                       <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td bgcolor="#BBBBBB" class="stylish_graverx_b">Ciudad</td>
                        <td bgcolor="#CCCCCC">
                          <select name="id_ciudad" class="sub_title" id="id_ciudad" style="width:220px;" >
                            <option value="-">-</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td bgcolor="#BBBBBB" class="stylish_graverx_b">Comuna</td>
                        <td bgcolor="#CCCCCC">
                          <select name="id_comuna" class="sub_title" id="id_comuna" style="width:220px;" >
                            <option value="-" >-</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">Capacidad</td>
                        <td bgcolor="#CCCCCC"><input name="capacidad" type="text" class="sub_title" id="capacidad" onkeypress="return validarn(event)" style="width:220px;" maxlength="180" /></td>
                      </tr>
                      <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td bgcolor="#BBBBBB" class="stylish_graverx_b">Banco Prueba</td>
                        <td bgcolor="#CCCCCC">
                          <select name="banco_prueba" class="sub_title" id="banco_prueba" style="width:220px;" >
                            <option value="0" selected >No</option>
                            <option value="1" >Si</option>
                          </select>
                        </td>
                      </tr>
                       <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td bgcolor="#BBBBBB" class="stylish_graverx_b">Disponibilidad</td>
                        <td bgcolor="#CCCCCC">
                          <select name="id_disponibilidad" class="sub_title" id="id_disponibilidad" style="width:220px;" >
                            <option value="-" selected >-</option>
                            @foreach ($disponibilidades as $d)
                              <option value="{{ $d->id_disponibilidad }}">{{ $d->nom_disponibilidad }}</option>
                            @endforeach
                          </select>
                          <select id="dia" name="dia" style="display: none;">
                            <option value="-" selected>-</option>
                            <option value="Lunes" >Lunes</option>
                            <option value="Martes" >Martes</option>
                            <option value="Miércoles" >Miércoles</option>
                            <option value="Jueves" >Jueves</option>
                            <option value="Viernes" >Viernes</option>
                            <option value="Sábado" >Sábado</option>
                            <option value="Domingo" >Domingo</option>
                          </select>
                        </td>
                      </tr>
                       <tr>
                        <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                        <td bgcolor="#BBBBBB" class="stylish_graverx_b">Horarios</td>
                        <td bgcolor="#CCCCCC">
                          <select name="id_tipo_horario" class="sub_title" id="id_tipo_horario" style="width:220px;" >
                            <option value="-" selected >-</option>
                            @foreach ($tipo_horarios as $th)
                              <option value="{{ $th->id_tipo_horario }}">{{ $th->h_inicio }} a {{ $th->h_fin }}</option>
                            @endforeach                            
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" bgcolor="#BBBBBB" class="stylish_graverx_b"></td>
                        <td height="23" bgcolor="#BBBBBB" class="stylish_graverx_b">
                          <a href="{{ route('salas') }}" class="main_fitz" id="button2">Volver</a>
                          <input name="btn_save" type="submit" class="main_fitz" id="btn_save" value="Crear Sala" />
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
            form.attr('action', "{{ route('salas') }}");
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

      //Cargar Ciudades
      $('#id_region').on('change',function(e){
        debugger;
        $.get("{{ route('load_ciudades') }}?id_region=" + e.target.value, function(data){
          debugger;
          $('#id_ciudad').empty();
          $('#id_ciudad').append('<option value="-">-</option>');
          $.each(data, function(index, ciudad){
            $('#id_ciudad').append('<option value="' + ciudad.id_ciudad + '">' + ciudad.desc_ciudad + '</option>');
          });
        });
      });

      //Cargar Comunas
      $('#id_ciudad').on('change',function(e){
        $.get("{{ route('load_comunas') }}?id_ciudad=" + e.target.value, function(data){
          $('#id_comuna').empty();
          $('#id_comuna').append('<option value="-">-</option>');
          $.each(data, function(index, comuna){
            $('#id_comuna').append('<option value="' + comuna.id_comuna + '">' + comuna.desc_comuna + '</option>');
          });
        });
      });

      //Cargar solo 1 día (disponibilidad)
      $('#id_disponibilidad').on('change', function(e) {
        if(e.target.value == "3") { $('#dia').show(); $('#dia').val("-"); }
        else { $('#dia').hide(); $('#dia').val("-"); }
      });

    });

  </script>

</form>
@endsection