<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 15:32:59
         compiled from "/home/mike/public_html/umws/design/backend/templates/addons/statistics/hooks/index/chart_statistic.pre.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12255241815289faeb5353b3-30214353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '425cd7e328357dd89288f3e46d1cab33f0b3c190' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/addons/statistics/hooks/index/chart_statistic.pre.tpl',
      1 => 1380202720,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '12255241815289faeb5353b3-30214353',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5289faeb576cc1_89000560',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5289faeb576cc1_89000560')) {function content_5289faeb576cc1_89000560($_smarty_tpl) {?><?php if (fn_check_view_permissions("statistics.reports","GET")){?>
	<div id="content_visits_chart">
	    <div id="dashboard_statistics_visits_chart" class="dashboard-statistics-chart spinner">
	    </div>
	</div>
<?php }?><?php }} ?>