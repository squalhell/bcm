@extends('layouts.master')

@section('content')

<form action="" method="post" name="core">
  <table width="100%" height="460" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="460" align="left" valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="83%" height="560" valign="top" bgcolor="#FFFFFF">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="19" class="sub_title3">&nbsp;</td>
                </tr>
                <tr>
                  <td height="552">
                    <table width="100%" height="552" border="0" cellpadding="0" cellspacing="0">
                      <tr>

                        <td width="10" height="486" align="left" valign="top">
                          @include('Atenciones.Encuestas.menu')
                        </td>
                        
                        <td width="10" align="left" valign="top" bgcolor="#CCCCCC">
                          <table width="20" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><img src="img/flechette.png" width="18" height="60" /></td>
                            </tr>
                          </table>
                        </td>

                        <td width="99%" bgcolor="#CCCCCC">
                          <div id="dv_historico" style="display: none;" >
                            @include('Atenciones.Encuestas.historico')
                          </div>
                          <div id="dv_listado">
                            @include('Atenciones.Encuestas.listado')
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

      </div>
    </td>
  </tr>
</table>
</form>

@endsection