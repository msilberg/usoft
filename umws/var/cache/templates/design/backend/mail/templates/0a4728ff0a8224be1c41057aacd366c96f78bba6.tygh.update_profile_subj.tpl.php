<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 15:38:21
         compiled from "/home/mike/public_html/umws/design/backend/mail/templates/profiles/update_profile_subj.tpl" */ ?>
<?php /*%%SmartyHeaderCode:615687785289fc2deb6587-11506102%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a4728ff0a8224be1c41057aacd366c96f78bba6' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/mail/templates/profiles/update_profile_subj.tpl',
      1 => 1380202720,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '615687785289fc2deb6587-11506102',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'company_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5289fc2df14535_04793875',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5289fc2df14535_04793875')) {function content_5289fc2df14535_04793875($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('update_profile_notification'));
?>
<?php echo $_smarty_tpl->tpl_vars['company_data']->value['company_name'];?>
: <?php echo $_smarty_tpl->__("update_profile_notification");?>
<?php }} ?>