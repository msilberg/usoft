<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 15:35:51
         compiled from "/home/mike/public_html/umws/design/backend/templates/buttons/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16328655065289fb979398c0-74885533%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ba8306a6c1c7c7e572f493cac1ec1e242d81db0' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/buttons/search.tpl',
      1 => 1380202720,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '16328655065289fb979398c0-74885533',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'but_onclick' => 0,
    'but_href' => 0,
    'but_role' => 0,
    'but_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5289fb97947b61_06868038',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5289fb97947b61_06868038')) {function content_5289fb97947b61_06868038($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('search'));
?>

<?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_text'=>__("search"),'but_onclick'=>$_smarty_tpl->tpl_vars['but_onclick']->value,'but_href'=>$_smarty_tpl->tpl_vars['but_href']->value,'but_role'=>$_smarty_tpl->tpl_vars['but_role']->value,'but_name'=>$_smarty_tpl->tpl_vars['but_name']->value), 0);?>
<?php }} ?>