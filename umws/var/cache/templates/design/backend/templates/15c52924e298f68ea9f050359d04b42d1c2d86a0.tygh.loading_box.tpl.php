<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 15:32:58
         compiled from "/home/mike/public_html/umws/design/backend/templates/common/loading_box.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13907343485289faeae9cb84-68030645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15c52924e298f68ea9f050359d04b42d1c2d86a0' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/common/loading_box.tpl',
      1 => 1380202720,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '13907343485289faeae9cb84-68030645',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5289faeaec7549_31371304',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5289faeaec7549_31371304')) {function content_5289faeaec7549_31371304($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('loading'));
?>
<div id="ajax_loading_box" class="hidden ajax-loading-box">
    <strong><?php echo $_smarty_tpl->__("loading");?>
</strong>
</div>
<?php }} ?>