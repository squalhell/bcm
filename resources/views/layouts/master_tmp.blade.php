<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>        
        <style type="text/css">
            #mssg {
                position:absolute;
                width:526px;
                height:239px;
                z-index:1;
                left: 267px;
                top: 190px;
            }
            body {
                background-image: none !important;
            }
            
        </style>

        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}"/>

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/afoot.css') }}" rel="stylesheet">
        <link href="{{ asset('SpryAssets/SpryMenuBarHorizontal.css') }}" rel="stylesheet">
        <link href="{{ asset('cal2/tcal.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
        
        <script src="{{ asset('js/funciones.js') }}"></script>
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('SpryAssets/SpryMenuBar.js') }}"></script>
        <script src="{{ asset('cal2/tcal.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('js/jquery.timeMask.js') }}"></script>
        <script src="{{ asset('js/jquery.tabletojson.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>

    </head>
    <body>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        
       <table width="100%" height="594" border="0" cellspacing="0" cellpadding="0">
            <tr height="100%">
                <td height="570" valign="top">
                    @yield('content')
                </td>
            </tr>
        </table>

        @include('Errores.msg_popUp')
            
        

        <script type="text/javascript">

            var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown: "<?php echo asset('SpryAssets/SpryMenuBarDownHover.gif'); ?>", imgRight: "<?php echo asset('SpryAssets/SpryMenuBarRightHover.gif'); ?>"});

            function MM_goToURL() { //v3.0
                var i, args = MM_goToURL.arguments;
                document.MM_returnValue = false;
                for (i = 0; i < (args.length - 1); i += 2)
                    eval(args[i] + ".location='" + args[i + 1] + "'");
            }
            //-->
            function inhabilitar() {
                return false
            }

            $(document).ready(function(){
               $('.en_llamado').click(function(event){
                    event.preventDefault();
                    $('#maina').attr('src', '0p.-calls_finalizar.php?'+extra_http_vars);
               });
            });
        </script>
    </body>
</html>