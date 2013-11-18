<div class="rstrip-bckgr rstrip-bckgr-<?php print data::gvar("wdir") ?>">
	<div>
		<table cellspacing="0" cellpadding="0" class="rstrip-table">
			<tr>
				<td>
					<div class="tc-lbl">
						<div class="tc-lbl-cell">
							<div class="tc-lbl-text"><?php print db::get_tc_name() ?></div>
						</div>
					</div>
				</td>
				<td>
					<div class="hor-scroller">
						<div class="scrollingtext">
							<marquee direction="<?php print ($_SESSION['wdir']=="rtl")?"right":"left" ?>" scrolldelay="60" scrollamount="7">
							<?php print db::get_rstrip() ?>
							</marquee>
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>