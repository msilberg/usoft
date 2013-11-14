<?php 
	require_once("core/loader.inc");
	$build = new data(null, null);
?>
<link rel="stylesheet" type="text/css"
        href="<?php echo 'styles/' . $build->mode . '/' . $build->cbrws . '/login.css' ?>" />

<div class="gs-bckgr-3254" style="height: 3524px; display: none;"></div>
<div class="lw-cont-3254" style="left: 780px; top: 28.5px; display: none;">
    <div class="cls-btn-3254"></div>
    <div class="login-window-3254">
        <form name="sign-form" action="http://un.barabashovo.ua:8080/index.authentication.formlogin" method="POST">
            <input type="hidden" name="t:formdata"
                   value="7JY0WT20nrbWxil+Q3roVOoBAKw=:H4sIAAAAAAAAAJWOsUrEQBCGx4Mr5KwEW1HUdq/xGq2uEYQgB+EeYLIZcyvJ7jozMbHxUXwC8SWusPMdfABbKwsTUbuD2H7MN9//9A7j5gD2L31O7RnWuiKvzqK64I1Sq2UonBeGWeDCYES7IqMYSZTvZ8YGptJlJkMhM886iFYvHJX5cUpax5PlevK29/I5gq0EJjZ45VBeYUUKu8kN3uG0RF9MU2Xni/M2Kmz30aSPDpo1/++sBQdLImmdVU6ke7d+zk+vPx5fRwBtbI7gcGMzokgTOJdbeABQ2Onh4gcOMntxvPGSqaIqI66F+K/xC5cdHGR+N74A5Wq4ytcBAAA=">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td colspan="3">
                            <div class="login-window-header-3254">Вход в админ-панель магазина</div>
                        </td>
                    </tr>    
                    <tr>
                        <td colspan="3" style="background-color:#FFFFFF;">
                            <input type="text" name="textLogin" class="sw-body-txt-3254"
                                    placeholder="введите логин"
                                    onfocus="bMap.keyboardnav.deactivate();"
                                    onblur="bMap.keyboardnav.activate();">> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="background-color:#FFFFFF;">
                            <input type="password" name="textPassword" class="sw-body-txt-3254"
                                    placeholder="введите пароль"
                                    onfocus="bMap.keyboardnav.deactivate();"
                                    onblur="bMap.keyboardnav.activate();">>
                        </td>
                    </tr>
                    <tr>
                        <td class="sw-btn-cell-3254" style="background-color:#FFFFFF;">
                            <input type="submit" name="sw-btn" class="sw-btn-3254" value="Войти">
                        </td>
                        <td class="link-cell-3254" style="background-color:#FFFFFF;">
                            <a href="http://un.barabashovo.ua:8080/index.authentication.restorepass">Забыли пароль?</a>
                        </td>
                        <td class="link-cell-3254" style="background-color:#FFFFFF;">
                            <a href="http://un.barabashovo.ua:8080/ClientReg.html">Регистрация</a>
                        </td>
                    </tr>
                </tbody></table>
        </form>
    </div>
</div>
