@extends('layouts.master_tmp')

@section('content')
<form id="form_edit" action="{{ route('horarios_update') }}" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="id_curso_horario" id="id_curso_horario" value="{{ $curso_horario->id_curso_horario }}">
  <table width="100%" height="460" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="460" align="left" valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="83%" height="460" valign="top" bgcolor="#FFFFFF">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <!-- Inicio Título -->
                  <td height="12" class="Title03">Horarios</td>
                  <!-- Fin Título -->
                </tr>
                <tr>
                  <td height="506" align="left" valign="top" bgcolor="#CCCCCC">
                    <table width="100%" border="0" cellspacing="3">
                      <tr>
                        <td width="415" height="502" align="left" valign="top" bgcolor="#BBBBBB">
                          <!-- Tabla de contenido -->
                          <table width="100%" border="0" cellspacing="2">
                            <tr>
                              <!-- Titulo Contenido -->
                              <td class="sub_title3" width="350px">1.- Datos Principales</td>
                              <td class="sub_title3">2.- Salas</td>
                            </tr>
                            <!-- Contenido -->
                            <tr>
                              <td>
                                <table border="0" cellspacing="1" cellpadding="0" bordercolor="#999999" width="100%">
                                  <tr>
                                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                                    <td bgcolor="#CCCCCC" class="sub_title" width="96px">Curso</td>
                                    <td bgcolor="#CCCCCC">
                                      <select id="id_curso" name="id_curso" style="width: 100%;">
                                        <option value="-" selected>-</option>
                                        @foreach ($cursos as $c)
                                          <option value="{{ $c->id_curso }}" <?php if($c->id_curso == $curso_horario->curso->id_curso) echo "Selected"; ?> >{{ $c->desc_curso }}</option>
                                        @endforeach
                                      </select> 
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                                    <td bgcolor="#CCCCCC" class="sub_title">Fecha Inicio</td>
                                    <td bgcolor="#CCCCCC"><input name="f_inicio" type="text" readonly="readonly" class="tcal" id="f_inicio" value="{{ date('d/m/Y', strtotime($curso_horario->f_inicio)) }}" style="width:215px; background-color:#FFF; font-weight:bold;" /></td>
                                  </tr>
                                  <tr>
                                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                                    <td bgcolor="#CCCCCC" class="sub_title">Fecha Fin</td>
                                    <td bgcolor="#CCCCCC"><input name="f_fin" type="text" readonly="readonly" class="tcal" id="f_fin" value="{{ date('d/m/Y', strtotime($curso_horario->f_fin)) }}" style="width:215px; background-color:#FFF; font-weight:bold;" /></td>
                                  </tr>
                                  <tr>
                                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                                    <td bgcolor="#CCCCCC" class="sub_title">Relatores</td>
                                    <td bgcolor="#CCCCCC">
                                      <select id="id_relator" name="id_relator" style="width: 100%;">
                                        <option value="-" selected>-</option>
                                        @foreach ($relatores as $r)
                                          <option value="{{ $r->id_relator }}" <?php if($r->id_relator==$curso_horario->id_relator) echo "Selected"; ?> >{{ $r->nombre }} {{ $r->a_paterno }} {{$r->a_materno }}</option>
                                        @endforeach
                                      </select> 
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                                    <td bgcolor="#CCCCCC" class="sub_title">Sala Asignada</td>
                                    <td bgcolor="#CCCCCC"><input type="text" name="nombre" id="nombre" readonly value="{{ $curso_horario->sala->nombre }}" style="width:236px; background-color:#FFF;"></td>
                                  </tr>
                                </table>
                              </td>
                              <td bgcolor="#CCCCCC" valign="top">
                                <input type="hidden" name="id_sala" id="id_sala" value="{{ $curso_horario->sala->id_sala }}">
                                <table id="t_salas" width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#666666">
                                  <thead>
                                    <tr class="Button022">
                                      <th width="11" align="left" class="prsnal">&nbsp;</th>
                                      <th class="prsnal">id</th>
                                      <th class="prsnal">Nombre</th>
                                      <th class="prsnal">Region</th>
                                      <th class="prsnal">Ciudades</th>
                                      <th class="prsnal">Comuna</th>
                                      <th class="prsnal">Direccion</th>
                                      <th class="prsnal">Capacidad</th>
                                      <th class="prsnal">Banco Prueba</th>
                                      <th class="prsnal">Disponibilidad</th>
                                      <th class="prsnal">Horario</th>
                                      <th align="center" valign="middle" bgcolor="#666666" style="width: 30px;"></th>
                                    </tr>
                                  </thead>
                                </table>
                              </td>
                            </tr>

                            <tr>
                              <!-- Titulo Contenido -->
                              <td class="sub_title3" colspan="2">3.- Horarios</td>
                            </tr>
                            <tr>
                              <td valign="top" width="350px">
                                <table border="0" cellspacing="1" cellpadding="0" bordercolor="#999999" width="100%">
                                  <tr>
                                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                                    <td bgcolor="#CCCCCC" class="sub_title" width="355px">Día</td>
                                    <td bgcolor="#CCCCCC"> 
                                      <select id="dia" name="dia" style="width: 237px;">
                                        <option value="-" selected>-</option>
                                        @foreach ($dias as $d)
                                          <option value={{ $d }} <?php if($d == $curso_horario->sala->dia) echo "Selected"; ?> >{{ $d }}</option>
                                        @endforeach
                                      </select> 
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                                    <td bgcolor="#CCCCCC" class="sub_title">Hora Inicio</td>
                                    <td bgcolor="#CCCCCC">
                                      <input type="hidden" name="hf_h_inicio" id="hf_h_inicio" value="{{ date('H:i', strtotime($curso_horario->sala->tipo_horario->h_inicio)) }}">
                                      <input name="h_inicio" type="text" class="horas" id="h_inicio"  style="width:235px; background-color:#FFF;" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                                    <td bgcolor="#CCCCCC" class="sub_title">Hora Fin</td>
                                    <td bgcolor="#CCCCCC">
                                      <input type="hidden" name="hf_h_fin" id="hf_h_fin" value="{{ date('H:i', strtotime($curso_horario->sala->tipo_horario->h_fin)) }}">
                                      <table width="100%">
                                        <tr>
                                          <td><input name="h_fin" type="text" class="horas" id="h_fin"  style="width:120px; background-color:#FFF;" /></td>
                                          <td><input name="btn_add" type="submit" class="main_fitz" id="btn_add" style="width:105px; text-align: center;" value="Agregar Horario" /></td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                                    <td colspan="2" align="right" bgcolor="#CCCCCC">
                                      <a href="{{ route('horarios') }}" class="main_fitz" id="button2" style="width:120px; text-align: center;">Volver</a>
                                      <input name="btn_finalizar" type="submit" class="main_fitz" id="btn_finalizar" style="width:120px; text-align: center;" value="Finalizar" />
                                    </td>
                                  </tr>
                                </table>
                              </td>
                              <td bgcolor="#CCCCCC" valign="top">
                                <table id="t_horarios" width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#666666">
                                  <thead>
                                    <tr class="Button022">
                                      <th width="11" align="left" class="prsnal">&nbsp;</th>
                                      <th class="prsnal">Dia</th>
                                      <th class="prsnal">Inicio</th>
                                      <th class="prsnal">Fin</th>
                                      <th align="center" valign="middle" bgcolor="#666666" style="width: 30px;"></th>
                                    </tr>
                                    <?php $row_id = 1; ?>
                                    @foreach($horarios as $h)
                                      <tr id="tr_horarios_{{ $row_id }}">
                                        <td height="26" valign="top" bgcolor="#666666" class="prsnal"><img src="{{ asset('img/rde3.png') }}" width="11" height="13" /></td>
                                        <td valign="top" bgcolor="#FFFFFF" class="prsnal_mini2">
                                          {{ $h->dia }}
                                          <input type="hidden" value="{{ $h->dia }}{{ date('h:i', strtotime($h->h_inicio)) }}{{ date('h:i', strtotime($h->h_fin)) }}" />
                                        </td>
                                        <td valign="top" bgcolor="#FFFFFF" class="prsnal_mini2">{{ date('h:i', strtotime($h->h_inicio)) }}</td>
                                        <td valign="top" bgcolor="#FFFFFF" class="prsnal_mini2">{{ date('h:i', strtotime($h->h_fin)) }}</td>
                                        <td align="right" valign="top" bgcolor="#666666"><a href="javascript:;" onclick="quitar_horario({{ $row_id }})"><img src="{{ asset('img/play3.png') }}" alt="Quitar Horario" width="21" height="20" border="0" /></a></td>
                                      </tr>
                                      <?php $row_id += 1; ?>
                                    @endforeach
                                  </thead>
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
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

  <script>

    function buildSearchData(){
        var obj = {
          "_token": "{{csrf_token()}}"
        };
        return obj;
      }

    $(document).ready(function() {

      $('.horas').timeMask();

      var tabla = $('#t_salas').DataTable({
        language: { url: "{{ asset('js/jquery.dataTables.esp.json') }}" },
        processing: true,
        searching:  false,
        ordering:   false,
        bLengthChange: false,
        bPaginate: false,
        bInfo: false,
        ajax: {
          url: "{{ route('salas_search') }}",
          data: buildSearchData,
          type: 'POST'
        },
        columns: [
          { data: 'viñeta', name: 'viñeta' },
          { data: 'id_sala', name: 'salas.id_sala' },
          { data: 'nombre', name: 'salas.nombre' },
          { data: 'desc_region', name: 'regiones.desc_region' },
          { data: 'desc_ciudad', name: 'ciudades.desc_ciudad' },
          { data: 'desc_comuna', name: 'comunas.desc_comuna' },
          { data: 'direccion', name: 'salas.direccion' },
          { data: 'capacidad', name: 'salas.capacidad' },
          { data: 'banco_prueba', name: 'banco_prueba' },
          { data: 'disponibilidad', name: 'disponibilidad' },
          { data: 'tipo_horario', name: 'tipo_horario' },
          { data: 'horarios', name: 'horarios' }
        ],
        "createdRow": function( row, data, dataIndex){
            $('td', row).eq(0).addClass('table-col-viñeta');
            $('td', row).eq(1).addClass('table-col-Default');
            $('td', row).eq(2).addClass('table-col-Default');
            $('td', row).eq(3).addClass('table-col-Default');
            $('td', row).eq(4).addClass('table-col-Default');
            $('td', row).eq(5).addClass('table-col-Default');
            $('td', row).eq(6).addClass('table-col-Default');
            $('td', row).eq(7).addClass('table-col-Default');
            $('td', row).eq(8).addClass('table-col-Default');
            $('td', row).eq(9).addClass('table-col-Default');
            $('td', row).eq(10).addClass('table-col-Default');
            $('td', row).eq(11).addClass('table-col-button');
        }
      });

      $('#btn_finalizar').click(function(e) {
        e.preventDefault();
        tabla_array = $('#t_horarios').tableToJSON();
        form = $('#form_edit');
        url = form.attr('action');
        form_data = form.serializeArray();
        form_data.push({name: 'tabla_array', value: JSON.stringify(tabla_array)});

        $.post(url, form_data, function(result){
            form.attr('action', "{{ route('horarios') }}");
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
            $('#dv_popupiadvice').show();
            $('#dv_popup').show();
        });

      });

      $('#btn_add').click(function(e){
        e.preventDefault();
        debugger;
        valida = "";
        id = $('#dia').val() + $('#h_inicio').val() + $('#h_fin').val();
        date_inicio = new Date('2017-09-01 ' + $('#h_inicio').val());
        date_fin = new Date('2017-09-01 ' + $('#h_fin').val());

        date_inicio_r = new Date('2017-09-01 ' + $('#hf_h_inicio').val());
        date_fin_r = new Date('2017-09-01 ' + $('#hf_h_fin').val());

        if (validarHora($('#h_inicio').val()) == false) valida += 'Hora de inicio es incorrecta.<br>';
        if(validarHora($('#h_fin').val()) == false) valida += 'Hora fin es incorrecta.<br>';
        if ($('#t_horarios input[value="' + id + '"]').length) valida += 'Horario ya existe en la lista.<br>';
        if(date_fin < date_inicio) valida += 'Hora inicio no puede ser mayor que hora fin.<br>';
        if(date_fin > date_fin_r) valida += 'Hora de fin solo puede ser hasta las ' + $('#hf_h_fin').val() + '.<br>';
        if(date_inicio < date_inicio_r) valida += 'Hora de inicio debe comenzar desde las ' + $('#hf_h_inicio').val() + '.<br>';
        
        if (valida == "")
        {
          rowCount = $('#t_horarios tr').length;
          img = "{{ asset('img/play3.png') }}";
          img2 = "{{ asset('img/rde3.png') }}";
          row = '<tr id="tr_horarios_' + rowCount + '">' +
            '<td height="26" valign="top" bgcolor="#666666" class="prsnal"><img src="' + img2 + '" width="11" height="13" /></td>' + 
            '<td valign="top" bgcolor="#FFFFFF" class="prsnal_mini2">' + $('#dia').val() + '<input type="hidden" value="' + id +'" /></td>' +
            '<td valign="top" bgcolor="#FFFFFF" class="prsnal_mini2">' + $('#h_inicio').val() + '</td>' +
            '<td valign="top" bgcolor="#FFFFFF" class="prsnal_mini2">' + $('#h_fin').val() + '</td>' +
            '<td align="right" valign="top" bgcolor="#666666"><a href="javascript:;" onclick="quitar_horario(' + rowCount + ')"><img src="' + img + '" alt="Quitar Horario" width="21" height="20" border="0" /></a></td>' +
            '</tr>'
          $('#t_horarios tr:last').after(row);
        }else {
          $('#lbl_popupTitulo').html('Error de Datos');
          $('#lbl_message').html(valida);
          $('#dv_popupigood').hide();
          $('#dv_popupibad').hide();
          $('#dv_popupiadvice').show();
          $('#dv_popup').show();
        }

      });

    });

    function seleccionar_sala(id_sala, nombre, btn)
    {
      $('#id_sala').val(id_sala);
      form = $('#form_edit');
      url = "{{ route('horarios_seleccionar_sala') }}";
      
      $.post(url, form.serialize() + "&id_sala=" + id_sala, function(result){
        $('#nombre').val(nombre);
        $('#hf_h_inicio').val(result.h_inicio);
        $('#hf_h_fin').val(result.h_fin);
        $('#dia').empty();
        $('#dia').append('<option value="-">-</option>');
        $.each(result.dias, function(index, dia){
          $('#dia').append('<option value="' + dia + '">' + dia + '</option>');
        });
        $("#t_salas tr").removeClass("row_selected");
        $(btn).closest('tr').addClass("row_selected");


      }).fail(function(result){
        $('#id_sala').val("");
        $('#nombre').val("");
        $('#hf_h_inicio').val("");
        $('#hf_h_fin').val("");
        $('#dia').empty();
        $('#dia').append('<option value="-">-</option>');
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


    }

    function quitar_horario(id)
    {
      $('#t_horarios #tr_horarios_' + id).remove();
    }

  </script>

</form>
@endsection
