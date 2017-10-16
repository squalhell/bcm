<div id="vc-header">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" background="{{ asset('img/top_bk.png') }}">
        <tr>
            <td width="29%"><img src="{{ asset('img/top2.png') }}" width="270" height="77" /></td>
            <td width="71%" align="right" valign="top">
                <div id="nav2">
                    <table style="float:right;" width="250" height="76" border="0" cellpadding="0" cellspacing="0" background="{{ asset('img/usr_bk.png') }}">
                        <tr>
                            <td width="87" align="center" valign="middle">
                                <table width="70" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="70" height="70" bgcolor="#333333"><img src="{{ asset('img/user.png') }}" width="70" height="70" /></td>
                                    </tr>
                                </table>
                            </td>
                            <td width="163">
                                <table width="94%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="21%" align="left" valign="top" class="prsnal">Usr: </td>
                                        <td width="79%" align="right" class="prsnal_just_red">Auth::user()->name</td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top" class="prsnal">Ser:</td>
                                        <td align="right" class="prsnal_just">BOSCH</td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top" class="prsnal">Cap:</td>
                                        <td align="right" class="prsnal_just">camp</td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top" class="prsnal"></td>
                                        <td align="right" class="prsnal_red"></td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top" class="prsnal">&nbsp;</td>
                                        <td class="prsnal_red">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="46%" align="right">&nbsp;</td>
                                                    <td width="54%" align="right">
                                                        <a href="{{ route('logout') }}" class="Title02-2" style="text-decoration:none; padding: 6;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
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
</div>