<div id="dv_popup" class="popup" style="display: none;">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" valign="middle">
                <table width="384" border="0" cellspacing="0" cellpadding="0" bgcolor="#003333">
                    <tr>
                        <td width="10" height="20">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr><td><img src="{{ asset('img/border01-01.png') }}" width="10" height="10" /></td></tr>
                                <tr><td bgcolor="#DCDFDF">&nbsp;</td></tr>
                            </table>
                        </td>
                        <td width="365" bgcolor="#DCDFDF">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="4%"><img src="{{ asset('img/user_p.png') }}" width="20" height="20" /></td>
                                    <td width="91%" align="left" valign="middle" class="sub_title"><label id="lbl_popupTitulo"></label></td>
                                    <td width="5%" align="left" valign="middle" class="sub_title"><img id="closer" src="{{ asset('img/clo.png') }}" width="20" height="20" onclick="$('#dv_popup').hide();"/></td>
                                </tr>
                            </table>
                        </td>
                        <td width="10">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr><td><img src="{{ asset('img/border01-02.png') }}" width="10" height="10" /></td></tr>
                                <tr><td bgcolor="#DCDFDF">&nbsp;</td></tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="6" bgcolor="#999999"></td>
                        <td bgcolor="#999999"></td>
                        <td bgcolor="#999999"></td>
                    </tr>
                    <tr>
                        <td height="101" background="" bgcolor="#DCDFDF">&nbsp;</td>
                        <td bgcolor="#DCDFDF">
                            <table width="100%" border="0" cellspacing="0" cellpadding="6">
                                <tr>
                                    <td width="76%" class="sub_title"><label class="sub_title2" id="lbl_message"></label></td>
                                    <td width="24%">
                                        <div id="dv_popupiadvice" style="display: none;"><img src="{{ asset('img/advice.png') }}" width="100" height="100" /></div>
                                        <div id="dv_popupigood" style="display: none;"><img src="{{ asset('img/good.png') }}" width="100" height="100" /></div>
                                        <div id="dv_popupibad" style="display: none;"><img src="{{ asset('img/bad.png') }}" width="100" height="100" /></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td bgcolor="#DCDFDF">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="10" bgcolor="#999999">&nbsp;</td>
                        <td align="center" valign="middle" bgcolor="#999999"><span class="sub_title"><input name="bu" type="button" class="main_fitz" id="bu" value="    Aceptar    " onclick="$('#dv_popup').hide();"/></span></td>
                        <td bgcolor="#999999">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="10"><img src="{{ asset('img/border01-04.png') }}" width="10" height="10" /></td>
                        <td bgcolor="#DCDFDF"></td>
                        <td><img src="{{ asset('img/border01-03.png') }}" width="10" height="10" /></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>