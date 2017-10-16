@extends('layouts.master_tmp')

@section('content')
<form id="form_add" action="{{ route('cursos_add') }}" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="hf_id_gasfiter" id="hf_id_gasfiter">
  <input type="hidden" name="id_curso" id="id_curso">
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
                        <td bgcolor="#BBBBBB" class="stylish_graverx_b">Seleccione Gasfiter</td>
                        <td bgcolor="#CCCCCC">
                          <select name="id_gasfiter" id="id_gasfiter" class="sub_title">
                            <option value="-">-</option>
                            @foreach ($gasfiter as $g)
                              <option value="{{ $g->Id }}">{{ $g->NombreGas }} {{ $g->ApellidoGas }}</option>
                            @endforeach
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <table id="inscripciones_table" height="100%" width="100%" border="0" cellspacing="1" cellpadding="0" bordercolor="#666666">
                          <thead>
                            <tr class="sub_title3 cell-border">
                              <th width="11" align="left" class="prsnal">&nbsp;</th>
                              <th class="prsnal" style="width: 30px;">id</th>
                              <th class="prsnal" style="width: 100px;">Nombre</th>
                              <th class="prsnal" style="width: 50px;" align="center">Nivel</th>
                              <th class="prsnal" style="width: 120px;">Ponderación Max.</th>
                              <th class="prsnal" style="width: 120px;">Ponderación Min.</th>
                              <th class="prsnal" style="width: 120px;">Tipo Curso</th>
                              <th class="prsnal" align="center">Inscrito</th>
                              <th class="prsnal" align="center">Cursado</th>
                              <th class="prsnal" align="center">Matriculado</th>
                              <th align="center" valign="middle" bgcolor="#666666" style="width: 30px;"></th>
                            </tr>
                          </thead>
                        </table>
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

    var tabla;

    function buildSearchData(){
      var obj = {
        "_id_gasfiter" : $('#hf_id_gasfiter').val(),
        "_token": "{{csrf_token()}}"
      };
      return obj;
    }

    $(document).ready(function () {

      tabla = $('#inscripciones_table').DataTable({
                  language: { url: "{{ asset('js/jquery.dataTables.esp.json') }}" },
                  processing: true,
                  searching:  false,
                  ordering:   false,
                  lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "Todos"]],
                  ajax: {
                    url: "{{ route('inscripciones_search') }}",
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
                    { data: 'inscrito', name: 'inscrito' },
                    { data: 'cursado', name: 'cursado' },
                    { data: 'matriculado', name: 'matriculado' },
                    { data: 'cursar', name: 'cursar' }
                  ],
                  "createdRow": function( row, data, dataIndex){
                      $('td', row).eq(0).addClass('table-col-viñeta');
                      (data['inscrito'] == 'Si' ? $('td', row).eq(1).addClass('col_selected') : $('td', row).eq(1).addClass('table-col-Default'));
                      (data['inscrito'] == 'Si' ? $('td', row).eq(2).addClass('col_selected') : $('td', row).eq(2).addClass('table-col-Default'));
                      (data['inscrito'] == 'Si' ? $('td', row).eq(3).addClass('col_selected') : $('td', row).eq(3).addClass('table-col-Default'));
                      (data['inscrito'] == 'Si' ? $('td', row).eq(4).addClass('col_selected') : $('td', row).eq(4).addClass('table-col-Default'));
                      (data['inscrito'] == 'Si' ? $('td', row).eq(5).addClass('col_selected') : $('td', row).eq(5).addClass('table-col-Default'));
                      (data['inscrito'] == 'Si' ? $('td', row).eq(6).addClass('col_selected') : $('td', row).eq(6).addClass('table-col-Default'));
                      (data['inscrito'] == 'Si' ? $('td', row).eq(7).addClass('col_selected') : $('td', row).eq(7).addClass('table-col-Default'));
                      (data['inscrito'] == 'Si' ? $('td', row).eq(8).addClass('col_selected') : $('td', row).eq(8).addClass('table-col-Default'));
                      (data['inscrito'] == 'Si' ? $('td', row).eq(9).addClass('col_selected') : $('td', row).eq(9).addClass('table-col-Default'));
                      $('td', row).eq(10).addClass('table-col-button');
                  }
      });

      $('#id_gasfiter').on('change',function(e){
        $('#hf_id_gasfiter').val(e.target.value)
        e.preventDefault();
        tabla.ajax.reload();
      });

    });

    function inscribir(id_curso, id_gasfiter, e)
    {
      e.preventDefault();
      form = $('#form_add');
      form.attr('action', "{{ route('inscripciones_add') }}");
      $('#id_curso').val(id_curso);
      $('#id_gasfiter').val(id_gasfiter);
      
      $.post(form.attr('action'), form.serialize(), function(result){
          tabla.ajax.reload();
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
    }

  </script>

</form>
@endsection