<div class="sw-body">
	<form name="sign-form" action="http://un.barabashovo.ua:8080/index.authentication.formlogin" method="POST">
		<input type="hidden" name="t:formdata" value="7JY0WT20nrbWxil+Q3roVOoBAKw=:H4sIAAAAAAAAAJWOsUrEQBCGx4Mr5KwEW1HUdq/xGq2uEYQgB+EeYLIZcyvJ7jozMbHxUXwC8SWusPMdfABbKwsTUbuD2H7MN9//9A7j5gD2L31O7RnWuiKvzqK64I1Sq2UonBeGWeDCYES7IqMYSZTvZ8YGptJlJkMhM886iFYvHJX5cUpax5PlevK29/I5gq0EJjZ45VBeYUUKu8kN3uG0RF9MU2Xni/M2Kmz30aSPDpo1/++sBQdLImmdVU6ke7d+zk+vPx5fRwBtbI7gcGMzokgTOJdbeABQ2Onh4gcOMntxvPGSqaIqI66F+K/xC5cdHGR+N74A5Wq4ytcBAAA=" />
		<table cellpadding="3" cellspacing="2">
			<tr>
				<td colspan="2">
					<div><span>U Admin Barabashovo</span></div>
					<div class="login-cls cls-btn-icon-dark"></div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="text" name="textLogin" class="sw-body-txt" maxlength="40" placeholder="<?php data::lbl_otp(101) ?>" onfocus="bMap.keyboardnav.deactivate();" onblur="bMap.keyboardnav.activate();" /> 
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="password" name="textPassword" class="sw-body-txt" maxlength="40" placeholder="<?php data::lbl_otp(102) ?>" onfocus="bMap.keyboardnav.deactivate();" onblur="bMap.keyboardnav.activate();" />
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="sw-btn" class="sw-btn" value="<?php data::lbl_otp(100) ?>" />
				</td>
				<td>
					<a href="http://un.barabashovo.ua:8080/index.authentication.restorepass"><?php data::lbl_otp(103) ?></a>
				</td>
			</tr>
		</table>
	</form>
</div>