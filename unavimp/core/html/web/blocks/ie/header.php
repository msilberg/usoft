<div class="header-strip">
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td class="header-cell-home">
				<div class="home-page-btn" onclick="window.location.href='http://barabashovo.ua/'">
					<span></span>
				</div>
			</td>
            <td class="lang-btn lang-btn-pass">
				<?php data::lbl_otp(135) ?>
			</td>
			<td class="map-btn map-btn-act">
				<?php data::lbl_otp(108) ?>
			</td>
			<td class="drum-btn drum-btn-pass">
				<?php data::lbl_otp(75) ?>
			</td>
			<td class="lott-btn lott-btn-pass">
				<?php data::lbl_otp(76) ?>
			</td>
			<td class="hot-deal-btn hd-btn-pass">
				<?php data::lbl_otp(77) ?>
			</td>
			<td class="header-cell-search">
                <input type="text" name="sch-field" class="sch-field"
                       placeholder="<?php data::lbl_otp(105) ?>"
                       onfocus="bMap.keyboardnav.deactivate();"
                       onblur="bMap.keyboardnav.activate();" />
                <div class="sch-btn"><?php data::lbl_otp(106) ?></div>
			</td>
            <td>
                <table cellpadding="0" cellspacing="0">
					<tr>
						<td>
							<div class="register-btn" onclick="window.location.href='http://un.barabashovo.ua:8080/Authorization'">
								<span><?php data::lbl_otp(119) ?></span>
							</div>
						</td>
						<td>
							<div class="login-btn"><span><?php data::lbl_otp(141) ?></span></div>
						</td>
					</tr>
				</table>
            </td>
		</tr>
	</table>
</div>