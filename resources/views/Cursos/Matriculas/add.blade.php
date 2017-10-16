@extends('layouts.master_tmp')

@section('content')
<form id="form_add" action="{{ route('matriculas_add') }}" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="id_curso" id="id_curso" >
  <input type="hidden" name="id_curso_horario" id="id_curso_horario" />
  <table width="100%" height="460" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="460" align="left" valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="83%" height="460" valign="top" bgcolor="#FFFFFF">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <!-- Inicio Título -->
                  <td height="12" class="Title03">Matriculas</td>
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
                              <td class="sub_title3" width="350px">1.- Seleccione Curso</td>
                              <td class="sub_title3">2.- Horarios</td>
                            </tr>
                            <!-- Contenido -->
                            <tr>
                              <td valign="top">
                                <table border="0" cellspacing="1" cellpadding="0" bordercolor="#999999" width="100%">
                                  <tr>
                                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                                    <td bgcolor="#CCCCCC" class="sub_title" width="96px">Curso</td>
                                    <td bgcolor="#CCCCCC">
                                      <select id="cursos" name="cursos" style="width: 100%;">
                                        <option value="-" selected>-</option>
                                        @foreach ($cursos as $c)
                                          <option value="{{ $c->id_curso }}">{{ $c->desc_curso }}</option>
                                        @endforeach
                                      </select> 
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="stylish_graverx_b"><img src="{{ asset('img/rde3.png') }}" alt="" width="11" height="13" /></td>
                                    <td bgcolor="#CCCCCC" class="sub_title">N° Inscritos</td>
                                    <td bgcolor="#CCCCCC"><input name="num_inscritos" type="text" readonly id="num_inscritos"  style="width:240px; background-color:#FFF; font-weight:bold;" /></td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" class="sub_title3" width="350px">3.- Inscripciones</td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#CCCCCC" valign="top" colspan="3">
                                      <table id="t_inscripciones" width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#666666">
                                        <thead>
                                          <tr class="Button022">
                                            <th width="11" align="left" class="prsnal">&nbsp;</th>
                                            <th class="prsnal">Gasfiter</th>
                                            <th align="center" valign="middle" bgcolor="#666666" style="width: 80px;">
                                              <table>
                                                <tr>
                                                  <td style="border: none;">Todos</td>
                                                  <td style="border: none;"><input type="checkbox" id="chk_all" name="chk_inscripcion_todos" value=""></td>
                                                </tr>
                                              </table>
                                            </th>
                                          </tr>
                                        </thead>
                                      </table>
                                      <br>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" align="right" bgcolor="#CCCCCC">
                                      <a href="{{ route('matriculas') }}" class="main_fitz" id="button2">Volver</a>
                                      <input name="btn_finalizar" type="submit" class="main_fitz" id="btn_matricular" style="width:120px; text-align: center;" value="Matricular" />
                                    </td>
                                  </tr>
                                </table>
                              </td>
                              <td bgcolor="#CCCCCC" valign="top">
                                <input type="hidden" name="id_sala" id="id_sala">
                                <table id="t_horarios" width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#666666">
                                  <thead>
                                    <tr class="Button022">
                                      <th width="11" align="left" class="prsnal">&nbsp;</th>
                                      <th class="prsnal">Relator</th>
                                      <th class="prsnal">Sala</th>
                                      <th class="prsnal">F. Inicio</th>
                                      <th class="prsnal">F. Fin</th>
                                      <th class="prsnal">Horarios</th>
                                      <th align="center" valign="middle" bgcolor="#666666" style="width: 30px;"></th>
                                    </tr>
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
        "_token"    : "{{ csrf_token() }}",
        "id_curso"  : $('#id_curso').val()
      };
      return obj;
    }

    function buildSearchData_inscripciones(){
      var obj = {
        "_token"    : "{{ csrf_token() }}",
        "id_curso"  : $('#id_curso').val()
      };
      return obj;
    }

    $(document).ready(function() {

      var tabla = $('#t_horarios').DataTable({
        language: { url: "{{ asset('js/jquery.dataTables.esp.json') }}" },
        processing: true,
        searching:  false,
        ordering:   false,
        bLengthChange: false,
        bPaginate: false,
        bInfo: false,
        ajax: {
          url: "{{ route('horarios_search') }}",
          data: buildSearchData,
          type: 'POST'
        },
        columns: [
          { data: 'viñeta', name: 'viñeta' },
          { data: 'nom_relator', name: 'nom_relator' },
          { data: 'nombre', name: 'salas.nombre' },
          { data: 'f_inicio', name: 'f_inicio' },
          { data: 'f_fin', name: 'cursos_horarios.f_fin' },
          { data: 'horarios', name: 'horarios' },
          { data: 'select_curso_horario', name: 'select_curso_horario' },
        ],
        "createdRow": function( row, data, dataIndex){
            $('td', row).eq(0).addClass('table-col-viñeta');
            $('td', row).eq(1).addClass('table-col-Default');
            $('td', row).eq(2).addClass('table-col-Default');
            $('td', row).eq(3).addClass('table-col-Default');
            $('td', row).eq(4).addClass('table-col-Default');
            $('td', row).eq(5).addClass('table-col-Default');
            $('td', row).eq(6).addClass('table-col-button');
        }
      });

      var tabla_inscripcion = $('#t_inscripciones').DataTable({
        language: { url: "{{ asset('js/jquery.dataTables.esp.json') }}" },
        processing: true,
        searching:  false,
        ordering:   false,
        bLengthChange: false,
        bPaginate: false,
        bInfo: false,
        ajax: {
          url: "{{ route('gasfiter_search') }}",
          data: buildSearchData_inscripciones,
          type: 'POST'
        },
        columns: [
          { data: 'viñeta', name: 'viñeta' },
          { data: 'gasfiter', name: 'gasfiter' },
          { data: 'check', name: 'check' },
        ],
        "createdRow": function( row, data, dataIndex){
            $('td', row).eq(0).addClass('table-col-viñeta');
            $('td', row).eq(1).addClass('table-col-Default');
            $('td', row).eq(2).addClass('table-col-button');
        }
      });

      $('#chk_all').click(function(e){
        $('input:checkbox[id^="chk_inscripcion"]').each(function(){
          $(this).prop('checked', $(e.target).is(':checked'));
        });
      });

      $('#cursos').on('change',function(e){
        $('#id_curso').val(e.target.value);

        $.get("{{ route('num_inscritos') }}?id_curso=" + e.target.value, function(data){
          $('#num_inscritos').val(data);
        });

        tabla.ajax.reload();
        tabla_inscripcion.ajax.reload();
      });

      $('#btn_matricular').click(function(e) {
        e.preventDefault();
        form = $('#form_add');
        url = "{{ route('matriculas_add') }}";

        $.post(url, form.serialize(), function(result){
            form.attr('action', "{{ route('matriculas') }}");
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

    });

    function select_curso_horario(id_curso_horario, btn)
    {
      $("#t_horarios tr").removeClass("row_selected");
      $(btn).closest('tr').addClass("row_selected");
      $('#id_curso_horario').val(id_curso_horario);
    }

  </script>

</form>
@endsection
