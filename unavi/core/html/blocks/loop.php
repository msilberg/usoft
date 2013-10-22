<div class="loop-panel loop-panel-<?php print data::gvar("wdir") ?>">
	<table cellpadding="0" cellspacing="0">
		<tr>
			<td>
				<div class="scale-btn scale-plus scale-btn-pass scale-plus-<?php print data::gvar("wdir") ?>">
					<div class="scale-btn-contain">
						<div class="plus-sign plus-sign-<?php print data::gvar("wdir") ?>">
							<span><?php print ($_SESSION['wdir']=="rtl")? "﬩" : "+" ?></span>
							<div class="loop-stick-plus loop-stick-pass loop-stick-<?php print data::gvar("wdir") ?>"></div>
						</div>
					</div>
				</div>
			</td>
			<td>
				<div class="scale-btn scale-minus scale-btn-act scale-minus-<?php print data::gvar("wdir") ?>">
					<div class="scale-btn-contain">
						<div class="minus-sign minus-sign-<?php print data::gvar("wdir") ?>">
							<span>&ndash;</span><br />
							<div class="loop-stick-minus loop-stick-act loop-stick-<?php print data::gvar("wdir") ?>"></div>
						</div>
					</div>
				</div>
			</td>
		</tr>
	</table>
	<div class="scale-btn-separate scale-btn-separate-<?php print data::gvar("wdir") ?>"></div>
</div>