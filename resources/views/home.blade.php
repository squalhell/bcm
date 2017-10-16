@extends('layouts.master')

@section('content')

<table width="100%" height="560" border="0" cellspacing="0" cellpadding="0"  bgcolor="#CCCCCC">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
          <tr>
            <td width="94%" height="41" bgcolor="#CCCCCC" class="stylish_grave">
                <?php
                      $diak=date("N");
                      $diat=date("d");
                      $mesk=date("n");
                      $anok=date("Y");
                      switch($mesk){
                          case 1:
                          $mesl="Enero";
                          break;
                          case 2:
                          $mesl="Febrero";
                          break;
                          case 3:
                          $mesl="Marzo";
                          break;
                          case 4:
                          $mesl="Abril";
                          break;
                          case 5:
                          $mesl="Mayo";
                          break;
                          case 6:
                          $mesl="Junio";
                          break;
                          case 7:
                          $mesl="Julio";
                          break;
                          case 8:
                          $mesl="Agosto";
                          break;
                          case 9:
                          $mesl="Septiembre";
                          break;
                          case 10:
                          $mesl="Octubre";
                          break;
                          case 11:
                          $mesl="Noviembre";
                          break;
                          case 12:
                          $mesl="Diciembre";
                          break;
                      }
                      switch($diak){
                          case 1:
                          $dial="Lunes";
                          break;
                          case 2:
                          $dial="Martes";
                          break;
                          case 3:
                          $dial="Miercoles";
                          break;
                          case 4:
                          $dial="Jueves";
                          break;
                          case 5:
                          $dial="Viernes";
                          break;
                          case 6:
                          $dial="Sabado";
                          break;
                          case 7:
                          $dial="Domingo";
                          break;
                      }
                        echo $dial." ".$diat." de ".$mesl." de ".$anok;
                      ?></td>
            <td width="6%"><img src="img/edege.png" width="37" height="41" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
          <tr>
            <td class="stylish_groonie" align="right">BIENVENIDO </td>
            <td class="stylish_groonier" align="left">&nbsp;&nbsp;{{ Auth::user()->name }}</td>
            <td class="stylish_groonier"><img src="img/blogo.png" width="100" height="100" /></td>
            </tr>
          </table></td>
      </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="5">
        <tr>
          <td width="50%" height="282" align="left" valign="top" bgcolor="#CCCCCC"><table width="100%" height="356" border="0" cellpadding="0" cellspacing="4">
            
            <tr>
              <td height="250" valign="top" bgcolor="#666666"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                  <td bgcolor="#FFFFFF" class="prsnal" align="center" valign="baseline">
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p><img src="img/junk.png" width="626" height="151" border="0" usemap="#Map" /></p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  </table>

@endsection