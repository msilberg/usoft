<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:34:12
         compiled from "/home/mike/public_html/umws/design/backend/templates/common/loading_box.tpl" */ ?>
<?php /*%%SmartyHeaderCode:322278746526654a4b54d72-08179239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15c52924e298f68ea9f050359d04b42d1c2d86a0' => 
    array (
      0 => '/home/mike/public_html/umws/design/backend/templates/common/loading_box.tpl',
      1 => 1380199120,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '322278746526654a4b54d72-08179239',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526654a4b594c3_23405975',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526654a4b594c3_23405975')) {function content_526654a4b594c3_23405975($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('loading'));
?>
<div id="ajax_loading_box" class="hidden ajax-loading-box">
    <strong><?php echo $_smarty_tpl->__("loading");?>
</strong>
</div>
<?php }} ?>