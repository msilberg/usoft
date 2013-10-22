<div class="hot-layer hot-layer-<?php print data::gvar("wdir") ?>">
	<script type="text/javascript">
		javafx({
			archive: "<?php print data::$traddr ?>animation/merged/dialer.jar",
			width: 330,
			height: 500,
			code: "ua.pp.leon.dialer.Test",
			name: "dialer"
		},{
			devicetype: "messagedialer",
			moduleId: <?php print $_SESSION['tc'] ?>
		});
	</script>
</div>