<?php /* Smarty version Smarty-3.1.13, created on 2013-11-18 15:34:59
         compiled from "/home/mike/public_html/umws/design/themes/basic/templates/common/image.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11582017905289fb631278a8-71352891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '480f86365cccfb8fdd05d7f503967dee81fcc17b' => 
    array (
      0 => '/home/mike/public_html/umws/design/themes/basic/templates/common/image.tpl',
      1 => 1384774366,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '11582017905289fb631278a8-71352891',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'capture_image' => 0,
    'obj_id' => 0,
    'images' => 0,
    'image_width' => 0,
    'image_height' => 0,
    'image_data' => 0,
    'external' => 0,
    'show_detailed_link' => 0,
    'image_id' => 0,
    'link_class' => 0,
    'valign' => 0,
    'class' => 0,
    'generate_image' => 0,
    'no_ids' => 0,
    'images_dir' => 0,
    'image_onclick' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5289fb633022c1_23208702',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5289fb633022c1_23208702')) {function content_5289fb633022c1_23208702($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/home/mike/public_html/umws/app/lib/other/smarty/plugins/function.math.php';
if (!is_callable('smarty_function_set_id')) include '/home/mike/public_html/umws/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('no_image','no_image'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C"){?><?php $_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php if ($_smarty_tpl->tpl_vars['capture_image']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("image", null, null); ob_start(); ?><?php }?><?php if (!$_smarty_tpl->tpl_vars['obj_id']->value){?><?php echo smarty_function_math(array('equation'=>"rand()",'assign'=>"obj_id"),$_smarty_tpl);?>
<?php }?><?php $_smarty_tpl->tpl_vars['image_data'] = new Smarty_variable(fn_image_to_display($_smarty_tpl->tpl_vars['images']->value,$_smarty_tpl->tpl_vars['image_width']->value,$_smarty_tpl->tpl_vars['image_height']->value), null, 0);?><?php $_smarty_tpl->tpl_vars['generate_image'] = new Smarty_variable($_smarty_tpl->tpl_vars['image_data']->value['generate_image']&&!$_smarty_tpl->tpl_vars['external']->value, null, 0);?><?php if ($_smarty_tpl->tpl_vars['show_detailed_link']->value){?><a id="det_img_link_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['image_data']->value['detailed_image_path']&&$_smarty_tpl->tpl_vars['image_id']->value){?>data-ca-image-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_class']->value, ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['image_data']->value['detailed_image_path']){?>cm-previewer previewer<?php }?>" <?php if ($_smarty_tpl->tpl_vars['image_data']->value['detailed_image_path']){?>href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['detailed_image_path'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['images']->value['detailed']['alt'], ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php }?><?php if ($_smarty_tpl->tpl_vars['image_data']->value['image_path']){?><img class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['valign']->value, ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['class']->value, ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['generate_image']->value){?>spinner cm-generate-image<?php }?> pict"  <?php if ($_smarty_tpl->tpl_vars['obj_id']->value&&!$_smarty_tpl->tpl_vars['no_ids']->value){?>id="det_img_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['generate_image']->value){?>data-ca-image-path="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['image_path'], ENT_QUOTES, 'UTF-8');?>
"<?php }?> src="<?php if ($_smarty_tpl->tpl_vars['generate_image']->value){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['images_dir']->value, ENT_QUOTES, 'UTF-8');?>
/icons/spacer.gif<?php }else{ ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['image_path'], ENT_QUOTES, 'UTF-8');?>
<?php }?>" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['height'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['alt'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['alt'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['image_onclick']->value){?>onclick="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_onclick']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> /><?php }else{ ?><div class="no-image" style="width: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['image_width']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['image_height']->value : $tmp), ENT_QUOTES, 'UTF-8');?>
px; height: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['image_height']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['image_width']->value : $tmp), ENT_QUOTES, 'UTF-8');?>
px;"><i class="icon-image" title="<?php echo $_smarty_tpl->__("no_image");?>
"></i></div><?php }?><?php if ($_smarty_tpl->tpl_vars['show_detailed_link']->value){?><?php if ($_smarty_tpl->tpl_vars['images']->value['detailed_id']){?><span class="view-larger-image"></span><?php }?></a><?php }?><?php if ($_smarty_tpl->tpl_vars['capture_image']->value){?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php $_smarty_tpl->_capture_stack[0][] = array("icon_image_path", null, null); ob_start(); ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['image_path'], ENT_QUOTES, 'UTF-8');?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php $_smarty_tpl->_capture_stack[0][] = array("detailed_image_path", null, null); ob_start(); ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['detailed_image_path'], ENT_QUOTES, 'UTF-8');?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php if (trim(Smarty::$_smarty_vars['capture']['template_content'])){?><?php if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A"){?><span class="cm-template-box template-box" data-ca-te-template="common/image.tpl" id="<?php echo smarty_function_set_id(array('name'=>"common/image.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php }else{ ?><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<?php }?><?php }?><?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['capture_image']->value){?><?php $_smarty_tpl->_capture_stack[0][] = array("image", null, null); ob_start(); ?><?php }?><?php if (!$_smarty_tpl->tpl_vars['obj_id']->value){?><?php echo smarty_function_math(array('equation'=>"rand()",'assign'=>"obj_id"),$_smarty_tpl);?>
<?php }?><?php $_smarty_tpl->tpl_vars['image_data'] = new Smarty_variable(fn_image_to_display($_smarty_tpl->tpl_vars['images']->value,$_smarty_tpl->tpl_vars['image_width']->value,$_smarty_tpl->tpl_vars['image_height']->value), null, 0);?><?php $_smarty_tpl->tpl_vars['generate_image'] = new Smarty_variable($_smarty_tpl->tpl_vars['image_data']->value['generate_image']&&!$_smarty_tpl->tpl_vars['external']->value, null, 0);?><?php if ($_smarty_tpl->tpl_vars['show_detailed_link']->value){?><a id="det_img_link_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['image_data']->value['detailed_image_path']&&$_smarty_tpl->tpl_vars['image_id']->value){?>data-ca-image-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_class']->value, ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['image_data']->value['detailed_image_path']){?>cm-previewer previewer<?php }?>" <?php if ($_smarty_tpl->tpl_vars['image_data']->value['detailed_image_path']){?>href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['detailed_image_path'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['images']->value['detailed']['alt'], ENT_QUOTES, 'UTF-8');?>
"<?php }?>><?php }?><?php if ($_smarty_tpl->tpl_vars['image_data']->value['image_path']){?><img class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['valign']->value, ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['class']->value, ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['generate_image']->value){?>spinner cm-generate-image<?php }?> pict"  <?php if ($_smarty_tpl->tpl_vars['obj_id']->value&&!$_smarty_tpl->tpl_vars['no_ids']->value){?>id="det_img_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['generate_image']->value){?>data-ca-image-path="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['image_path'], ENT_QUOTES, 'UTF-8');?>
"<?php }?> src="<?php if ($_smarty_tpl->tpl_vars['generate_image']->value){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['images_dir']->value, ENT_QUOTES, 'UTF-8');?>
/icons/spacer.gif<?php }else{ ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['image_path'], ENT_QUOTES, 'UTF-8');?>
<?php }?>" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['height'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['alt'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['alt'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['image_onclick']->value){?>onclick="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_onclick']->value, ENT_QUOTES, 'UTF-8');?>
"<?php }?> /><?php }else{ ?><div class="no-image" style="width: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['image_width']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['image_height']->value : $tmp), ENT_QUOTES, 'UTF-8');?>
px; height: <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['image_height']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['image_width']->value : $tmp), ENT_QUOTES, 'UTF-8');?>
px;"><i class="icon-image" title="<?php echo $_smarty_tpl->__("no_image");?>
"></i></div><?php }?><?php if ($_smarty_tpl->tpl_vars['show_detailed_link']->value){?><?php if ($_smarty_tpl->tpl_vars['images']->value['detailed_id']){?><span class="view-larger-image"></span><?php }?></a><?php }?><?php if ($_smarty_tpl->tpl_vars['capture_image']->value){?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php $_smarty_tpl->_capture_stack[0][] = array("icon_image_path", null, null); ob_start(); ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['image_path'], ENT_QUOTES, 'UTF-8');?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php $_smarty_tpl->_capture_stack[0][] = array("detailed_image_path", null, null); ob_start(); ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_data']->value['detailed_image_path'], ENT_QUOTES, 'UTF-8');?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>
<?php }?><?php }} ?>