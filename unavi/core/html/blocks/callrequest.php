<div class="call-request call-request-<?php print data::gvar("wdir") ?>">
	<div class="cr-dialer">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<script type="text/javascript">
						javafx({
							archive: "<?php print data::$traddr ?>animation/merged/dialer.jar",
							width: 330,
							height: 500,
							code: "ua.pp.leon.dialer.Test",
							name: "dialer",
							id: "dialer"
						},{
							devicetype: "dialercallrequest",
							storeId: null
						});
					</script>
				</td>
				<td valign="top">
					<div class="cr-text cr-text-<?php print data::gvar("wdir") ?>">
						<?php print db::lbl(14)." " ?>
						<span id="store-name"></span>
						<?php print " ".db::lbl(15) ?>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>