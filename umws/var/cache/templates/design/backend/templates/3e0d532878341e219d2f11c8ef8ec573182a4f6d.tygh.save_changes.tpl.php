<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 15:36:09
         compiled from "/home/mike/public_html/umws/design/backend/templates/buttons/save_changes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3495557585289fba96dfa27-85242452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e0d532878341e219d2f11c8ef8ec573182a4f6d' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/buttons/save_changes.tpl',
      1 => 1380202720,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '3495557585289fba96dfa27-85242452',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'but_onclick' => 0,
    'but_href' => 0,
    'but_role' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5289fba9a64169_39590937',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5289fba9a64169_39590937')) {function content_5289fba9a64169_39590937($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('save_changes'));
?>
<?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_text'=>__("save_changes"),'but_onclick'=>$_smarty_tpl->tpl_vars['but_onclick']->value,'but_href'=>$_smarty_tpl->tpl_vars['but_href']->value,'but_role'=>$_smarty_tpl->tpl_vars['but_role']->value), 0);?>
<?php }} ?>