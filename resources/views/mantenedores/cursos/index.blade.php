@extends('layouts.master_tmp')

@section('content')
<form id="form_index" name="form_index" method="POST" action="{{ route('cursos_nuevo') }}" >
  {{ csrf_field() }}
  <input type="hidden" id="id_curso" name="id_curso">
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
                        <td><a href="{{ route('cursos_nuevo') }}" class="main_fitz" style="width:140px; text-align: center;">Nuevo Curso</a></td>
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
                      <table id="cursos-table" width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#666666">
                        <thead>
                          <tr class="sub_title3 cell-border">
                            <th width="11" align="left" class="prsnal">&nbsp;</th>
                            <th class="prsnal" >id</th>
                            <th class="prsnal" width="200px">Nombre</th>
                            <th class="prsnal" width="50px">Nivel</th>
                            <th class="prsnal" width="120px">Ponderación Min.</th>
                            <th class="prsnal" width="120px">Ponderación Max.</th>
                            <th class="prsnal" width="80px">Tipo Curso</th>
                            <th class="prsnal" >Contenido</th>
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
          "rut" : $('#rut').val(),
          "_token": "{{csrf_token()}}"
        };
        return obj;
      }

      $(document).ready(function () {

          var tabla = $('#cursos-table').DataTable({
                      language: { url: "{{ asset('js/jquery.dataTables.esp.json') }}" },
                      processing: true,
                      searching:  false,
                      ordering:   false,
                      lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "Todos"]],
                      ajax: {
                        url: "<?php echo route('cursos_search'); ?>",
                        data: buildSearchData,
                        type: 'POST'
                      },
                      columns: [
                        { data: 'viñeta', name: 'viñeta' },
                        { data: 'id_curso', name: 'cursos.id_curso' },
                        { data: 'desc_curso', name: 'cursos.desc_curso' },
                        { data: 'nivel', name: 'cursos.nivel' },
                        { data: 'ponderacion_max', name: 'cursos.ponderacion_max' },
                        { data: 'ponderacion_min', name: 'cursos.ponderacion_min' },
                        { data: 'desc_tipo_curso', name: 'tipo_cursos.desc_tipo_curso' },
                        { data: 'contenido', name: 'cursos.desc_curso' },
                        { data: 'editar', name: 'editar' }
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

      function editar(id_curso){
        form = $('#form_index');
        $('#id_curso').val(id_curso);
        form.attr('action', "{{ route('cursos_edit') }}");
        form.submit();
      }

    </script>

  </form>

  
@endsection