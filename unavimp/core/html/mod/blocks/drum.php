<div class="drum-layer drum-layer-<?php print data::gvar("wdir") ?>">
	<script type="text/javascript">
		javafx(
			{
				archive: "<?php print data::$traddr ?>animation/merged/magic-drum.jar",
				width: 1130,
				height: 835,
				code: "ua.pp.leon.magicdrum.Main",
				name: "magic-drum"
			},{
				moduleId: <?php print $_SESSION['tc'] ?>,
				langName: "<?php print $_SESSION['lang'] ?>"
			}
		);
	</script>
</div>