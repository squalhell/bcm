@extends('layouts.master_tmp')

@section('content')
<form id="form_index" name="form_index" method="POST" action="{{ route('salas_nuevo') }}" >
  {{ csrf_field() }}
  <input type="hidden" id="id_sala" name="id_sala">
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
                        <td><a href="{{ route('salas_nuevo') }}" class="main_fitz" style="width:140px; text-align: center;">Nueva Sala</a></td>
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
                      <table id="t_salas" width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#666666">
                        <thead>
                          <tr class="sub_title3 cell-border">
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

          var tabla = $('#t_salas').DataTable({
                      language: { url: "{{ asset('js/jquery.dataTables.esp.json') }}" },
                      processing: true,
                      searching:  false,
                      ordering:   false,
                      lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "Todos"]],
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
                          $('td', row).eq(8).addClass('table-col-Default');
                          $('td', row).eq(9).addClass('table-col-Default');
                          $('td', row).eq(10).addClass('table-col-Default');
                          $('td', row).eq(11).addClass('table-col-button');
                      }
          });

      });

      function editar(id_sala){
        form = $('#form_index');
        $('#id_sala').val(id_sala);
        form.attr('action', "{{ route('salas_edit') }}");
        form.submit();
      }

    </script>

  </form>

  
@endsection