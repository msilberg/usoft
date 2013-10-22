<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:34:13
         compiled from "/home/mike/public_html/umws/design/backend/templates/addons/statistics/hooks/index/chart_statistic.pre.tpl" */ ?>
<?php /*%%SmartyHeaderCode:997582518526654a515cd96-02411973%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '425cd7e328357dd89288f3e46d1cab33f0b3c190' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/addons/statistics/hooks/index/chart_statistic.pre.tpl',
      1 => 1380199120,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '997582518526654a515cd96-02411973',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526654a51699c1_25868899',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526654a51699c1_25868899')) {function content_526654a51699c1_25868899($_smarty_tpl) {?><?php if (fn_check_view_permissions("statistics.reports","GET")){?>
	<div id="content_visits_chart">
	    <div id="dashboard_statistics_visits_chart" class="dashboard-statistics-chart spinner">
	    </div>
	</div>
<?php }?><?php }} ?>