<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:15
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/addons/news_and_emails/blocks/static_templates/subscribe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6426163595266555b982ed0-87278125%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c10cc98ed23fc76e5fe90dc6d34d3d42155af9aa' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/addons/news_and_emails/blocks/static_templates/subscribe.tpl',
      1 => 1382438046,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '6426163595266555b982ed0-87278125',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'addons' => 0,
    'config' => 0,
    'block' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5266555ba0b044_20700291',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5266555ba0b044_20700291')) {function content_5266555ba0b044_20700291($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('stay_connected','stay_connected_notice','email','enter_email','go','stay_connected','stay_connected_notice','email','enter_email','go'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?>
<?php if ($_smarty_tpl->tpl_vars['addons']->value['news_and_emails']){?>
<div class="subscribe-block">
<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="subscribe_form">
<input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['current_url'], ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" name="newsletter_format" value="2" />
<p><span><?php echo $_smarty_tpl->__("stay_connected");?>
</span></p>
<p class="subscribe-notice"><?php echo $_smarty_tpl->__("stay_connected_notice");?>
</p>
<div class="control-group input-append subscribe">
<label class="cm-required cm-email hidden" for="subscr_email<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("email");?>
</label>
<input type="text" name="subscribe_email" id="subscr_email<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
" size="20" value="<?php echo $_smarty_tpl->__("enter_email");?>
" class="cm-hint subscribe-email input-text input-text-menu" />
<?php echo $_smarty_tpl->getSubTemplate ("buttons/go.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_name'=>"newsletters.add_subscriber",'alt'=>__("go")), 0);?>

</div>
</form>
</div>
<?php }?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="addons/news_and_emails/blocks/static_templates/subscribe.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/news_and_emails/blocks/static_templates/subscribe.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?>
<?php if ($_smarty_tpl->tpl_vars['addons']->value['news_and_emails']){?>
<div class="subscribe-block">
<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="subscribe_form">
<input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['current_url'], ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" name="newsletter_format" value="2" />
<p><span><?php echo $_smarty_tpl->__("stay_connected");?>
</span></p>
<p class="subscribe-notice"><?php echo $_smarty_tpl->__("stay_connected_notice");?>
</p>
<div class="control-group input-append subscribe">
<label class="cm-required cm-email hidden" for="subscr_email<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("email");?>
</label>
<input type="text" name="subscribe_email" id="subscr_email<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['block_id'], ENT_QUOTES, 'UTF-8');?>
" size="20" value="<?php echo $_smarty_tpl->__("enter_email");?>
" class="cm-hint subscribe-email input-text input-text-menu" />
<?php echo $_smarty_tpl->getSubTemplate ("buttons/go.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('but_name'=>"newsletters.add_subscriber",'alt'=>__("go")), 0);?>

</div>
</form>
</div>
<?php }?><?php }?><?php }} ?>