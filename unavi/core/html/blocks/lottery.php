<div class="lott-layer lott-layer-<?php print data::gvar("wdir") ?>">
	<script type="text/javascript">
		javafx({
			archive: "<?php print data::$traddr ?>animation/merged/lottery.jar",
			width: 1130,
			height: 835,
			code: "ua.pp.leon.lottery.Main",
			name: "lottery",
			id: "lottApplet"
		},{
			moduleId: <?php print $_SESSION['tc'] ?>,
			storeId: null,
			categoryId: 0,
			langName: "<?php print $_SESSION['lang'] ?>"			
		});
    </script>
</div>