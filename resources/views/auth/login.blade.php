@extends('Errores.msg_popUp')

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=320" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>BOSCH - Contact Manager</title>

        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}"/>
        
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/afoot.css') }}" rel="stylesheet">
        
        <script src="{{ asset('js/funciones.js') }}"></script>
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

    </head>
    <body>
        <!--<form method="post" name="core">-->
        <form id="form-login" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div id="vc-main" tabindex="0">
                <!-- BEGIN: HEADER-->
                <div id="vc-header" tabindex="-1">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="1%"><img src="img/top.png" width="287" height="77" /></td>
                            <td width="99%" align="right" valign="top"  background="img/top_bk.png"><div id="nav2"></div></td>
                        </tr>
                    </table>
                </div>
                <!-- END: HEADER -->

                <!-- BEGIN: BODY -->
                <br />
                <div id="vc-body" tabindex="0">
                    <table width="100%" height="100%"  border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="80%" align="center" valign="middle">
                                <table width="100%" height="238" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td height="238" align="center" valign="middle">
                                            <table width="653" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="12"><img src="img/a_012.png" width="12" height="12" /></td>
                                                    <td width="630" background="img/a_002.png"></td>
                                                    <td width="11"><img src="img/a_022.png" width="11" height="12" /></td>
                                                </tr>
                                                <tr>
                                                    <td width="12" height="139" background="img/a_002.png">&nbsp;</td>
                                                    <td background="img/a_002.png">
                                                        <table width="100%" border="0" cellspacing="3" cellpadding="0">
                                                            <tr>
                                                                <td width="65%">
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td width="10"><img src="img/border01-01.png" width="10" height="10" /></td>
                                                                            <td width="373" height="1" bgcolor="#DCDFDF"></td>
                                                                            <td width="10"><img src="img/border01-02.png" width="10" height="10" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="10" height="139" bgcolor="#DCDFDF">&nbsp;</td>
                                                                            <td bgcolor="#DCDFDF">
                                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                    <tr>
                                                                                        <td height="53" align="left" class="sub_title_big"><img src="img/lao.png" width="329" height="279" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="40" align="left" class="sub_title_big">BOSCH<br />
                                                                                            <span class="stylish_groonier">CONTACT MANAGER</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="left" class="sub_title2">
                                                                                            <p align="justify">Todos los derechos reservados &copy; <?php echo date('Y'); ?> RB - CL LOM Asesor&iacute;as y Servicios. </p>
                                                                                            <p align="justify">Para poder ingresar a esta seccion es necesario usuario y contraseña validos, Si usted no posee uno por favor comunicarse con el administrador o env&iacute;e un correo solicitando la creaci&oacute;n de usuario a <a href="mailto:junkers.sat@cl.bosch.com">junkers.sat@cl.bosch.com </a></p>
                                                                                            <p align="justify">
                                                                                            	Sitio optimizado para 
                                                                                            	<a target="_blank" href="https://www.google.com/chrome/">Google Chrome</a> y 
                                                                                            	<a target="_blank" href="https://www.mozilla.org/es-ES/firefox/">Mozilla Firefox</a>. 
                                                                                            </p>
																						</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td width="10" bgcolor="#DCDFDF">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="img/border01-04.png" width="10" height="10" /></td>
                                                                            <td width="373" bgcolor="#DCDFDF"></td>
                                                                            <td><img src="img/border01-03.png" width="10" height="10" /></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td width="35%" valign="middle">
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <table width="100%" border="0" cellpadding="2" cellspacing="1">
                                                                                                <tr>
                                                                                                    <td width="38%" align="left" class="prsnal_red">Usuario</td>
                                                                                                    <td width="62%" align="right" valign="middle">
                                                                                                        <input name="nom_usr" type="text" class="sub_title login_username" id="nom_usr" size="31" tabindex="1" value="{{ old('nom_usr') }}" style="width:150px;" />
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td height="25" align="left" class="prsnal_red">Contraseña</td>
                                                                                                    <td align="right" valign="middle">
                                                                                                        <input name="password" type="password" class="sub_title login_password" id="password" size="31" onkeypress="return validarnl(event)" onkeyup="validaro(event)" tabindex="2" style="width:150px;"/>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="right">
                                                                                            <a tabindex="0">
                                                                                                <input name="button" type="button" class="main_fitz" id="btn_login" value="Validar usuario" tabindex="3"  style="width:120px;" />
                                                                                            </a>
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
                                                    <td width="11" background="img/a_002.png">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td><img src="img/a_032.png" width="12" height="11" /></td>
                                                    <td background="img/a_002.png"></td>
                                                    <td><img src="img/a_042.png" width="11" height="11" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- END: BODY -->

                <!-- BEGIN: FOOTER -->
                <div id="vc-footer">
                    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td height="10" align="left" valign="bottom" bgcolor="#999999" class="prsnal">&nbsp;</td>
                        </tr>
                        <tr>
                            <td bgcolor="#333333">&nbsp;</td>
                        </tr>
                    </table>
                </div>
                <!-- END: FOOTER -->
            </div>

            <script type="text/javascript">
                $(document).ready(function () {

                    $('#btn_login').click(function(e) {
                        //e.preventDefault();

                        form = $('#form-login');
                        url = form.attr('action');
                        data = form.serialize();
                        
                        $.post(url, data, function(result){
                            form.submit();
                        }).fail(function(result){
                            @section('Titulo', 'Error en el ingreso de Datos')
                            var msg = '';
                            $.each(result.responseJSON, function(k, v) {
                                msg += v + '<br />';
                            });

                            $('#lbl_message').html(msg)
                            $('#dv_popup').show();
                        });
                        
                    })

                });
            </script>
        </form>
    </body>
</html>