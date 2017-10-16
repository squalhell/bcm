@extends('layouts.master_tmp')

@section('content')
<form id="form_index" name="form_index" method="POST" action="{{ route('horarios_nuevo') }}" >
  {{ csrf_field() }}
  <input type="hidden" id="id_curso_horario" name="id_curso_horario">
  <table width="100%" height="232" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="232" align="left" valign="top"><table width="100%" height="232"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="83%" height="232" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                <tr>
                  <td width="92%" height="50"></td>
                    <td width="8%" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><a href="{{ route('horarios_nuevo') }}" class="main_fitz" style="width:140px; text-align: center;">Nuevo Horario</a></td>
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
                      <table id="t_horarios" width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#666666">
                        <thead>
                          <tr class="sub_title3 cell-border">
                            <th width="11" align="left" class="prsnal">&nbsp;</th>
                            <th class="prsnal">ID</th>
                            <th class="prsnal">Curso</th>
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
          "_token"    : "{{csrf_token()}}",
          "id_curso"  : "%"
        };
        return obj;
      }

      $(document).ready(function () {

          var tabla = $('#t_horarios').DataTable({
            language: { url: "{{ asset('js/jquery.dataTables.esp.json') }}" },
            processing: true,
            searching:  false,
            ordering:   false,
            lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "Todos"]],
            ajax: {
              url: "{{ route('horarios_search') }}",
              data: buildSearchData,
              type: 'POST'
            },
            columns: [
              { data: 'viñeta', name: 'viñeta' },
              { data: 'id_curso_horario', name: 'cursos_horarios.id_curso_horario' },
              { data: 'desc_curso', name: 'cursos.desc_curso' },
              { data: 'nom_relator', name: 'nom_relator' },
              { data: 'nombre', name: 'salas.nombre' },
              { data: 'f_inicio', name: 'f_inicio' },
              { data: 'f_fin', name: 'cursos_horarios.f_fin' },
              { data: 'horarios', name: 'horarios' },
              { data: 'acciones', name: 'acciones' },
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
                $('td', row).eq(8).addClass('table-col-button');
            }
          });

      });

      function editar(id_curso_horario){
        form = $('#form_index');
        $('#id_curso_horario').val(id_curso_horario);
        form.attr('action', "{{ route('horarios_edit') }}");
        form.submit();
      }

    </script>

  </form>

  
@endsection