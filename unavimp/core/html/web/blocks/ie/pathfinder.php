<!-- TODO: Replace all text with DB-labels <?php //data::lbl_otp(ID) ?> -->
<?php 
	require_once("core/loader.inc");
	$build = new data(null, null);
?>
<link rel="stylesheet" type="text/css"
        href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" type="text/css"
        href="<?php echo "styles/".$build->mode."/".$build->cbrws."/pathfinder.css" ?>" />
<div id="pathfinder">
    <table class="pf-header">
        <tr>
            <td class="pf-header-title">Маршрут</td>
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
            <!--<td class="pf-transport-cell clickable" id="pf-pedestrian"></td>-->
            <td class="pf-transport-cell clickable" id="pf-car"></td>
            <td class="pf-transport-cell clickable" id="pf-marshrutka"></td>
            <td class="pf-transport-cell clickable" id="pf-bus"></td>
            <td class="pf-transport-cell clickable" id="pf-tram"></td>
            <td class="pf-transport-cell clickable" id="pf-metro"></td>
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
                Проложить маршрут
            </td>
        </tr>
    </table>
</div>
<script language="javascript">
    pathfinder.init('pathfinder');
</script>
