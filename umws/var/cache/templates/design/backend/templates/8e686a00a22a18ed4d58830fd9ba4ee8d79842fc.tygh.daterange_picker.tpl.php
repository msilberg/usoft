<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:34:13
         compiled from "/home/mike/public_html/umws/design/backend/templates/common/daterange_picker.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1891977447526654a525aa18-30502481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e686a00a22a18ed4d58830fd9ba4ee8d79842fc' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/common/daterange_picker.tpl',
      1 => 1380199120,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '1891977447526654a525aa18-30502481',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'start_date' => 0,
    'end_date' => 0,
    'id' => 0,
    'extra_class' => 0,
    'data_url' => 0,
    'result_ids' => 0,
    'time_from' => 0,
    'time_to' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526654a533cd63_15898875',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526654a533cd63_15898875')) {function content_526654a533cd63_15898875($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.script.php';
if (!is_callable('smarty_function_style')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.style.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/modifier.date_format.php';
?><?php
fn_preload_lang_vars(array('month_name_abr_1','month_name_abr_2','month_name_abr_3','month_name_abr_4','month_name_abr_5','month_name_abr_6','month_name_abr_7','month_name_abr_8','month_name_abr_9','month_name_abr_10','month_name_abr_11','month_name_abr_12','today','yesterday','last_n_days','last_n_days','this_month','last_month','apply','clear','from','to','custom_range','month_name_abr_1','month_name_abr_2','month_name_abr_3','month_name_abr_4','month_name_abr_5','month_name_abr_6','month_name_abr_7','month_name_abr_8','month_name_abr_9','month_name_abr_10','month_name_abr_11','month_name_abr_12','weekday_abr_0','weekday_abr_1','weekday_abr_2','weekday_abr_3','weekday_abr_4','weekday_abr_5','weekday_abr_6'));
?>
<?php echo smarty_function_script(array('src'=>"js/lib/daterangepicker/moment.min.js"),$_smarty_tpl);?>

<?php echo smarty_function_script(array('src'=>"js/lib/daterangepicker/daterangepicker.js"),$_smarty_tpl);?>

<?php echo smarty_function_style(array('src'=>"lib/daterangepicker/daterangepicker.css"),$_smarty_tpl);?>


<?php $_smarty_tpl->tpl_vars['start_date'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['start_date']->value)===null||$tmp==='' ? (strtotime("-30 day")) : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars['end_date'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['end_date']->value)===null||$tmp==='' ? (strtotime("now")) : $tmp), null, 0);?>

<div id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="reportrange <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['extra_class']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['data_url']->value){?>data-ca-target-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data_url']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['result_ids']->value){?>data-ca-target-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['result_ids']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?>>
    <a class="btn-text">
        <span>
            <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['start_date']->value,"%b %d, %Y"), ENT_QUOTES, 'UTF-8');?>
 — <?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['end_date']->value,"%b %d, %Y"), ENT_QUOTES, 'UTF-8');?>

        </span>
        <b class="caret"></b>
    </a>
</div>

<script type="text/javascript">
//<![CDATA[
Tygh.$(document).ready(function() {
	moment.lang('<?php echo htmlspecialchars(@constant('DEFAULT_LANGUAGE'), ENT_QUOTES, 'UTF-8');?>
', {
    	monthsShort : ['<?php echo $_smarty_tpl->__("month_name_abr_1");?>
', '<?php echo $_smarty_tpl->__("month_name_abr_2");?>
', '<?php echo $_smarty_tpl->__("month_name_abr_3");?>
', '<?php echo $_smarty_tpl->__("month_name_abr_4");?>
', '<?php echo $_smarty_tpl->__("month_name_abr_5");?>
', '<?php echo $_smarty_tpl->__("month_name_abr_6");?>
', '<?php echo $_smarty_tpl->__("month_name_abr_7");?>
', '<?php echo $_smarty_tpl->__("month_name_abr_8");?>
', '<?php echo $_smarty_tpl->__("month_name_abr_9");?>
', '<?php echo $_smarty_tpl->__("month_name_abr_10");?>
', '<?php echo $_smarty_tpl->__("month_name_abr_11");?>
', '<?php echo $_smarty_tpl->__("month_name_abr_12");?>
'
    	]
	});
	moment.lang('<?php echo htmlspecialchars(@constant('DEFAULT_LANGUAGE'), ENT_QUOTES, 'UTF-8');?>
');
	fn_init_daterange_picker('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
');
});
//]]>

function fn_init_daterange_picker(id)
{
	Tygh.$('#' + id).daterangepicker({
	    ranges: {
	        '<?php echo $_smarty_tpl->__("today");?>
': [moment().startOf('day'), moment().endOf('day')],
	        '<?php echo $_smarty_tpl->__("yesterday");?>
': [moment().subtract('days', 1).startOf('day'), moment().subtract('days', 1).endOf('day')],
	        '<?php echo $_smarty_tpl->__("last_n_days",array("[N]"=>7));?>
': [moment().startOf('day').subtract('days', 6), moment().endOf('day')],
	        '<?php echo $_smarty_tpl->__("last_n_days",array("[N]"=>30));?>
': [moment().startOf('day').subtract('days', 29), moment().endOf('day')],
	        '<?php echo $_smarty_tpl->__("this_month");?>
': [moment().startOf('month'), moment().endOf('month')],
	        '<?php echo $_smarty_tpl->__("last_month");?>
': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
	    },
	    startDate: moment(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['time_from']->value, ENT_QUOTES, 'UTF-8');?>
*1000).startOf('day'),
        endDate: moment(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['time_to']->value, ENT_QUOTES, 'UTF-8');?>
*1000).startOf('day'),
        locale: {
            applyLabel: '<?php echo $_smarty_tpl->__("apply");?>
',
            clearLabel: '<?php echo $_smarty_tpl->__("clear");?>
',
            fromLabel: '<?php echo $_smarty_tpl->__("from");?>
',
            toLabel: '<?php echo $_smarty_tpl->__("to");?>
',
            customRangeLabel: '<?php echo $_smarty_tpl->__("custom_range");?>
',
            monthNames: ['<?php echo $_smarty_tpl->__("month_name_abr_1");?>
','<?php echo $_smarty_tpl->__("month_name_abr_2");?>
','<?php echo $_smarty_tpl->__("month_name_abr_3");?>
','<?php echo $_smarty_tpl->__("month_name_abr_4");?>
','<?php echo $_smarty_tpl->__("month_name_abr_5");?>
','<?php echo $_smarty_tpl->__("month_name_abr_6");?>
','<?php echo $_smarty_tpl->__("month_name_abr_7");?>
','<?php echo $_smarty_tpl->__("month_name_abr_8");?>
','<?php echo $_smarty_tpl->__("month_name_abr_9");?>
','<?php echo $_smarty_tpl->__("month_name_abr_10");?>
','<?php echo $_smarty_tpl->__("month_name_abr_11");?>
','<?php echo $_smarty_tpl->__("month_name_abr_12");?>
'],
            daysOfWeek: ['<?php echo $_smarty_tpl->__("weekday_abr_0");?>
', '<?php echo $_smarty_tpl->__("weekday_abr_1");?>
', '<?php echo $_smarty_tpl->__("weekday_abr_2");?>
', '<?php echo $_smarty_tpl->__("weekday_abr_3");?>
', '<?php echo $_smarty_tpl->__("weekday_abr_4");?>
', '<?php echo $_smarty_tpl->__("weekday_abr_5");?>
', '<?php echo $_smarty_tpl->__("weekday_abr_6");?>
']
        },
        format: '<?php if ($_smarty_tpl->tpl_vars['settings']->value['Appearance']['calendar_date_format']=="month_first"){?>DD/MM/YYYY<?php }else{ ?>MM/DD/YYYY<?php }?>'
	}, 
	function(start, end) {
		var self = Tygh.$(this.element);
		var $ = Tygh.$;

		start = !start ? moment(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['time_from']->value, ENT_QUOTES, 'UTF-8');?>
*1000).startOf('day') : start;
		end = !end ? moment(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['time_to']->value, ENT_QUOTES, 'UTF-8');?>
*1000).startOf('day') : end;
	    $('span', self).html(start.format('MMM D, YYYY') + ' — ' + end.format('MMM D, YYYY'));
	    if (self.data('ca-target-url') && self.data('ca-target-id')) {
	    	$.ceAjax('request', $.attachToUrl(self.data('ca-target-url'), 'time_from=' + (start.utc() / 1000) + '&time_to=' + (parseInt(end.utc() / 1000) + 86400)), { // Seconds in day
	    			result_ids: self.data('ca-target-id'),
	    			caching: false,
	    			force_exec: true,
	    			callback: function(id) {
	    				Tygh.$('.reportrange').each(function(){
	    					fn_init_daterange_picker(Tygh.$(this).prop('id'));
	    				});
	    				
	    			}
	    		});
	    }
	});
}
</script><?php }} ?>