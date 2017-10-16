@extends('layouts.master_tmp')

@section('content')
<form id="form_index" name="form_index" method="POST" action="{{ route('matriculas_nuevo') }}" >
  {{ csrf_field() }}
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
                        <td><a href="{{ route('matriculas_nuevo') }}" class="main_fitz" style="width:140px; text-align: center;">Matricular</a></td>
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
                      <table id="t_matriculas" width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#666666">
                        <thead>
                          <tr class="sub_title3 cell-border">
                            <th width="11" align="left" class="prsnal">&nbsp;</th>
                            <th class="prsnal" >Curso</th>
                            <th class="prsnal" >Relator</th>
                            <th class="prsnal" >sala</th>
                            <th class="prsnal" >Dirección</th>
                            <th class="prsnal" >Comuna</th>
                            <th class="prsnal" >Ciudad</th>
                            <th class="prsnal" >Región</th>
                            <th class="prsnal" >F. Inicio</th>
                            <th class="prsnal" >F. Fin</th>
                            <th class="prsnal" >Gasfiter</th>
                            <th class="prsnal" >Matriculado</th>
                            <th class="prsnal" >Terminado</th>
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
          "_token": "{{csrf_token()}}"
        };
        return obj;
      }

      $(document).ready(function () {

        var t_matriculas = $('#t_matriculas').DataTable({
          language: { url: "{{ asset('js/jquery.dataTables.esp.json') }}" },
          processing: true,
          searching:  false,
          ordering:   false,
          lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "Todos"]],
          ajax: {
            url: "<?php echo route('get_matriculas'); ?>",
            data: buildSearchData,
            type: 'POST'
          },
          columns: [
            { data: 'viñeta',       name: 'viñeta' },
            { data: 'desc_curso',   name: 'c.desc_curso' },
            { data: 'relator',      name: 'relator' },
            { data: 'sala',         name: 'sala' },
            { data: 'direccion',    name: 's.direccion' },
            { data: 'desc_comuna',  name: 'co.desc_comuna' },
            { data: 'desc_ciudad',  name: 'ci.desc_ciudad' },
            { data: 'desc_region',  name: 're.desc_region' },
            { data: 'f_inicio',     name: 'f_inicio' },
            { data: 'f_fin',        name: 'f_fin' },
            { data: 'gasfiter',     name: 'gasfiter' },
            { data: 'matriculado',  name: 'matriculado' },
            { data: 'terminado',    name: 'terminado' },
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
              $('td', row).eq(11).addClass('table-col-Default');
              $('td', row).eq(12).addClass('table-col-Default');
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