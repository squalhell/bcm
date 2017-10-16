<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="76%" height="510" align="left" valign="top" bgcolor="#CCCCCC">
            <table width="100%" border="0" cellspacing="0" cellpadding="1">
                <tr>
                    <td>
                        <table id="clientes-historicos" width="100%" cellspacing="1" cellpadding="0" border="0" bordercolor="#666666">
                            <thead>
                                <tr class="Button022">
                                    <th width="11" align="left" class="prsnal">&nbsp;</th>
                                    <th width="53"  align="left" class="prsnal">Atencion</th>
                                    <th width="53" align="left" class="prsnal">Promesa</th>
                                    <th width="127" align="left" class="prsnal">Trabajo a Realizar</th>
                                    <th width="202" align="left" class="prsnal">Servicio Tecnico</th>
                                    <th width="165" align="left" class="prsnal">Trabajo realizado</th>
                                    <th width="62" align="left" class="prsnal">Usuario</th>
                                    <th width="62" align="left">Estado</th>
                                    <th width="226" align="left">Pago</th>
                                    <th width="168" align="left">Saldo</th>
                                    <th width="10" align="left">&nbsp;</th>
                                </tr>
                            </thead>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<script type="text/javascript">
    function getRequestData()
    {
        var obj = {
            "id_cliente_direccion" : $('#id_cliente_direccion').val(),
            "_token": "{{ csrf_token() }}"
        }
        return obj;
    }

    $(document).ready(function () {
          var tabla2 = $('#clientes-historicos').DataTable({
            language: { url: "{{ asset('js/jquery.dataTables.esp.json') }}" },
            processing: true,
            searching:  false,
            ordering:   false,
            iDisplayLength: 20,
            ajax: {
                url: "<?php echo route('cliente_historico'); ?>",
                data: getRequestData(),
                type: 'POST'
            },
            columns: [
                { data: 'icono', name: 'icono' },
                { data: 'id_atencion', name: 'atenciones.id_atencion' },
                { data: 'f_prom', name: 'ot.f_prom' },
                { data: 'desc_tipo_trabajo', name: 'tipo_trabajos.desc_tipo_trabajo' },
                { data: 'desc_stec', name: 'stec.desc_stec' },
                { data: 'desc_tipo_servicio', name: 'tipo_servicios.desc_tipo_servicio' },
                { data: 'nom_usr', name: 'users.nom_usr' },
                { data: 'estado', name: 'estado' },
                { data: 'desc_tipo_pago', name: 'desc_tipo_pago' },
                { data: 'v_pendiente', name: 'v_pendiente' },
                { data: 'action', name: 'action' }
            ],
            "createdRow": function( row, data, dataIndex){
                $('td', row).eq(0).css('background-color', '#666666').css('color', '#CCC').css('width', '11').css('border', '1px solid gray');
                $('td', row).eq(1).css('background-color', '#666666').css('color', '#CCC').css('width', '53').css('border', '1px solid gray');
                $('td', row).eq(2).css('background-color', '#E5E5E5').css('width', '53').css('border', '1px solid gray');
                $('td', row).eq(3).css('background-color', '#E5E5E5').css('width', '127').css('border', '1px solid gray');
                $('td', row).eq(4).css('background-color', '#E5E5E5').css('width', '202').css('border', '1px solid gray');
                $('td', row).eq(5).css('background-color', '#E5E5E5').css('width', '165').css('border', '1px solid gray');
                $('td', row).eq(6).css('background-color', '#FFFFFF').css('width', '62').css('border', '1px solid gray');
                $('td', row).eq(7).css('background-color', '#FFFFFF').css('width', '62').css('border', '1px solid gray');
                $('td', row).eq(8).css('background-color', '#FFFFFF').css('width', '226').css('border', '1px solid gray');
                $('td', row).eq(9).css('background-color', '#FFFFFF').css('width', '168').css('border', '1px solid gray');
                $('td', row).eq(10).css('background-color', '#FFFFFF');
                $('td', row).eq(12).css('background-color', '#666666').css('width', '10').css('border', '1px solid gray');

                switch(data.estado) {
                    case 'Abierta':
                        $('td', row).eq(7).css('background-color', '#FF9966').css('font-weight', 'bold');
                        break;
                    case 'Cerrada':
                        $('td', row).eq(7).css('background-color', '#FFFFFF').css('font-weight', 'bold');
                        break;
                    case 'Nula':
                        $('td', row).eq(7).css('background-color', '#990000').css('font-weight', 'bold');
                        break;
                    case 'PPTO':
                        $('td', row).eq(7).css('background-color', '#669900').css('font-weight', 'bold');
                        break;
                    case 'PPTO rechazado':
                        $('td', row).eq(7).css('background-color', '#990000').css('font-weight', 'bold');
                        break;
                    case 'PPTO aceptado':
                        $('td', row).eq(7).css('background-color', '#3399FF').css('font-weight', 'bold');
                        break;
                    case 'En ruta(' + data.cd_pos + ')':
                        $('td', row).eq(7).css('background-color', '#00CC66').css('font-weight', 'bold');
                        break;
                }
            }
          });
    });

</script>