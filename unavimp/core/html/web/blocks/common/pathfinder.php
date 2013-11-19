<!-- TODO: Replace all text with DB-labels <?php //data::lbl_otp(ID) ?> -->
<?php 
	require_once("core/loader.inc");
	$build = new data(null, null);
?>
<!--<link rel="stylesheet" type="text/css"
        href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />-->
<link rel="stylesheet" type="text/css"
        href="<?php echo "styles/".$build->mode."/".$build->cbrws."/pathfinder.css" ?>" />
<div id="pathfinder">
    <table class="pf-header">
        <tr>
            <td class="pf-header-title"><?php data::lbl_otp(143); ?></td>
<!--
            <td id="pf-print" class="clickable"></td>
            <td class="clickable">Link</td>
-->
            <td id="pf-close" class="clickable"></td>
        </tr>
    </table>
    <table class="pf-transport">
        <tr>
            <td class="pf-transport-cell"></td>
            <!--
            <td class="pf-transport-cell clickable pf-transport-active" id="pf-pedestrian"
                     title="<?php data::lbl_otp(144); ?>"></td>
            -->
            <td class="pf-transport-cell clickable pf-transport-active" id="pf-car"
                    title="<?php data::lbl_otp(145); ?>"></td>
            <td class="pf-transport-cell clickable" id="pf-marshrutka"
                    title="<?php data::lbl_otp(146); ?>"></td>
            <td class="pf-transport-cell clickable" id="pf-bus"
                     title="<?php data::lbl_otp(147); ?>"></td>
            <td class="pf-transport-cell clickable" id="pf-tram"
                      title="<?php data::lbl_otp(148); ?>"></td>
            <td class="pf-transport-cell clickable" id="pf-metro"
                       title="<?php data::lbl_otp(149); ?>"></td>
            <td class="pf-transport-cell"></td>
        </tr>
    </table>
    <table class="pf-a">
        <tr>
        <td class="pf-a-title">A</td>
        <td class="pf-a-select-container">
            <select id="pf-a-select"></select>
        </td>
        </tr>
    </table>
    <table class="pf-b">
        <tr>
        <td class="pf-b-title">B</td>
        <td class="pf-b-select-container">
            <input id="pf-b-select" value="" disabled="disabled" />
        </td>
        </tr>
    </table>
    <table class="pf-calculate">
        <tr>
            <td id="pf-calculate">
                <?php data::lbl_otp(151); ?>
            </td>
        </tr>
    </table>
</div>
<script language="javascript">
    pathfinder.init('pathfinder');
</script>
