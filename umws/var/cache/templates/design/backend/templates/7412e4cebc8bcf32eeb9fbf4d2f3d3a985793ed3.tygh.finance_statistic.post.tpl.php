<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 15:32:59
         compiled from "/home/mike/public_html/umws/design/backend/templates/addons/statistics/hooks/index/finance_statistic.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16645979175289faeb469f54-68421031%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7412e4cebc8bcf32eeb9fbf4d2f3d3a985793ed3' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/addons/statistics/hooks/index/finance_statistic.post.tpl',
      1 => 1380202720,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '16645979175289faeb469f54-68421031',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'visitors' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5289faeb4c47e0_39381471',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5289faeb4c47e0_39381471')) {function content_5289faeb4c47e0_39381471($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('visits'));
?>
<?php if (fn_check_view_permissions("statistics.reports","GET")){?>
	<td>
	    <div class="dashboard-card">
	        <div class="dashboard-card-title"><?php echo $_smarty_tpl->__("visits");?>
</div>
	        <div class="dashboard-card-content">
	            <h3><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['visitors']->value['total'], ENT_QUOTES, 'UTF-8');?>
</h3><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['visitors']->value['prev_total'], ENT_QUOTES, 'UTF-8');?>
, <?php if ($_smarty_tpl->tpl_vars['visitors']->value['total']>$_smarty_tpl->tpl_vars['visitors']->value['prev_total']){?>+<?php }?><?php echo $_smarty_tpl->tpl_vars['visitors']->value['diff'];?>
%
	        </div>
	    </div>
	</td>
<?php }?><?php }} ?>