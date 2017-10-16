@extends('layouts.master_tmp')

@section('content')
<form id="form_index" name="form_index" method="POST" action="{{ route('matriculas_nuevo') }}" >
  {{ csrf_field() }}
  
  <table width="50%" height="460" border="0" cellspacing="0" cellpadding="3" style="font-size:9px;">
    <tr>
      <td height="460" align="left" valign="top">
        <table width="50%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="83%" height="525" valign="top" bgcolor="#FFFFFF">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="525" align="left" valign="top">
                    <table width="100%" border="0" cellspacing="0" cellpadding="1">
                      <tr>
                        <td height="13">
                          <div id="tabs">
                            <ul>

                              <li><a href="#tabs-1">Listado de Gasfiter</a></li>
                              <li><a href="#tabs-2">Maestro de Gasfiter</a></li>
                              <li><a href="#tabs-3">Reporte Gasfiter</a></li>
                              <li><a href="#tabs-4">Asignar Curso</a></li>
                            </ul>

                            <div id="tabs-1" style="overflow:scroll; width:1050px;">
                              @include('gasfiter.listado')
                            </div>
                            <div id="tabs-2" style="overflow:scroll; width:1050px;">

                            </div>
                            <div id="tabs-3" style="overflow:scroll; width:1050px;">

                            </div>
                            <div id="tabs-4" style=" width:1050px; padding: 0 !important;">

                            </div>
                          </div>
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
      $("#tabs").tabs();
    });

  </script>

</form>


@endsection