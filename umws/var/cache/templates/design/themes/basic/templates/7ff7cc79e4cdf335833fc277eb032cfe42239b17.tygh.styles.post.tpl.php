<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 14:37:10
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/addons/wishlist/hooks/index/styles.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5000004745266555646a720-42457335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ff7cc79e4cdf335833fc277eb032cfe42239b17' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/addons/wishlist/hooks/index/styles.post.tpl',
      1 => 1382438050,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '5000004745266555646a720-42457335',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5266555649c584_87784941',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5266555649c584_87784941')) {function content_5266555649c584_87784941($_smarty_tpl) {?><?php if (!is_callable('smarty_function_style')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.style.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php echo smarty_function_style(array('src'=>"addons/wishlist/styles.css"),$_smarty_tpl);?>

<?php echo smarty_function_style(array('src'=>"addons/wishlist/scheme.less"),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="addons/wishlist/hooks/index/styles.post.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/wishlist/hooks/index/styles.post.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php echo smarty_function_style(array('src'=>"addons/wishlist/styles.css"),$_smarty_tpl);?>

<?php echo smarty_function_style(array('src'=>"addons/wishlist/scheme.less"),$_smarty_tpl);?>
<?php }?><?php }} ?>